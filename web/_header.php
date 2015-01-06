<?php session_start(); ?>
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
				<?php   if(!isset($_SESSION["user_name"])){ ?>
				
				<li class="right">
					<div>
						<div>
							<img src="images/nav/setting-icon.png" width="30px" height="30px">						
							<font><a href="signin.php">Sign in</a></font>
						</div>
						<div>
							<font><a href="index.php">Register</a></font><br>
							<font><a href="index.php">Forget password</a></font>
						</div>
					</div>
				</li>

				<?php }else { ?>

				<li class="right">
					<div>
						<div>
							<img src="images/nav/setting-icon.png" width="30px" height="30px">						
							<font><a href="signout.php">Sign out</a></font>
						</div>
						<div>
							<font><?php print ($_SESSION["user_name"]); ?></font><br>
							<font><?php print ($_SESSION["user_role"]); ?></font>							
						</div>
					</div>
				</li>
				<?php	}?>
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
					<a href="about.php">
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
					<a href="news.php">
						<img src="images/nav/e.png" width="30px" height="30px"><br>						
						News
					</a>
				</li>
				<li>
					<a href="timetable.php">
						<img src="images/nav/f.png" width="30px" height="30px"><br>						
						Timetable
					</a>
				</li>
				<li>
					<a href="contact.php">
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