<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>ICT of SIIT</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<!-- jQuery library (served from Google) -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
	<script type='text/javascript' src='lib/scripts/jquery.min.js'></script>
	<script type='text/javascript' src='lib/scripts/jquery.mobile.customized.min.js'></script>
	<script type='text/javascript' src='lib/scripts/jquery.easing.1.3.js'></script> 
	<script type='text/javascript' src='lib/scripts/camera.min.js'></script> 
	<link rel='stylesheet' id='camera-css'  href='lib/css/camera.css' type='text/css' media='all'> 
</head>
<body>
	<div id="logo">
		<div>
			<ul>
				<li class="left">
					<img src="images/nav/logo-siit.gif" width="100px" height="100px" style="float:left;padding-right: 10px;padding-top: 10px;"><br>
					<font style="font-size: xx-large;">ICT of SIIT</font><br>					
					<font class="underline">Sirindhon International Institute of Technology</font><br>
					<font>Thammasat University</font><br>
				</li>
				<li class="right">
					<div>
						<div>
							<img src="images/nav/setting-icon.png" width="30px" height="30px">						
							<font><a href="index.php">Sign in</a></font>
						</div>
						<div>
							<font><a href="index.php">Register</a></font><br>
							<font><a href="index.php">Forget password</a></font>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div id="header">
		
		<div>
			<ul id="navigation">		
				<li class="selected">
					<a href="index.php">
						<img src="images/nav/a.png" width="30px" height="30px"><br>						
						Home
					</a>
				</li>
				<li>
					<a href="index.php">
						<img src="images/nav/b.png" width="30px" height="30px"><br>						
						About ICT
					</a>
				</li>
				<li class="sub">
					<a href="index.php">
						<img src="images/nav/c.png" width="30px" height="30px"><br>						
						Cirriculum
					</a>					 
					<ul>
						<li><a href="http://www.siit.tu.ac.th/curriculum_cpe_en.htm">Computer enginerring</a></li>
						<li><a href="http://www.siit.tu.ac.th/curriculum_information_en.htm">Information technology</a></li>
					</ul> 
				</li>
				<li class="sub">
					<a href="index.php">
						<img src="images/nav/d.png" width="30px" height="30px"><br>						
						Admission
					</a>
					<ul>
						<li><a href="http://www.siit.tu.ac.th/undergraduate_information_en.htm">Undergraduate</a></li>
						<li><a href="http://www.siit.tu.ac.th/graduate_master_en.htm">Master Degree</a></li>
						<li><a href="http://www.siit.tu.ac.th/graduate_doctoraldegree_en.htm">Doctoral Degree</a></li>
					</ul> 
				</li>
				<li>
					<a href="index.php">
						<img src="images/nav/e.png" width="30px" height="30px"><br>						
						News
					</a>
				</li>
				<li>
					<a href="index.php">
						<img src="images/nav/f.png" width="30px" height="30px"><br>						
						Timetable
					</a>
				</li>
				<li>
					<a href="index.php">
						<img src="images/nav/g.png" width="30px" height="30px"><br>						
						Contact
					</a>
				</li>
				<li>
					<a href="http://lecture.siit.tu.ac.th/">
						<img src="images/nav/h.png" width="30px" height="30px"><br>						
						Course Webs
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- Content -->
	<div id="slideshow">
		<div>
			<div class="body">
				<div class="fluid_container">

					<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
						<div data-thumb="lib/images/slides/thumbs/bridge.jpg" data-src="lib/images/slides/bridge.jpg">
							<div class="camera_caption fadeFromBottom">
								Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
							</div>
						</div>
						<div data-thumb="lib/images/slides/thumbs/leaf.jpg" data-src="lib/images/slides/leaf.jpg">
							<div class="camera_caption fadeFromBottom">
								It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
							</div>
						</div>
						<div data-thumb="lib/images/slides/thumbs/road.jpg" data-src="lib/images/slides/road.jpg">
							<div class="camera_caption fadeFromBottom">
								<em>It's completely free</em> (even if a donation is appreciated)
							</div>
						</div>
						<div data-thumb="lib/images/slides/thumbs/sea.jpg" data-src="lib/images/slides/sea.jpg">
							<div class="camera_caption fadeFromBottom">
								Camera slideshow provides many options <em>to customize your project</em> as more as possible
							</div>
						</div>
						<div data-thumb="lib/images/slides/thumbs/shelter.jpg" data-src="lib/images/slides/shelter.jpg">
							<div class="camera_caption fadeFromBottom">Text Here
							</div>
						</div>
						<div data-thumb="lib/images/slides/thumbs/tree.jpg" data-src="lib/images/slides/tree.jpg">
							<div class="camera_caption fadeFromBottom">
								Different color skins and layouts available, <em>fullscreen ready too</em>
							</div>
						</div>
					</div><!-- #camera_wrap_1 -->
				</div><!-- .fluid_container -->
			</div>
			<script>
				jQuery(function(){
					jQuery('#camera_wrap_1').camera({
						thumbnails: true,
						time: 2000,
						transPeriod: 1500

					});				 
				});
			</script>			 
	</div>
</div>
<!-- Footer -->
<div id="contents">
	<div> 	
			<div class="menu-left">
				<div class="menu1"></div>
				<div class="menu2"></div>
				<div class="menu3"></div>
				<div class="menu4"></div>
			</div>
			<div class="menu-rigth">
			<iframe src="calendar/index.php" style="
			    width: 250px;
			    height: 350px;
			    border: 0px;
			"></iframe>
			</div>
			<div class="banner"></div>
	</div>
	
</div>
<!-- Footer -->
<div id="footer">
		<div> 			
			<p id="footnote">
				Sirindhorn International Institute of Technology, Thammasat University - Rangsit Campus
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="images/nav/logo-webname.png" width="30px" height="30px">
				<img src="images/nav/logo-fb.png" width="30px" height="30px">
				<br>
				P.O.Box 22, Pathum Thani 12121, Thailand. Tel. +66 (0) 2986 9009, 2986 9101, Fax. +66(0) 2986 9112-3
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</p> 
		</div>
	</div>
</body>
</html>