<!-- Header -->
<?php
	include "_header.php";
?>

 	
	<?php
		//collect data
		require_once 'connection/conn-db.php';

		if( isset($_GET["id"]) )
		{
			$item = $database->get("tb_news","*",
				[
					"AND"=> [
								"id" => $_GET["id"],
								"isactive" => 1,		
							]		
				]);
			if($item == [])
			{
				print '<meta http-equiv="refresh" content="0;url=news.php">';	
			}
		}
		else		
		{	
			print '<meta http-equiv="refresh" content="0;url=news.php">';			
		}
	?>

	<?php if(isset($_SESSION["user_name"]) && $_SESSION["user_role"] == "Staff" ){ ?>
	<!-- Staff View -->
	<div id="contents_news">
	
    	  <div ng-app="textAngularTest" ng-controller="wysiwygeditor" class="app" style="padding: 20px;">
		  <!-- Editor -->						  					  								  	

		  <div class="news_view"> 	
		  <h1 class="page-header">
			Edit
			</h1>
			<div class="row"  style="background-color: #3B3B3A;"><div class="col-sm-12">
		  <text-angular name="htmlcontent" ng-model="htmlcontenttwo" class="ta-editor-fix" 						
		  >
		   <!--  <?php echo rawurldecode($datas[0]);  ?> -->
		   sss
		  </text-angular>
		  <br>
		  
	  	  <!-- Editor -->
		  
		  <button class="btn btn-default center-block" ng-click="save()">Save</button>  
		  <br>
		  </div></div></div>
				<div class="news_view"> 			  	
		  	<h1 class="page-header">
			Preview
			</h1>
		  


	




		<div class="news_view"> 	
				<div class="row"  style="background-color: #3B3B3A;">
					<h1 class="text-center">
						<img src="images/nav/e.png" width="30px" height="30px"> 
						<?php echo $item["news_title"]; ?>
					</h1>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">				 		
				 		<div class="panel">
							<div class="panel-body" style="height: inherit;">	
								<!-- result -->							
								<div ta-bind="text" ng-model="htmlcontenttwo" ta-readonly='disabled'></div>  
							</div>
							</div>
		            		<!-- <div class="panel-footer">
						        <div class="pull-right">
						            create date : <?php echo $item["createdate"]; ?>
						        </div>
						    </div>	 -->



					  <script type="text/javascript">
						angular.module("textAngularTest", ['textAngular']);
						function wysiwygeditor($scope) {
							$scope.orightml = '';
							$scope.htmlcontent = $scope.orightml;
							$scope.disabled = false;
							
							//save about
							$scope.save =function() {    
								debugger;
							$.ajax({ 
								url: "connection/save-about1.php" ,
								type: "POST",
								datatype: "json",
								data: "html=" + encodeURIComponent( $scope.htmlcontenttwo )
							})
							.success(function(result) { 
								var obj = jQuery.parseJSON(result);
								if(obj != null)
								{
									debugger;
									alert('Chaiyo !!! ');
								}
								else
								{
									alert('Sadddddd !!!');
								}
							});
						    
						  }

						};

					  </script>



				            
				        </div>
				 	</div>			 	
			 	</div>

		 		<div class="row">
			 		<h3 class="text-center" ></h3>					
			 	</div>
		</div>	
		</div>
		</div> 



	<?php } else { ?>	
	<!-- Teacher View -->
	<!-- Contents -->
	<div id="contents_news">
		<div class="news_view"> 	
				<div class="row"  style="background-color: #3B3B3A;">
					<h1 class="text-center">
						<img src="images/nav/e.png" width="30px" height="30px"> 
						<?php echo $item["news_title"]; ?>
						<!-- show edit button if be staff 
						<?php if(isset($_SESSION["user_name"]) && $_SESSION["user_role"] == "Staff" ){ ?>
						<div class="pull-right">	
							<a href="#">
								<img src="images/nav/setting-icon.png" width="30px" height="30px"> <span >Edit</span>
							</a>
						</div>
						<?php } ?>		-->		
					</h1>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">				 		
				 		<div class="panel">
				            <div class="panel-body">				            	
			              		<?php echo $item["news_detail"]; ?>
				            </div>
		            		<div class="panel-footer">
						        <div class="pull-right">
						            create date : <?php echo $item["createdate"]; ?>
						        </div>
						    </div>	
				        </div>
				 	</div>			 	
			 	</div>

		 		<div class="row">
			 		<h3 class="text-center" ></h3>					
			 	</div>
		</div>	
	</div>
 	<?php } ?>		

 	




<!-- Footer -->
<?php
	include "_footer.php";
?>
 