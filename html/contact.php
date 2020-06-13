<?php
session_start();
if(!$_SESSION["a"]){
	$a = rand(1,50);
	$b = rand(1,50);
	
	$_SESSION["a"] = $a;
	$_SESSION["b"] = $b;
}

$email = '';
$message = '';
$name ='';
$phone ='';
$result = '';
$error = '';

if(isset($_POST['submit'])){
   //echo'<h1>Submit Clicked!!!'.$_POST['submit'].'</h1>';
    $name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	
	if(!$_POST['name']){$error .='Please enter your name! <br>';}
	if(!$_POST['phone']){$error .='Please enter your phone number! <br>';}
	if(!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ $error .= 'Please enter your email! <br>'; }
	if(!$_POST['message']){$error .='Please enter a message! <br>';}

if($error == ''){
    $from = 'dan@fischergourmet.com';
    $to =   'chefdanfischer@gmail.com'; // email that you want to receive the email to. YOUR ADDRESS
    $subject = 'Message from FischerGourmet.com Contact Form';
    $body = "<p><b>From:</b> $name</p> <p><b>Email:</b> $email</p><p><b>Email:</b> $phone</p> \n <p><b>Message:</b> \n $message</p>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <'.$from.'>' . "\r\n";  
    if(mail($to,$subject,$body,$headers)){
     $result = '<div class="alert alert-success">Your mail has been sent!</div>';  
        }else{
     $result = '<div class="alert alert-success">Something went wrong. Please try again!</div>';    
        }
    $email = '';
    $message = '';
    $name ='';
    
    // Send email
} else {
    $result = '<div class="alert alert-danger">Error Found:<br>'.$error.'</div>';
}
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Dan Fischer | Fischer Gourmet | Boston Private Chef</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="img/fischer-gourmet-favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/fischer-gourmet-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/contact-me.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129524654-1"></script>
	<script>
 		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());
  		gtag('config', 'UA-129524654-1');
	</script>
<style>
.invalid-feedback {
    color: #f04;
    font-size: 12px;
    margin-top: 0px;
	text-align: left !important;
}
</style>
</head>

<body>
<header>
	<div class="container">
		<a href="http://www.fischergourmet.com" id="logo">Fischer Gourmet</a>
			<nav id="main-nav">
				<ul>
					<li><a href="http://www.fischergourmet.com">Home</a></li>
					<li><a href="about">About</a></li>
					<li><a href="services">Services</a></li>
					<li><a href="menu">Menu</a></li>
					<li><a href="gallery">Gallery</a></li>
					<li><a href="contact">Contact</a></li>
				</ul>
			</nav>
	</div>

	<span class="open-slide">
		<a href="#" onclick="openSlideMenu()"><i class="fa fa-bars"></i></a>
	</span>

	<div id="side-menu" class="side-nav">
		<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
		<a href="http://www.fischergourmet.com">Home</a>
		<a href="about">About</a>
		<a href="services">Services</a>
		<a href="menu">Menu</a>
		<a href="gallery">Gallery</a>
		<a href="contact">Contact</a>
	</div>
</header>
<section class="landing" id="main">
		<div class="landing-inner">
			<h1 class="title">Contact</h1>
		    </div>
		</div>
</section>
<section class="main-container">
		<div class="row">
			<div class="col-12 aos-init aos-animate" id="text-main" data-aos="fade-right" data-aos-duration="800">
				<h2>Hungry Yet? Get In Touch With Me!</h2>
				<p>Contact me for any inquiries concerning catering, private parties, food styling, meal prep, cooking classes, and any other food related opportunities. I look forward to hearing from you!</p>
				<p><strong>Phone: </strong><a href="tel:1-781-492-2226" style="color: #550000">781-492-2226</a><br><strong>Email: </strong> <a href="mailto:dan@fischergourmet.com" style="color: #550000">Dan@FischerGourmet.com</a></p>
				<form id="contact-form" method="post" action="contact#contact-form" name="contact-form" accept-charset="UTF-8" novalidate="">
					<div class="buffer-bottom">
					    <div class="flex">
						<input type="text" id="name" name="name" placeholder="Name" class="form-control" required="">
						<p class="invalid-feedback" style="display: none;">Please enter your name.</p>
						</div>
						<div class="flex">
						<input type="email" id="email" name="email" placeholder="Email" class="form-control" required="">
						<p class="invalid-feedback" style="display: none;">Please enter your email.</p>
						</div>
						<div class="flex">
						<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control" required="">
						<p class="invalid-feedback" style="display: none;">Please enter your phone number.</p>
						</div>
					</div>
					<div class="buffer-bottom">
					   <div class="flex">
						<textarea id="message" name="message" placeholder="Message" class="form-control" required="" rows="6"></textarea>
						<p class="invalid-feedback" style="display: none;">Please enter your message.</p>
						</div>
					</div>
					<span id="submit-response"></span>
					<div class="pull-left">
						<input type="submit" class="button" id="submit" name="submit" value="send">
					</div>
					<div class="alert-message"><?php echo $result; ?></div>
				</form>
			</div>
		</div>
</section>
	<script>

$('.invalid-feedback').hide();
$('#contact-form').on('submit', function(e) {
  $('.form-control').each(function() {
    if ($(this).is(':invalid')) {
      e.preventDefault();
      $(this).next('.invalid-feedback').show();
    } else {
      $(this).next('.invalid-feedback').hide();
    }
  });
});

$("#name").on("change paste keyup", function() {
  if($(this).val()){
 $(this).next('.invalid-feedback').hide();
} 
});

$("textarea").on("change paste keyup", function() {
  if($(this).val()){
 $(this).parent().find(".invalid-feedback").hide();
} 
});

</script>
<footer id="footer" class="mast">
          <div class="back-to-top-link"><a href="#top"><span style='font-size:20px;'>&#8593;</span><span class="arrow"></span></a></div>
          <div class="footer-content">
				<p class="text-xxl">Copyright 2019-2020 Fischer Gourmet</p>
				<p class="text-xxl">Website Design by <a href="http://www.rsbwebdesign.com">RSB Web Design</a></p>
		  </div>
		    <div class="icons">
			<p><a href="https://www.instagram.com/fischer_gourmet/" target="_blank"><i class="fab fa-instagram bounce-top"></i></a><a href="mailto:dan@fischergourmet.com" target="_blank"><i class="fas fa-envelope bounce-top"></i></a><a href="https://www.instagram.com/explore/tags/fischergourmet/" target="_blank" class="span"><span>#fischergourmet</span></a></p>
			</div>
 </footer>
<script>

function openSlideMenu() {
	document.getElementById('side-menu').style.width='250px';
	document.getElementById('main').style.marginRight='250px';
}

function closeSlideMenu() {
	document.getElementById('side-menu').style.width='0';
	document.getElementById('main').style.marginRight='0';
}

</script>
<script>
  AOS.init();
</script>
</body>
</html>
