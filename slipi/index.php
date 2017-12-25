<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<title>Sli-Pi: Web Control</title>
		<?php
			// http://www.w3.org/TR/CSS2/visuren.html#absolute-positioning
			// screen and browser compliant checks for relative stylesheet
			//echo '<LINK rel="stylesheet" media="screen" href="screen.css" type="text/css">
				//<LINK rel="stylesheet" href="style.css" type="text/css">';
		?>
		<link href='http://fonts.googleapis.com/css?family=Share+Tech+Mono' rel='stylesheet' type='text/css'>
		<!-- <link href="style.css" rel="stylesheet" type="text/css">'; -->
		<link href="dev.css" rel="stylesheet" type="text/css">';
	</head>
	<body>
		<div class="header">
			ToDo: Sli-Pi Logo Image
			<div style="text-align:right">
				Start | Resume | Stop<br />
				Current Frame: ### of $$$$<br />
			</div>
		</div>
		<div class="left">
			<a href="./admin">phpMyAdmin</a><br />
			<a href="./bugzilla">Bugzilla</a><br />
			<a href="./manaul">Sli-Pi Manual</a><br />
			<a href="./phpmanual">PHP Manual</a><br />
		</div>
		<div class="main">
			<?php
				// Open, Read and Close Sli-Pi Status File
				$sli_status = './sli-pi.status';
				if(!is_readable($sli_status)) {
					echo 'Unable to open Sli-Pi status file.<br />';
					exit;
				}
				else {
					// Able to open Sli-Pi status file
					$sli_status = fopen('./sli-pi.status', 'r');
					while (($buffer = fgets($sli_status)) !== false) {
						$buffer = explode("=", $buffer);
						echo 'The Sli-Pi is : '.$buffer[1].'<br />';
					}
				}
				if (!feof($sli_status)) {
					echo "Error: unexpected fgets() fail\n";
				}
				fclose($sli_status);
				
				// Open, Read and Close Sli-Pi Configuration File
				$sli_config = './sli-pi.cfg';
				if(!is_readable($sli_config)) {
					echo 'Unable to open Sli-Pi configuration file.<br />';
					exit;
				}
				else {
					// Able to open Sli-Pi Configuration file
					$sli_config = fopen('././sli-pi.cfg', 'r');
					echo 'The current Sli-Pi configuration is :';
					while (($buffer = fgets($sli_config)) !== false) {
						$buffer = explode("=", $buffer);
						echo '<ul>'.$buffer[0].' <input type="text" name="sli_'.$buffer[0].'" value="'.$buffer[1].'"></ul>';
					}
				}
				if (!feof($sli_config)) {
					echo "Error: unexpected fgets() fail\n";
				}
				fclose($sli_config);
				
			?>

		</div>
		<div class="footer">
			Sli-Pi Copyright &copy; 2014 <a href="http://sli-pi.gbwx.net" target="_blank">GBWX.net
		</div>
	</body>
</html>

