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
				<h2 class="page-header">
					News Title
				</h2>
		  		<text-angular name="htmlcontent1" ng-model="htmlcontenttitle" class="ta-editor-fix"  						
		  		>
		  		<!--  <?php echo rawurldecode($datas[0]);  ?> -->
		  		<?php echo rawurldecode($item["news_title"]); ?>
		  		</text-angular>

		  		<h2 class="page-header">
					News Detail
				</h2>
		  		<text-angular name="htmlcontent2" ng-model="htmlcontentdetail" class="ta-editor-fix" 						
		  		>
		  		<!--  <?php echo rawurldecode($datas[0]);  ?> -->
		  		<?php echo rawurldecode($item["news_detail"]); ?>
		  		</text-angular>

		  		<text-angular name="htmlcontent3" ng-model="htmlcontentid" class="ta-editor-fix" style="display:none;" 						
		  		>
		  		<?php echo $item["id"]; ?>
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
					<h1 class="">
						<img src="images/nav/e.png" width="30px" height="30px" class="pull-left"> 
						<div ta-bind="text" ng-model="htmlcontenttitle" ta-readonly='disabled'></div>  
					</h1>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">				 		
				 		<div class="panel">
							<div class="panel-body" style="height: inherit;">	
								<!-- result -->							
								<div ta-bind="text" ng-model="htmlcontentdetail" ta-readonly='disabled'></div>  
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
								
							$.ajax({ 
								url: "connection/save-news.php" ,
								type: "POST",
								datatype: "json",
								data: 	"detail=" + encodeURIComponent( $scope.htmlcontentdetail ) + 
										"&title=" +  encodeURIComponent( $scope.htmlcontenttitle ) +
										"&id=" +  encodeURIComponent( <?php echo $item["id"]; ?> )  
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
 