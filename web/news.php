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
				"LIMIT" => 6,
				"ORDER" => "id DESC"
			]);
		 
	?>



	<!-- Contents -->
	<div id="contents_news">
		<div class="news"> 	
				<h1 class="page-header text-center">
				NEWS AND ANNOUCEMENT
				<!-- show edit button if be staff -->
				<?php if(isset($_SESSION["user_name"]) && ($_SESSION["user_role"] == "Staff" || $_SESSION["user_role"] == "Teacher") ){ ?>
				<div class="pull-right">	
					<a href="./news_staff.php">
						<img src="images/nav/setting-icon.png" width="30px" height="30px"> <span >Edit</span>
					</a>
				</div>
				<?php } ?>
				
				</h1>

				<?php
				$row = 1;
				if(count($datas) > 3)
					$row = 2;

				for($i=1;$i<=$row;$i++)
				{

				?>

				<div class="row">
				 	<?php
				 	for($j=1;$j<=count($datas)/2;$j++)
					{
						$item = $datas[($i * $j)-1];
				 	?>

					<div class="col-sm-4">
				 		<div class="panel">
				            <div class="panel-heading">
				              <h3 class="panel-title"><img src="images/nav/e.png" width="30px" height="30px"> 
				              <?php echo $item["news_title"]; ?>
				              </h3>
				            </div>
				            <div class="panel-body">
				            	<!-- <img src="http://placehold.it/150x150" alt="" class="img-responsive" /> -->
			              		<?php echo $item["news_detail"]; ?>
				            </div>
				            <div class="panel-footer">
						        <div class="pull-right">
						            <!-- <a href="<?php echo $item["news_link"]; ?>">More...</a>		 -->				            
						            <a href="news_view.php?id=<?php echo $item["id"]; ?>">More...</a>		
						        </div>
						    </div>
				          </div>
				 	</div>

				 	<?php
			 		}
				 	?>
				 	
			 	</div>

				<?php
				}
				?>


				<!-- 1st row-->
				<!-- <div class="row">
				 	<div class="col-sm-4">
				 		<div class="panel">
				            <div class="panel-heading">
				              <h3 class="panel-title"><img src="images/nav/e.png" width="30px" height="30px"> Panel title</h3>
				            </div>
				            <div class="panel-body">
			              		<?php echo $lorem1; ?>
				            </div>
				            <div class="panel-footer">
						        <div class="pull-right">
						            <a href="#" class="">More</a>						            
						        </div>
						    </div>
				          </div>
				 	</div>
				 	<div class="col-sm-4">
				 		<div class="panel">
				            <div class="panel-heading">
				              <h3 class="panel-title"><img src="images/nav/e.png" width="30px" height="30px"> Panel title</h3>
				            </div>
				            <div class="panel-body">
				              <?php echo $lorem2; ?>
				            </div>
				            <div class="panel-footer">
						        <div class="pull-right">
						            <a href="#" class="">More</a>						            
						        </div>
						    </div>
				          </div>
				 	</div>
				 	<div class="col-sm-4">
				 		<div class="panel">
				            <div class="panel-heading">
				              <h3 class="panel-title"><img src="images/nav/e.png" width="30px" height="30px"> Panel title</h3>
				            </div>
				            <div class="panel-body">
				              Panel content
				            </div>
				            <div class="panel-footer">
						        <div class="pull-right">
						            <a href="#" class="">More</a>						            
						        </div>
						    </div>
				          </div>
				 	</div>
			 	</div> -->
		 		<!-- 2nd row-->
			 	<!-- <div class="row">
				 	<div class="col-sm-4">
				 		<div class="panel">
				            <div class="panel-heading">
				              <h3 class="panel-title"><img src="images/nav/e.png" width="30px" height="30px"> Panel title</h3>
				            </div>
				            <div class="panel-body">
				              Panel content
				            </div>
				            <div class="panel-footer">
						        <div class="pull-right">
						            <a href="#" class="">More</a>						            
						        </div>
						    </div>
				          </div>
				 	</div>
				 	<div class="col-sm-4">
				 		<div class="panel">
				            <div class="panel-heading">
				              <h3 class="panel-title"><img src="images/nav/e.png" width="30px" height="30px"> Panel title</h3>
				            </div>
				            <div class="panel-body">
				              Panel content
				            </div>
				            <div class="panel-footer">
						        <div class="pull-right">
						            <a href="#" class="">More</a>						            
						        </div>
						    </div>
				          </div>
				 	</div>
				 	<div class="col-sm-4">
				 		<div class="panel">
				            <div class="panel-heading">
				              <h3 class="panel-title"><img src="images/nav/e.png" width="30px" height="30px"> Panel title</h3>
				            </div>
				            <div class="panel-body">
				              Panel content
				            </div>
				            <div class="panel-footer">
						        <div class="pull-right">
						            <a href="#" class="">More</a>						            
						        </div>
						    </div>
				          </div>
				 	</div>
			 	</div> -->
			 	<!-- last row for more load-->
		 		<div class="row">
			 		<a href="./news_all.php" style="color:#fff;">
				 		<h3 class="text-center" >					
				 			More...			 		
			 			</h3>
		 			</a>
			 	</div>
			 	
		</div>	
	</div>


 

<script type="text/javascript">
	/*
$( document ).ready(function() {	
		$.ajax({ 
				url: "connection/get-news.php" ,
				type: "POST",
				datatype: "json",
				data: ''
			})
			.success(function(result) { 
				var obj = jQuery.parseJSON(result);
				if(obj != null)
				{
					alert('Chaiyo !!! ');
				}
				else
				{
					alert('Sadddddd !!!');
				}
			});
	});
*/

</script>

<!-- Footer -->
<?php
	include "_footer.php";
?>
 