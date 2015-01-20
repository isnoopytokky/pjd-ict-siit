<!-- Header -->
<?php
	include "_header.php";
?>

 	
	<?php
		//collect data
		require_once 'connection/conn-db.php';

		$datas = $database->select("tb_configurations",
			"conf_value",
			[
				"conf_name" => "about_description"
			]
		);
	?>



	<!-- Contents -->
	<div id="contents_news">
		<div class="news"> 	
				<h1 class="page-header text-center">
				ABOUT ICT
				</h1>

				<div class="row">
					<div class="col-sm-12">
				 		<div ng-app="textAngularTest" ng-controller="wysiwygeditor" class="app" style="padding: 20px;">
							  <!-- Editor -->
						  <?php if(isset($_SESSION["user_name"]) && $_SESSION["user_role"] == "Staff" ){ ?>						  								  	
						  	<h1 class="page-header">
							Edit
							</h1>
						  <?php  } ?>
						  <text-angular name="htmlcontent" ng-model="htmlcontenttwo" class="ta-editor-fix" 
							  <?php if(isset($_SESSION["user_name"]) && $_SESSION["user_role"] == "Staff" ){ } else { ?>
							  style="display:none;"
							  <?php  } ?>
						  >
						    <?php echo rawurldecode($datas[0]);  ?>
						  </text-angular>
						  <br>
						  
					  	  <!-- Editor -->
						  <?php if(isset($_SESSION["user_name"]) && $_SESSION["user_role"] == "Staff" ){ ?>			
						  <button class="btn btn-default center-block" ng-click="save()">Save</button>  
						  <br>
	  								  	
						  	<h1 class="page-header">
							Preview
							</h1>
						  <?php  } ?>
							  <!-- result -->							
						  <div ta-bind="text" ng-model="htmlcontenttwo" ta-readonly='disabled'></div>  


						</div>





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
								url: "connection/save-about.php" ,
								type: "POST",
								datatype: "json",
								data: "html=" + encodeURIComponent( $scope.htmlcontenttwo )
							})
							.success(function(result) { 
								var obj = jQuery.parseJSON(result);
								if(obj != null)
								{
									alert('save complete. !!! ');
									location.reload();
								}
								else
								{
									alert('save fail. !!! ');
									//location.reload();
								}
							});
						    
						  }

						};

					  </script>
				 	</div>
				 	
			 	</div>
		</div>
	</div>

<!-- Footer -->
<?php
	include "_footer.php";
?>
 