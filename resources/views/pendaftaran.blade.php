<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Sign Up</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="/assets-login/css/bootstrap.css" rel="stylesheet">
    <link href="/assets-login/css/fontawesome-all.css" rel="stylesheet">
    <link href="/assets-login/css/swiper.css" rel="stylesheet">
	<link href="/assets-login/css/magnific-popup.css" rel="stylesheet">
	<link href="/assets-login/css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="/images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="/" style="text-decoration: none">Rumah Sakit Online</a> 
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/">HOME <span class="sr-only">(current)</span></a>
                    </li>
                  

                    <!-- Dropdown Menu -->          
                    
                    <!-- end of dropdown menu -->
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm" href="/login">LOG IN</a>
                </span>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Daftarkan Dirimu Disini</h1>
                   <p>Jika Sudah Mendaftarkan Silahkan Login<br> <a class="white" href="/login"> Disini</a></p> 
                    <!-- Sign Up Form -->
                    <form action="/pendaftaran" method="POST">
                        @csrf
                        
                       
                    <div class="form-container">
                        @if(session()->has('daftarsukses'))

                        <i><font style="color: green">Pendaftaran Akun Sukses, Silahkan login</font></i>

                        @endif
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="fname"  name="fname" required>
                                <label class="label-control" for="fname">First Name</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="lname" name="lname" required>
                                <label class="label-control" for="lname">Last Name</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="semail" name="email" required @error('email') is-invalid @enderror>
                                <label class="label-control" for="semail">Email</label>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="spassword" name="password" required>
                                <label class="label-control" for="spassword">Password</label>
                                <div class="help-block with-errors"></div>
                            </div>
                           
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">SIGN UP</button>
                            </div>
                            <div class="form-message">
                                <div id="smsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Scripts -->
    <script src="/assets-login/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="/assets-login/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="/assets-login/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="/assets-login/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="/assets-login/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="/assets-login/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="/assets-login/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="/assets-login/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>