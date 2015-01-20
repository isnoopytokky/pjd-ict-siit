<!-- Header -->
<?php
	include "_header.php";
?>

 	
	<?php
		//collect data
		require_once 'connection/conn-db.php';

		$datas = $database->select("tb_news","*"
			,[
				"ORDER" => "id DESC"
			]
			// ,[
			// 	//"isactive" => 1,
			// 	"LIMIT" => 6
			// ]
			);
		 
	?>



	<!-- Contents -->
	<div id="contents_news">
		<div class="news_staff"> 	
				<h1 class="page-header text-center">
				NEWS AND ANNOUCEMENT (Add/Edit/Delete)
				
				</h1>

				<div class="row">
				 	 <div class="panel panel-info">
					  <!-- Default panel contents -->
					  <div class="panel-heading">
					  	News Lists &nbsp;&nbsp;&nbsp;&nbsp;
					  <a href="news_add.php"><button class="btn-xs btn-info">Add</button></a> 						  
					  </div>
					  <!-- Table -->
					  <div class="panel-body" style="color:#000;">

					  		<?php  
					  			foreach ($datas as $key => $value) {
					  				# code...
					  		?>
					  		<div class="row">
							<div class="col-md-1">#</div>
							<div class="col-md-4"><?php echo $value["news_title"];?></div>
							<div class="col-md-4"><?php echo $value["news_detail"];?></div>
							<div class="col-md-3">
								<a href="news_view.php?id=<?php echo $value["id"];?>"><button class="btn-xs btn-warning">Edit</button></a>
								<?php if( $value["isactive"] == "1" ) { ?>
									<a href="javascript:news_disable(<?php echo $value["id"];?>);"><button class="btn-xs btn-success">Enable</button></a>					    		
								<?php }else { ?>
									<a href="javascript:news_enable(<?php echo $value["id"];?>);"><button class="btn-xs ">Disable</button></a>					    		
								<?php } ?>
					    		<a href="javascript:news_delete(<?php echo $value["id"];?>);"><button class="btn-xs btn-danger">Delete</button></a>	
				    		</div>
				    		</div>
				    		<?php  }?>
					  </div>					  
					</div>
			 	</div>
		</div>	
	</div>
	

	<script type="text/javascript">
		function news_disable (id) {					
			// alert(id);
			$.ajax({ 
				url: "connection/update-status-news.php" ,
				type: "POST",
				datatype: "json",
				data: 	"id=" + id + 
						"&status=" +  0
			})
			.success(function(result) { 
				
				var obj = jQuery.parseJSON(result);
				if(obj != null)
				{				
					alert('Disable complete. !!! ');
					location.reload();
				}
				else
				{
					alert('Fail to disable. !!! ');
					//location.reload();
				}
			});		
		}
		function news_enable (id) {					
			// alert(id);
			$.ajax({ 
				url: "connection/update-status-news.php" ,
				type: "POST",
				datatype: "json",
				data: 	"id=" + id + 
						"&status=" +  1
			})
			.success(function(result) { 				
				var obj = jQuery.parseJSON(result);
				if(obj != null)
				{				
					alert('Disable complete. !!! ');
					location.reload();
				}
				else
				{
					alert('Fail to disable. !!! ');
					//location.reload();
				}
			});		
		}	
		function news_delete (id) {					
			var r = confirm("Are you sure to delete this news?");
			if (r == true) {
			    $.ajax({ 
					url: "connection/delete-news.php" ,
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
	</script>

<!-- Footer -->
<?php
	include "_footer.php";
?>
 