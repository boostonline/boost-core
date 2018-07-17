<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 600');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>Website Under Maintenance</title>

<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
<META NAME="Description" CONTENT="Flywheel is a premium WordPress hosting company built specifically for web designers, freelancers and creative agencies.">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,700,900' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/x-icon" href="https://webpreview.boostonline.co.uk/favicon.ico">
<style type='text/css'>
	body {
		background-repeat: no-repeat;
		background-position: 20px 20px;
		background-size: 40px;
		background-color: #26a525;
		<?php if($dberr){?>background-image:url('https://webpreview.boostonline.co.uk/boost-logo-blue.png');<?php } ?>
	}
	div { width: 600px; margin: 0 auto; text-align: center;	color: #fff;  }
	h1 { font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 34px; font-weight: 300; margin-top: 120px; margin-bottom: 12px; }
	p { margin-top: 0; font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin-bottom: 50px; line-height: 20px;}
	a, a:hover, a:visited {color: #fff; text-decoration: none;}
</style>
</head>

<body>
	<div>
		<h1>Website Under Maintenance...</h1>
		<p>
			This site is currently under maintenance.
		</p>
		<p>Managed By <a href="https://boostonlineadvertising.co.uk/contact-boostonline/" target="_blank">BoostOnline UK Group Ltd</a>.</p>
		<p>
			<a href="https://boostonlineadvertising.co.uk/contact-boostonline/" target="_blank">
				<img width="400" alt="Boost Online UK Ltd" src="<?php if($dberr){?>https://webpreview.boostonline.co.uk/boost-full-logo-blue.png<?php } else { ?>https://webpreview.boostonline.co.uk/boost-logo.png<?php } ?>" />
			</a>
		</p>
	</div>
</body>

</html>