<!DOCTYPE html>
<html lang="zxx" class="js">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Kelas Maju adalah Aplikasi manajemen kelas online yang memudahkan pengelolaan kelas dengan fitur daftar siswa, daftar guru, dan jadwal pelajaran. Dengan aplikasi ini, Anda dapat dengan mudah mengatur dan mengakses informasi penting mengenai siswa, guru, dan jadwal pelajaran di satu tempat.">
		<!-- Fav Icon  -->
		<link rel="shortcut icon" href="images/favicon.png">
		<!-- Site Title  -->
		<title>@yield("title")</title>
		<!-- Vendor Bundle CSS -->
		<link rel="stylesheet" href="assets/css/vendor.bundlec302.css?ver=130" >
		<!-- Custom styles for this template -->
		<link href="assets/css/stylec302.css?ver=130" rel="stylesheet">
		<link href="assets/css/theme-purplec302.css?ver=130" rel="stylesheet" id="layoutstyle">
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-91615293-2', 'auto');
		ga('send', 'pageview');
		</script>
		@stack('styles')
	</head>
	<body class="overflow-scroll">

		<main>
			@yield('content')
		</main>
	
		<!-- Start .footer-section  -->
		<div class="footer-section section">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12">
						<ul class="footer-navigation inline-list">
							<li><a class="nav-item" href="#home">Home</a></li>
							<li><a class="nav-item" href="#about">About</a></li>
							<li><a class="nav-item" href="#features">Features</a></li>
							<li><a class="nav-item" href="#students">Daftar Siswa</a></li>
							<li><a class="nav-item" href="#teachers">Daftar Guru</a></li>
							<li><a class="nav-item" href="#contacts">Contacts</a></li>
						</ul>
						<ul class="social-list inline-list">
							<li><a href="#"><em class="fa fa-facebook"></em></a></li>
							<li><a href="#"><em class="fa fa-twitter"></em></a></li>
							<li><a href="#"><em class="fa fa-linkedin"></em></a></li>
							<li><a href="#"><em class="fa fa-instagram"></em></a></li>
						</ul>
						<ul class="footer-links inline-list">
							<li>Copyright © 2024 KelasMaju. Made with <i class="fa-solid fa-heart" style="color: #ff0000;"></i> by <a target="_blank" href="http://github.com/mizzcode">Misbah</a></li>
						</ul>
					</div><!-- .col  -->
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .footer-section  -->
		
		<!-- Preloader !remove please if you do not want -->
		<div id="preloader"><div id="status">&nbsp;</div></div> 
		<!-- Preloader End -->
		
		<!-- Google Map Script -->
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyD6cxB4idvB67_Mz1ScQn-_nBJmltUaS-g"></script> 
		<script src="assets/js/googleMapc302.js?ver=130"></script>

		<!-- JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		
		<script src="assets/js/jquery.bundlec302.js?ver=130"></script>
		<script src="assets/js/scriptc302.js?ver=130"></script>
		
	</body>
</html>
