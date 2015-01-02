<!-- Header -->
<?php
	include "_header.php";
?>

	<!-- slideshow -->
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
				 
		</div>
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
	<!-- Contents -->
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
<?php
	include "_footer.php";
?>
 