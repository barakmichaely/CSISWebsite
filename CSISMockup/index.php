<!doctype html>
<html>
	<head>
		<title>Seidenberg School of CSIS</title>
		<link rel="stylesheet" href="flexslider/flexslider.css" type="text/css">
		<?php include 'header.php';?>
		<style>.slides li img{min-width:700px;}</style>
		<!-- PAGE BODY GOES HERE -->
		<div class="flexslider" style="height:400px; max-height:400px">
			<ul class="slides" style="height:400px; max-height:400px; overflow:hidden">
				<li><img src="images/banner1.jpg"/></li>
				<li><img src="images/banner2.jpg"/></li>
				<li><img src="images/banner3.jpg" /></li>
			</ul>
		</div>
		<script src="flexslider/jquery.flexslider.js"></script>
		<script type="text/javascript">
			$(window).load(function(){
				$('.flexslider').flexslider({
					animation: "slide"
				});
			});
		</script>
	</body>
</html>