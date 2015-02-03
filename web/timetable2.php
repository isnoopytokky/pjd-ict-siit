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
		}
		else		
		{	
			$_id = $datas[0]["id"];			
			//echo "<meta http-equiv='refresh' content='0;url=contact.php?id=$_id'>";			
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



	<!-- Contents -->
	<div id="contents_news">		 
		<div class="news" style="background: #2E2E2D;"> 	
				<h1 class="page-header text-center">
					Contact				
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
				            	<div class="col-sm-6">
			            			<img src="<?php echo $item["pic_url"]?>" width="150px" height="190px">
			            			<br>
			            			e-mail : <?php echo $item["email"]?>
				            	</div>
				            	<div class="col-sm-6">
				            		<h4 style="left: -70px;position: relative;width: 250px;"><?php echo $item["full_name_th"];?></h4>
				            		<h4 style="left: -70px;position: relative;width: 250px;"><?php echo $item["full_name_en"];?></h4>
				            	</div>
				            	</div>

				            	<br><br>
				            	
				            	<div class="bs-docs-grid">
							    <div class="row show-grid" style="border: solid 1px #fff;">							      
							      <div class="col-md-3 cc"><day>MON</day></div>
							      <div class="col-md-2 cc"><subject-none>cd</subject-none></div>
							      <div class="col-md-2 cc"><subject>cd</subject></div>
							      <div class="col-md-1 cc"><break>.</break></div>
							      <div class="col-md-2 cc"><subject>cd</subject></div>
							      <div class="col-md-2 cc"><subject>cd</subject></div>
							    </div>
							    <div class="row show-grid" style="border: solid 1px #fff;">							      
							      <div class="col-md-3 cc"><day>TUE</day></div>
							      <div class="col-md-2 cc">A</div>
							      <div class="col-md-2 cc">A</div>
							      <div class="col-md-1 cc"><break>.</break></div>
							      <div class="col-md-4 cc"><subject>cd</subject></div>
							    </div>
							     
							  </div>
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

		          		<a href="contact.php?id=<?php  echo $datas[$i]["id"];?>">
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
								debugger;
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
							//debugger;
							
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
		padding: 20px;
		border-right: 3px solid white;
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
		padding: 20px;
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
		padding: 20px;
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
		padding: 20px;
	}
    .cc{
	position: relative;
	min-height: 1px;
	padding-right: 0px;
	padding-left: 0px;
	}

</style>					  