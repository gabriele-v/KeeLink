<html>
 <head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>KeeLink</title>
  <meta name="Keepass Test Page" content="">
  <meta name="Andrea Cioni" content="">
    
  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/sweetalert.css">
  <link rel="stylesheet" href="css/pace.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/ico" href="images/favicon.ico">
  
  <!-- JS LIBARY -->
  <script type="text/javascript" src="lib/pace/pace.js"></script>
  <script type="text/javascript" src="lib/pace/pace.js"></script>
  <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="lib/qrcode/qrcode.js"></script>
  <script type="text/javascript" src="lib/sweetalert/sweetalert-dev.js"></script>
  <script type="text/javascript" src="lib/clipboard/clipboard.min.js"></script>
  <script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>

  <script type="text/javascript" src="lib/main.js"></script>
  
  
  <?php
  	require('keelink.php');
  	$randomsid = KeeLink::initNewSession();
  ?>
  
 </head>
 <body onload="init('<?php echo $randomsid ?>')" >
 	<div class="container">
		 
		 <!-- Navigationbar -->
		<nav class="navbar">
			<div class="container">
				<ul class="navbar-list">
					<li class="navbar-item"><a class="navbar-link" href="#"> <img src="images/favicon.ico"/> KeeLink</a></li>
					<li class="navbar-item"><a class="navbar-link anchorLink" href="#howto"> How To</a></li>
					<li class="navbar-item"><a class="navbar-link" href="#credits">Credits</a></li>
					<li class="navbar-item"><a class="navbar-link" href="#donate">Donate</a></li>
				</ul>
			</div>
		</nav>
		
		<!-- Center -->
		<div id="content">
			<div style="height:15%"></div>
			<div class="container">
				<div class="row"><div class="twelve columns"><p class="content-font" align="center"><b>Use this QR code to share a password from Keepass to this device</b></p></div>	</div>
				
				<div class="row"><div class="twelve columns">&nbsp;</div></div>
				
				<div class="row"><div class="twelve columns"><div align="center" id="qrcode"></div></div></div>
				
				<div class="row"><div class="twelve columns">&nbsp;</div></div>
				
				<div class="row"><div class="twelve columns"><p class="content-font" style="font-size:small" align="center"><b>Your Session ID: <span id="sidLabel"><?php echo $randomsid; ?></span></b></p></div></div>
			
				<div class="row"><div class="twelve columns">&nbsp;</div></div>
				
			</div>

			
			<div id="howto" class="container docs-section">
				<h2>How To</h2>
			</div>
			
			<div id="credits" class="container docs-section">
				<h2>Credits</h2>
			</div>
			
			<div id="donate" class="container docs-section">
				<h2>Donate</h2>
			</div>
			
			<div class="container docs-section"></div>
			
			<!-- Footer -->
			<div class="container docs-section">
				<div class="row" style="height: 200px;">
					<div class="twelve columns"><p style="font-size: 58px;font-weight: bold;color: red;"align="center"></p></div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>