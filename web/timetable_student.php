<!-- Header -->
<?php
	include "_header.php";
?>

 	
	<?php
		//collect data
		require_once 'connection/conn-db.php';

		$datas = $database->select("tb_users","*",
			[
				"ORDER" => "role ASC"
			]);

		if( isset($_GET["id"]) )
		{
			$item = $database->get("tb_users","*",
				[
					
					"id" => $_GET["id"]
							
				]);
			if($item == [])
			{
				print '<meta http-equiv="refresh" content="0;url=index.php">';	
			}
			else
			{
				$subject = $database->select("tb_timetable","*",
				[
					//"GROUP" => "type",				
					//"HAVING" => [					
						"user_id" => $_GET["id"],
						"ORDER" => "subject_day ASC"
					//],
							
				]);				
				
				// print "<script type='text/javascript'>
				// 				$(function() { 
				// 				//alert('');";
				// print $html_str;
				// print "});						
				// 	</script>";
				
			}

		}
		else		
		{	
			$_id = $datas[0]["id"];				
			$item = $database->get("tb_users","*",
				[
					
					"id" => $_id 
							
				]);
			if($item == [])
			{
				print '<meta http-equiv="refresh" content="0;url=index.php">';	
			}
		}		

	?>


	<script type="text/javascript">		
		$(function() {

			$.ajax({ 
				url: "connection/get-timetable.php" ,
				type: "POST",
				datatype: "json",
				data: 	"id=" + <?php echo $item["id"]; ?>
			})
			.success(function(result) { 					
				var obj = jQuery.parseJSON(result);
				if(obj != null)
				{				
					// alert('get complete. !!! ');
					// location.reload();
					debugger;
					render_timetable(obj);
				}
				else
				{
					// alert('Fail to get. !!! ');
					//location.reload();
					render_timetable([]);
				}
			});	


		});

		var render_timetable = function (data){

			debugger
			var str = '';
			var period_m = ['9.00-10.20','10.20-12.00','9.00-12.00']; //morning
			var period_a = ['13.00-14.20','14.20-16.00','13.00-16.00']; // aftter noon

				
			var ttable =[
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0]
				];
			var dtable =[
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0],
				[0,0,0,0]
				];
			var divname = [
				'#mon_day',
				'#tue_day',
				'#wend_day',
				'#thurs_day',
				'#fri_day',
				'#sat_day'
			]
			for (d of data)
			{
				for (var i = 0 ; i < ttable.length; i ++) 
				{					
					if(d.subject_day == i+1)
					{
						if(d.subject_period == period_m[0])
						{
							ttable[d.subject_day-1][0] = 1;	
							dtable[d.subject_day-1][0] = d;
						}
						else if(d.subject_period == period_m[1])
						{
							ttable[d.subject_day-1][1] = 1;	
							dtable[d.subject_day-1][1] = d;
						}
						else if(d.subject_period == period_m[2])
						{
							ttable[d.subject_day-1][0] = 2;	
							ttable[d.subject_day-1][1] = 2;	
							dtable[d.subject_day-1][0] = d;
						}

						if(d.subject_period == period_a[0])
						{
							ttable[d.subject_day-1][2] = 1;	
							dtable[d.subject_day-1][2] = d;
						}
						else if(d.subject_period == period_a[1])
						{
							ttable[d.subject_day-1][3] = 1;	
							dtable[d.subject_day-1][3] = d;
						}
						else if(d.subject_period == period_a[2])
						{
							ttable[d.subject_day-1][2] = 2;	
							ttable[d.subject_day-1][3] = 2;	
							dtable[d.subject_day-1][2] = d;
						}										
					}
				}
			}

			// debugger;
			for (var i = 0; i < ttable.length; i++){
				t= ttable[i];
				d= dtable[i];
				for (var j = 0; j < 4; j++){	
					if(t[j]==1)
					{
						//txt_mon_scode_1
						$("#txt_" + get_code_day(i+1) +"_scode_" + (j+1) ).val(d[j]["subject_code"]);
						$("#txt_" + get_code_day(i+1) +"_sname_" + (j+1) ).val(d[j]["subject_name"]);
						$("#txt_" + get_code_day(i+1) +"_color_" + (j+1) ).val(d[j]["subject_color"]);						
					}
					else if(t[j]==2)
					{					
						debugger;	
						$("#txt_" + get_code_day(i+1) +"_scode_" + (j+1) ).val(d[j]["subject_code"]);
						$("#txt_" + get_code_day(i+1) +"_sname_" + (j+1) ).val(d[j]["subject_name"]);
						$("#txt_" + get_code_day(i+1) +"_color_" + (j+1) ).val(d[j]["subject_color"]);
						j++;
						
						$("#txt_" + get_code_day(i+1) +"_scode_" + (j+1) ).val(d[j-1]["subject_code"]);
						$("#txt_" + get_code_day(i+1) +"_sname_" + (j+1) ).val(d[j-1]["subject_name"]);
						$("#txt_" + get_code_day(i+1) +"_color_" + (j+1) ).val(d[j-1]["subject_color"]);
					}

				}
			} 	
			debugger;
			for (var i = 0; i < ttable.length; i++) 				
			{
				var str_m = '';
				var str_a = '';
				var str_break = '';
				t= ttable[i];

				str_break +=	'<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break>&nbsp;</break></div>';
				//morning
				if(t[0] == 1)
				{
					d = dtable[i][0];
					str_m +=			    		
			    		'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject data-tooltip="'+d.subject_name+'" style="background-color: '+d.subject_color+'">'+d.subject_code+'</subject></div>' +
			    		'';
				}
				else
				{
					str_m +=			    		
						'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject-none>&nbsp;</subject-none></div>'+
						'';
				}

				if(t[1] == 1)
				{
					d = dtable[i][1];
					str_m +=			    		
			    		'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject data-tooltip="'+d.subject_name+'" style="background-color: '+d.subject_color+'">'+d.subject_code+'</subject></div>' +
			    		'';
				}
				else
				{
					str_m +=			    		
						'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject-none>&nbsp;</subject-none></div>'+
						'';
				}

				if(t[0] == 2)
				{
					d = dtable[i][0];
					str_m =			    		
			    		'<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject data-tooltip="'+d.subject_name+'" style="background-color: '+d.subject_color+'">'+d.subject_code+'</subject></div>' +
			    		'';
				}
				
				if(t[2] == 1)
				{
					d = dtable[i][2];
					str_a +=			    		
			    		'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject data-tooltip="'+d.subject_name+'" style="background-color: '+d.subject_color+'">'+d.subject_code+'</subject></div>' +
			    		'';
				}
				else
				{
					str_a +=			    		
						'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject-none>&nbsp;</subject-none></div>'+
						'';
				}

				if(t[3] == 1)
				{
					d = dtable[i][3];
					str_a +=			    		
			    		'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject data-tooltip="'+d.subject_name+'" style="background-color: '+d.subject_color+'">'+d.subject_code+'</subject></div>' +
			    		'';
				}
				else
				{
					str_a +=			    		
						'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject-none>&nbsp;</subject-none></div>'+
						'';
				}

				if(t[2] == 2)
				{
					d = dtable[i][2];
					str_a =			    		
			    		'<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject data-tooltip="'+d.subject_name+'" style="background-color: '+d.subject_color+'">'+d.subject_code+'</subject></div>' +
			    		'';
				}
				//add str html to div
				$(divname[i]).append(str_m + str_break + str_a);
			}			 
		}
	</script>
	<!-- Contents -->
	<div id="contents_news">
		
		<div class="news" style="background: #2E2E2D;"> 	
				
				<h1 class="page-header">
					Edit				
				</h1>
				<!-- Staff Zone -->
				<?php if(isset($_SESSION["user_name"]) && ($_SESSION["user_role"] == "Staff" || $_SESSION["user_id"] == $item['id'] ) ){ ?>
				<div class="row">
			 		<div class="col-xs-12">
			 			 <div class="bs-docs-grid row show-grid">
				            	<div class="row show-grid" style="border: solid 1px #fff;">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align-col"><p>DATE</p></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 align-col"><p>9.00 - 12.00</p></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 align-col">&nbsp;</div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 align-col"><p>13.00 - 16.00</p></div>
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="staff_mon_day">
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align-col">MON</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_mon_scode_1" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_mon_sname_1" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_mon_color_1" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_mon_scode_2" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_mon_sname_2" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_mon_color_2" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 align-col">&nbsp;</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_mon_scode_3" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_mon_sname_3" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_mon_color_3" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_mon_scode_4" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_mon_sname_4" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_mon_color_4" placeholder="Subject Color"><br>
							      </div>
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="staff_tue_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align-col">TUE</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_tue_scode_1" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_tue_sname_1" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_tue_color_1" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_tue_scode_2" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_tue_sname_2" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_tue_color_2" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 align-col">&nbsp;</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_tue_scode_3" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_tue_sname_3" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_tue_color_3" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_tue_scode_4" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_tue_sname_4" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_tue_color_4" placeholder="Subject Color"><br>
							      </div>
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="staff_wend_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align-col">WEND</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_wend_scode_1" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_wend_sname_1" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_wend_color_1" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_wend_scode_2" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_wend_sname_2" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_wend_color_2" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 align-col">&nbsp;</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_wend_scode_3" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_wend_sname_3" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_wend_color_3" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_wend_scode_4" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_wend_sname_4" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_wend_color_4" placeholder="Subject Color"><br>
							      </div>
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="staff_thurs_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align-col">THURS</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_thurs_scode_1" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_thurs_sname_1" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_thurs_color_1" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_thurs_scode_2" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_thurs_sname_2" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_thurs_color_2" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 align-col">&nbsp;</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_thurs_scode_3" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_thurs_sname_3" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_thurs_color_3" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_thurs_scode_4" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_thurs_sname_4" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_thurs_color_4" placeholder="Subject Color"><br>
							      </div>
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="staff_fri_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align-col">FRI</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_fri_scode_1" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_fri_sname_1" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_fri_color_1" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_fri_scode_2" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_fri_sname_2" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_fri_color_2" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 align-col">&nbsp;</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_fri_scode_3" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_fri_sname_3" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_fri_color_3" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_fri_scode_4" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_fri_sname_4" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_fri_color_4" placeholder="Subject Color"><br>
							      </div>
							    </div>		
							    <div class="row show-grid" style="border: solid 1px #fff;" id="staff_sat_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align-col">SAT</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_sat_scode_1" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_sat_sname_1" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_sat_color_1" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_sat_scode_2" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_sat_sname_2" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_sat_color_2" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 align-col">&nbsp;</div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_sat_scode_3" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_sat_sname_3" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_sat_color_3" placeholder="Subject Color"><br>
							      </div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 align-col">
							      	<input class="form-control input-sm" name="scode" id="txt_sat_scode_4" placeholder="Subject Code"><br>
							      	<input class="form-control input-sm" name="sname" id="txt_sat_sname_4" placeholder="Subject Name"><br>
							      	<input class="form-control input-sm" name="color" id="txt_sat_color_4" placeholder="Subject Color"><br>
							      </div>
							    </div>						    							    
							     
							  </div>
							  <br>
							  <button onclick="save();" style="padding: 10px;padding-right: 20px;padding-left: 20px;color: #000;">Save</button>
							  <hr>
			 		</div>
			 	</div>

			 	<h1 class="page-header">
					Preview
				</h1>
			 	<?php } ?>

			 	<!-- View Zone -->
			 	
			 	<h1 class="page-header text-center">
					Time Table				
				</h1>
				<div class="row">
					<div class="col-sm-3">
				 		<div class="panel">				            
				            <div class="panel-body" style="height: inherit;">
				            	<h4 style="background: #3B3B3A;color: #fff;padding: 5px;">
				            		<?php echo $item["department"];?><br>
				            		<?php echo $item["department_th"];?>
			            		</h4>
				            	<h4 style="background: #fff;color: #000;padding: 5px;">
				            		<?php echo $item["role"];?><br>
				            		<?php echo $item["role_th"];?>
				            	</h4>
				            	<!-- <h4 style="background: #fff;color: #000;padding: 5px;">Staffs<br>เจ้าหน้าที่</h4> -->
				            </div>
				          </div>
				 	</div>
				 	<div class="col-sm-6">
				 		<!-- <div class="panel">
				            <div class="panel-body" style="height: inherit;"> -->
				            	<div class="row">
				            	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			            			<img src="<?php echo $item["pic_url"]?>" width="150px" height="190px">
			            			<br>
			            			e-mail : <?php echo $item["email"]?>
				            	</div>
				            	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				            		<h4 style="left: -70px;position: relative;width: 250px;"><?php echo $item["full_name_th"];?></h4>
				            		<h4 style="left: -70px;position: relative;width: 250px;"><?php echo $item["full_name_en"];?></h4>
				            	</div>
				            	</div>


				            	<br><br>

				            	<div class="bs-docs-grid">
				            	<div class="row show-grid" style="border: solid 1px #fff;">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 custom-col"><day>DATE</day></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject style="background-color:#2E2E2D;">9.00-12.00</subject></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break style="background-color:#2E2E2D;border: 1px solid #2E2E2D;">&nbsp;</break></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject style="background-color:#2E2E2D;">13.00-16.00</subject></div>
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="mon_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 custom-col"><day>MON</day></div>
							      <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject-none>&nbsp;</subject-none></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject data-tooltip='Software Engineering &amp;  Software Process'>cd</subject></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break>&nbsp;</break></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject data-tooltip='Software Engineering &amp; Software Process'>cd</subject></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div> -->
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="tue_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 custom-col"><day>TUE</day></div>
							      <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break>&nbsp;</break></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject>cd</subject></div> -->
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="wend_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 custom-col"><day>WEND</day></div>
							      <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break>&nbsp;</break></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject>cd</subject></div> -->
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="thurs_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 custom-col"><day>THURS</day></div>
							      <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break>&nbsp;</break></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject>cd</subject></div> -->
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;" id="fri_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 custom-col"><day>FRI</day></div>
					<!-- 		      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break>&nbsp;</break></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject>cd</subject></div> -->
							    </div>	
							    <div class="row show-grid" style="border: solid 1px #fff;" id="sat_day">							      
							      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 custom-col"><day>SAT</day></div>
					<!-- 		      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 custom-col"><subject>cd</subject></div>
							      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 custom-col"><break>&nbsp;</break></div>
							      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 custom-col"><subject>cd</subject></div> -->
							    </div>	
							    						    							    
							     
							  </div>

							  <br><br>
					 


				            <!-- </div>				            
				          </div> -->
				 	</div>
				 	<div class="col-sm-3">
				 		<!-- <div class="panel">				            
				            <div class="panel-body" style="height: inherit;"> -->
				            	
				            <!-- </div>
				          </div> -->
				  		<?php
				          	$row = count($datas);
							for($i=0;$i<$row;$i++)
							{
						?>

		          		<a href="timetable.php?id=<?php  echo $datas[$i]["id"];?>">
		          			<img src="<?php  echo $datas[$i]["pic_url"];?>" width="50" height="70px" class = "pic">
	          			</a>
		          		
		          		<?php
		          			}
	          			?>

				 	</div>					
			 	</div>
			 	

			 	<!-- last row for more load-->
		 		<div class="row" style="display:none">
			 		<a href="./news_all.php" style="color:#fff;">
				 		<h3 class="text-center" >					
				 			More...			 		
			 			</h3>
		 			</a>
			 	</div>			 	
		</div>			
		
	</div>


 


<!-- Footer -->
<?php
	include "_footer.php";
?>
 


 <script type="text/javascript">
 						function uniqBy(a, key) {
						    var seen = {};
						    return a.filter(function(item) {
						        var k = key(item);
						        return seen.hasOwnProperty(k) ? false : (seen[k] = true);
						    })
						}
						function is_empty (data) {
							var datas = [];

							empyty = {
								"scode": '',
								"sname": '',
								"color": ''
							};
							
							datas.push(empyty);
							datas.push(data);

							result = uniqBy(datas, JSON.stringify);

							return result.length == 1 ? true : false;

						}
						function get_day_code (name) {

							if(name == 'mon')
								return 1;
							else if(name == 'tue')
								return 2;
							else if(name == 'wend')
								return 3;
							else if(name == 'thurs')
								return 4;
							else if(name == 'fri')
								return 5;
							else if(name == 'sat')
								return 6;
							else
								return 0;
						}

						function get_code_day (value) {

							if(value == 1)
								return 'mon';
							else if(value == 2)
								return 'tue';
							else if(value == 3)
								return 'wend';
							else if(value == 4)
								return 'thurs';
							else if(value == 5)
								return 'fri';
							else if(value == 6)
								return 'sat';
							else
								return 0;
						}

						function get_data (day,id1,id2,t,t1,t2) {
							var datas =[];			

							d1 = {
									"scode": $('#txt_'+ day +'_scode_' + id1).val(),
									"sname": $('#txt_'+ day +'_sname_' + id1).val(),
									"color": $('#txt_'+ day +'_color_' + id1).val()
								};
							d2 = {
									"scode": $('#txt_'+ day +'_scode_' + id2).val(),
									"sname": $('#txt_'+ day +'_sname_' + id2).val(),
									"color": $('#txt_'+ day +'_color_' + id2).val()
								};

							if(!is_empty(d1))	
 								datas.push(d1);
 							if(!is_empty(d2))	
 								datas.push(d2);

 							uniq = uniqBy(datas, JSON.stringify);
 							var res = [];
 							if(!is_empty(d1) && !is_empty(d2))
 							{
 								if(uniq.length == 1)
 								{
 									// alert (day + ' mor full: 1 sub');
 									r = {
									"scode": d1["scode"],
									"sname": d1["sname"],
									"color": d1["color"],
									"time" : t ,
									"cday" : get_day_code(day)
									};
									res.push(r);
									return res;
 								}
 								else
 								{
 									// alert (day + ' mor full: 2 sub');
 									r = {
									"scode": d1["scode"],
									"sname": d1["sname"],
									"color": d1["color"],
									"time" : t1 ,
									"cday" : get_day_code(day)
									};
									res.push(r);

									r = {
									"scode": d2["scode"],
									"sname": d2["sname"],
									"color": d2["color"],
									"time" : t2 ,
									"cday" : get_day_code(day)
									};
									res.push(r);

									return res;
 								}
 								
 							}
 							else
 							{
 								if(!is_empty(d1))
 								{
									// alert (day + ' mor 1: 1 sub ==> d' + id1);
									r = {
									"scode": d1["scode"],
									"sname": d1["sname"],
									"color": d1["color"],
									"time" : t1 ,
									"cday" : get_day_code(day)
									};
									res.push(r);
									return res;
 								}
 								else if(!is_empty(d2))
 								{
 									// alert (day + ' mor 1: 1 sub ==> d' + id2);
 									r = {
									"scode": d2["scode"],
									"sname": d2["sname"],
									"color": d2["color"],
									"time" : t2 ,
									"cday" : get_day_code(day)
									};
									res.push(r);
									return res;
 								}
 							}
 							// debugger;
 							return null;
						}
 						var save = function () {
 							days = ['mon','tue','wend','thurs','fri','sat'];
 							var data = [];
 							for(day of days)
 							{

	 							var d_m = get_data(day,1,2,'9.00-12.00','9.00-10.20','10.20-12.00');
	 							var d_a = get_data(day,3,4,'13.00-16.00','13.00-14.20','14.20-16.00');

	 							if(d_m != null)
	 							{
	 								for(m of d_m)
	 								{
	 									data.push(m);
	 								}
	 							}
	 							if(d_a != null)
	 							{
	 								for(a of d_a)
	 								{
	 									data.push(a);
	 								}
	 							}
 							}
 							

 							var tmp = JSON.stringify(data);
 							debugger;
 							  $.ajax({
							    type: 'POST',
							    url: 'connection/add-timetable.php',
							    data: {'id':1,'data': tmp},
							    success: function(msg) {
							    	debugger;
							    	if(msg == "true")
							    	{
								    	alert('save complete. !!! ');
										location.reload();
									}
							    }
							  });
 						}


						var app = angular.module("textAngularTest", ['textAngular']);
						
						
						
						// $("input[type='text']").on("click", function () {
						//    $(this).val($(this).val().trim());
						// });

						function user_delete (id) {					
							var r = confirm("Are you sure to delete this news?");
							if (r == true) {
							    $.ajax({ 
									url: "connection/delete-user.php" ,
									type: "POST",
									datatype: "json",
									data: 	"id=" + id
								})
								.success(function(result) { 				
									var obj = jQuery.parseJSON(result);
									if(obj != null)
									{				
										alert('Delete complete. !!! ');
										location.reload();
									}
									else
									{
										alert('Fail to Delete. !!! ');
										//location.reload();
									}
								});		
							} else {
							    x = "You pressed Cancel!";
							}
							
						}
						function wysiwygeditor($scope) {
							$('text-angular').hide()
							$scope.orightml = '';
							$scope.htmlcontent = $scope.orightml;
							$scope.disabled = false;
							//load data to tectbox
							$.ajax({ 
								url: "connection/get-user.php" ,
								type: "POST",
								datatype: "json",								
								data: 	"id=" +  encodeURIComponent( <?php echo $item["id"];?> )  
							})
							.success(function(result) { 
								
								var obj = jQuery.parseJSON(result);
								if(obj != null)
								{
									
									//$scope.user = obj;
									htmlcontent_email = obj.email.trim();
									htmlcontent_pic_url = obj.pic_url.trim();
									htmlcontent_full_name_th  = obj.full_name_th .trim();
									htmlcontent_full_name_en = obj.full_name_en.trim();
									htmlcontent_role_th = obj.role_th.trim();
									htmlcontent_role = obj.role.trim();
									htmlcontent_department = obj.department.trim();
									htmlcontent_department_th= obj.department_th.trim();


									$("input[type='text']").each( function () {										
									   $(this).val($(this).val().trim());
									});

									
								}
								else
								{
									//alert('save fail. !!!');
									//location.reload();
								}
							});



							//save about
							$scope.save =function() {    
								
							$.ajax({ 
								url: "connection/save-user.php" ,
								type: "POST",
								datatype: "json",
								data: 	"email="  +  encodeURIComponent( $scope.htmlcontent_email ) +
										"&pic_url="  +  encodeURIComponent( $scope.htmlcontent_pic_url ) +
										"&full_name_th="  +  encodeURIComponent( $scope.htmlcontent_full_name_th ) +
										"&full_name_en="  +  encodeURIComponent( $scope.htmlcontent_full_name_en ) +
										"&role_th="  +  encodeURIComponent( $scope.htmlcontent_role_th ) +
										"&role="  +  encodeURIComponent( $scope.htmlcontent_role ) +
										"&department="  +  encodeURIComponent( $scope.htmlcontent_department ) +
										"&department_th="  +  encodeURIComponent( $scope.htmlcontent_department_th ) +
										"&id=" +  encodeURIComponent( <?php echo $item["id"]; ?> )  
							})
							.success(function(result) { 
								//debugger;
								var obj = jQuery.parseJSON(result);
								if(obj != null)
								{
								
									alert('save complete. !!! ');
									location.reload();
								}
								else
								{
									alert('save fail. !!!');
									//location.reload();
								}
							});
						    
						  }

						};
						app.directive('custom', function () {
							////debugger;
							
						    return {
						        restrict: 'A',
						        template: '<img src="images/users/1.jpg">' 
						    };
						});

					  </script>

<style type="text/css">
					  day {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								/*background-color: blueviolet;*/
								border-radius: 3px;
								-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid #2E2E2D;
								/*padding: 20px;*/
								border-right: 3px solid white;
								cursor: pointer;
							}
					  subject {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								background-color: blueviolet;
								border-radius: 3px;
								-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid #2E2E2D;
								padding: 0px 20px 0px 20px;
								cursor: pointer;
							}
						subject-none {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								/*background-color: blueviolet;*/
								border-radius: 3px;
								-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid #2E2E2D;
								padding: 0px 20px 0px 20px;
								cursor: pointer;
							}
						break {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								background-color: white;
								/* border-radius: 3px; */
								/*-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);*/
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid white;
								/*padding: 20px;*/
								cursor: pointer;
							}


						day1 {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								/*background-color: blueviolet;*/
								border-radius: 3px;
								-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid #2E2E2D;
								padding: 20px;
								border-right: 3px solid white;
							}
					  subject1 {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								background-color: blueviolet;
								border-radius: 3px;
								-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid #2E2E2D;
								padding: 20px;
							}
						subject-none1 {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								/*background-color: blueviolet;*/
								border-radius: 3px;
								-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid #2E2E2D;
								padding: 20px;
							}
						break1 {
								padding: 2px 4px;
								font-size: 90%;
								color: #fff;
								background-color: white;
								/* border-radius: 3px; */
								/*-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
								box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);*/
								width: initial;
								display: block;
								height: 40px;
								/* top: 10px; */
								margin: 30px;
								text-align: center;
								vertical-align: middle;
								display: table-cell;
								width: inherit;
								/* padding: 10px; */
								border: 3px solid white;
								padding: 20px;
							}




						/*custome padding of bootstrap	*/
						.custom-col {
							position: relative;
							min-height: 1px;
							padding-right: 0px;
							padding-left: 0px;
							}
// Tooltip Stuff by Chris Bracco
/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
	position: relative;
	z-index: 2;
	cursor: pointer;
 
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
	@include opacity(0);
	pointer-events: none;
  @include transition(0.5s ease all);
}

/* Position tooltip above the element */
[data-tooltip]:before {
	position: absolute;
	bottom: 110%;
	left: 50%;
	margin-bottom: 5px;
	margin-left: -80px;
	padding: 7px;
	width: 160px;
	@include border-radius(6px);
   
	background-color: black;
	color: #fff;
	content: attr(data-tooltip);
	text-align: center;
	font-size: 14px;
	line-height: 1.2;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
	position: absolute;
	bottom: 110%;
	left: 50%;
	margin-left: -5px;
	width: 0;
	border-top: 5px solid black;
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
	content: " ";
	font-size: 0;
	line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
	visibility: visible;
  bottom: 90%;
	@include opacity(1);
}							

.align-col {
	text-align: center;
	padding: 10px 10px 0px 10px;
}		

.align-col:nth-child(2) {
	text-align: center;
	padding: 10px 10px 0px 10px;
	border-left: 1px solid #fff;
}
					  </style>