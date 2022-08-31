<?php  include_once'header.php'; ?>

	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css1/util.css">
	<link rel="stylesheet" type="text/css" href="css1/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact100">
		<div class="container-contact100">
        <div class="row contact-details" style=" width:100%">
							<div class="col-md-2">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<a class="fa fa-map-marker"></a>
			        		</div>
			        		<div class="text">
				            <p><span>Address:</span> Yaounde-Messa</p>
				          </div>
			          </div>
							</div>
							<div class="col-md-2">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<a class="fa fa-whatsapp" href="https://api.whatsapp.com/send?phone=+237693766521"></a>
			        		</div>
			        		<div class="text">
				            <p><span>Phone:</span><a> 693766521</a></p>
				          </div>
			          </div>
							</div>
							<div class="col-md-2">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<a class="fa fa-envelope-o" href="mailto:wdecisions@gmail.com"></a>
			        		</div>
			        		<div class="text">
				            <p><a>wdecisions@gmail.com</a></p>
				          </div>
			          </div>
							</div>
							<div class="col-md-2">
								<div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <a class="fa fa-facebook" href="https://www.facebook.com/Wisedecision1" aria-hidden="true"></a>
                                    </div>
			        		        <div class="text">
				                        <p><a>WISE DECISION</a></p>
				                    </div>
			                    </div>
							</div>
                            <div class="col-md-2">
								<div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <a class="fa fa-linkedin" href="https://www.linkedin.com/company/wise-decision-informatique-gestion" aria-hidden="true"></a>
                                    </div>
			        		        <div class="text">
				                        <p><a>WISE DECISION informatique et gestion</a></p>
				                    </div>
			                    </div>
							</div>
                            <div class="col-md-2">
								<div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <a class="fa fa-youtube-play" href="https://www.youtube.com/channel/UCBfWyeikGxkZ_mA5RUL8Zxw" aria-hidden="true"></a>
                                    </div>
			        		        <div class="text">
				                        <p><a>WISE DECISION</a></p>
				                    </div>
			                    </div>
							</div>
						</div>
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="img/email.png" alt="IMG">
				</div>

				<form class="contact100-form validate-form">
					<span class="contact100-form-title">
						Contactez-Nous
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="tel" name="name" placeholder="Telephone">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<textarea class="input100" name="message" placeholder="Message"></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" type="submit">
							Envoyer
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<?php include_once 'footer.php'; ?>