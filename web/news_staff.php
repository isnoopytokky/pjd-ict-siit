<!-- Header -->
<?php
	include "_header.php";
?>

 	
	<?php
		//collect data
		require_once 'connection/conn-db.php';

		$datas = $database->select("tb_news","*",
			[
				"isactive" => 1,
				"LIMIT" => 6
			]);
		 
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
					  <a href="news_view.php"><button class="btn-xs btn-info">Add</button></a> 						  
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
							<div class="col-md-5"><?php echo $value["news_detail"];?></div>
							<div class="col-md-2">
								<a href="news_view.php"><button class="btn-xs btn-info">View</button></a>
					    		<a href="news_staff_view.php?cmd=edit"><button class="btn-xs btn-warning">Edit</button></a>
					    		<a href="news_staff_view.php?cmd=delete"><button class="btn-xs btn-danger">Delete</button></a>	
				    		</div>
				    		</div>
				    		<?php  }?>
					  </div>					  
					</div>
			 	</div>
		</div>	
	</div>

<!-- Footer -->
<?php
	include "_footer.php";
?>
 