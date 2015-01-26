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
			echo "<meta http-equiv='refresh' content='0;url=contact.php?id=$_id'>";			
		}		

	?>



	<!-- Contents -->
	<div id="contents_news">
		<?php if(isset($_SESSION["user_name"]) && $_SESSION["user_role"] == "Staff" ){ ?>
		<div ng-app="textAngularTest" ng-controller="wysiwygeditor" class="app" style="padding: 20px;">
		<div class="news_view"> 	
		  	<h1 class="page-header">
		  	.
		  		<div class="pull-left">
		  		Edit
		  		</div>
		  		<div class="pull-left">									
					<a href="javascript:user_delete(<?php echo $item["id"];?>);">
						<img src="images/nav/setting-icon.png" width="30px" height="30px"> <span style="color:red;">Delete</span>
					</a>
				</div>
				<div class="pull-right">									
					<a href="contact_add.php">
						<img src="images/nav/setting-icon.png" width="30px" height="30px"> <span style="color:blue;">Add</span>
					</a>
				</div>
		  	</h1>
		  	<div class="row"  style="background-color: #3B3B3A;"><div class="col-sm-12">
				<h2 class="page-header">
					Department
				</h2>
		  		<text-angular name="htmlcontent1" ng-model="htmlcontent_department" class="ta-editor-fix"  						
		  		>		  		
		  		<?php echo $item["department"];?>
		  		</text-angular>
		  		<input type="text" id = "department" name="department"  ng-model="htmlcontent_department"   class="form-control input-lg">

		  		<h2 class="page-header">
					Department (Thai)
				</h2>
		  		<text-angular name="htmlcontent2" ng-model="htmlcontent_department_th" class="ta-editor-fix" 						
		  		>		  		
		  		<?php echo $item["department_th"];?>
		  		</text-angular>
		  		<input type="text" id = "department_th" name="department_th"  ng-model="htmlcontent_department_th"   class="form-control input-lg">

		  		<h2 class="page-header">
					Role
				</h2>
		  		<text-angular name="htmlcontent3" ng-model="htmlcontent_role" class="ta-editor-fix" 						
		  		>		  		
		  		<?php echo $item["role"];?>
		  		</text-angular>
		  		<input type="text" id = "role" name="role"  ng-model="htmlcontent_role"   class="form-control input-lg">

		  		<h2 class="page-header">
					Role (Thai)
				</h2>
		  		<text-angular name="htmlcontent4" ng-model="htmlcontent_role_th" class="ta-editor-fix" 						
		  		>		  		
		  		<?php echo $item["role_th"];?>
		  		</text-angular>
		  		<input type="text" id = "role_th" name="role_th"  ng-model="htmlcontent_role_th"   class="form-control input-lg">

		  		<h2 class="page-header">
					Full Name
				</h2>
		  		<text-angular name="htmlcontent5" ng-model="htmlcontent_full_name_en" class="ta-editor-fix" 						
		  		>		  		
		  		<?php echo $item["full_name_en"];?>
		  		</text-angular>
		  		<input type="text" id = "full_name_en" name="full_name_en"  ng-model="htmlcontent_full_name_en"   class="form-control input-lg">

		  		<h2 class="page-header">
					Full Name (Thai)
				</h2>
		  		<text-angular name="htmlcontent6" ng-model="htmlcontent_full_name_th" class="ta-editor-fix" 						
		  		>		  		
		  		<?php echo $item["full_name_th"];?>
		  		</text-angular>
		  		<input type="text" id = "full_name_th" name="full_name_th"  ng-model="htmlcontent_full_name_th"   class="form-control input-lg">

		  		<h2 class="page-header">
					E-mail
				</h2>
		  		<text-angular name="htmlcontent7" ng-model="htmlcontent_email" class="ta-editor-fix" 						
		  		>		  		
		  		<?php echo $item["email"];?>
		  		</text-angular>
		  		<input type="text" id = "email" name="email"  ng-model="htmlcontent_email"   class="form-control input-lg">
 
		  		<h2 class="page-header">
					Picture
				</h2>
		  		 <text-angular name="htmlcontent8" ng-model="htmlcontent_pic_url" class="ta-editor-fix" 						
		  		>		  		
		  		<?php echo $item["pic_url"];?>
		  		</text-angular>  
		  		<input type="text" id = "pic_url" name="pic_url" ng-model="htmlcontent_pic_url"   class="form-control input-lg">
		  		
		  		 
		  		<text-angular name="htmlcontent9" ng-model="htmlcontent_id" class="ta-editor-fix" style="display:none;" 						
		  		>
		  		<?php echo $item["id"]; ?>
		  		</text-angular>
		  	<br>
		  	
		  	<!-- Editor -->
		  	
		  	<button class="btn btn-default center-block" ng-click="save()">Save</button>  
		  	<br>
		  </div>
		  </div>
		  </div>
		<div class="news_view"> 			  	
		  	<h1 class="page-header">
			Preview
			</h1>
		<div class="news" style="background: #2E2E2D;"> 	
				<h1 class="page-header text-center">
					Contact				
				</h1>
				<div class="row">
					<div class="col-sm-3">
				 		<div class="panel">				            
				            <div class="panel-body" style="height: inherit;">
				            	<h4 style="background: #3B3B3A;color: #fff;padding: 5px;">				            		
				            		<div ta-bind="text" ng-model="htmlcontent_department" ta-readonly='disabled'></div>
				            		<br>
				            		<div ta-bind="text" ng-model="htmlcontent_department_th" ta-readonly='disabled'></div>
			            		</h4>
				            	<h4 style="background: #fff;color: #000;padding: 5px;">
				            		<div ta-bind="text" ng-model="htmlcontent_role" ta-readonly='disabled'></div>
				            		<br>
				            		<div ta-bind="text" ng-model="htmlcontent_role_th" ta-readonly='disabled'></div>
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
			            			<!-- <img src="<?php echo $item["pic_url"]?>" width="150px" height="190px"> -->				            			
		            				<img ng-src="{{htmlcontent_pic_url}}" width="150px" height="190px">
			            			
			            			<br>			            			
			            			e-mail : <div ta-bind="text" name="email" ng-model="htmlcontent_email" ta-readonly='disabled'></div>

				            	</div>
				            	<div class="col-sm-6">
				            		<h4 style="left: -70px;position: relative;width: 250px;">				            			
				            			<div ta-bind="text" ng-model="htmlcontent_full_name_th" ta-readonly='disabled'></div>
			            			</h4>
				            		<h4 style="left: -70px;position: relative;width: 250px;">				            			
				            			<div ta-bind="text" ng-model="htmlcontent_full_name_en" ta-readonly='disabled'></div>
				            		</h4>
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
		</div>
		<?php } else {?>	
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
		<?php } ?>				
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
								data: 	"id=" +  encodeURIComponent( <?php echo $_GET["id"]; ?> )  
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