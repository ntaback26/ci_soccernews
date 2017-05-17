<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->


<!-- Mirrored from goesse.com/demos/html/news/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jul 2015 00:36:33 GMT -->
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Bóng đá">
<meta name="author" content="NTA Back">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title><?php echo $pageTitle; ?></title>

<link rel="shortcut icon" href="<?php echo $public_path; ?>img/sms-4.ico" />

<!-- STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/superfish.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/flexslider.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/960.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/backtotop.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/devices/1000.css" media="only screen and (min-width: 768px) and (max-width: 1000px)" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/devices/767.css" media="only screen and (min-width: 480px) and (max-width: 767px)" />
<link rel="stylesheet" type="text/css" href="<?php echo $public_path; ?>css/devices/479.css" media="only screen and (min-width: 200px) and (max-width: 479px)" />
<!--[if lt IE 9]> <script type="text/javascript" src="js/customM.js"></script> <![endif]-->

<style type="text/css">
    @font-face { font-family: Geneva; src: url('<?php echo $public_path; ?>fonts/geneva-webfont.eot'); } 
</style>


</head>

<body>

<!--Facebook page plugin-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- /Facebook page plugin-->

<!-- Body Wrapper -->
<div class="body-wrapper">
	<div class="controller">
    <div class="controller2">

        <!-- Header -->
        <header id="header">
            <?php $this->load->view('default/header'); ?>
        </header>
        <!-- /Header -->
        
        <!-- Slider -->
        <?php if ($haveSlider == TRUE) { ?>
        <section id="slider">
            <?php $this->load->view('default/slider');  ?>
        </section>
        <?php } ?>
        <!-- / Slider -->
        
        <!-- Content -->
        <section id="content">
            <div class="container">
            	<!-- Main Content -->
                <?php $this->load->view($pageLoader); ?>
                <!-- /Main Content -->
                
                <!-- Right Sidebar -->
                <div id="right">
                    <?php $this->load->view('default/right'); ?>
                </div>
                <!-- /Right Sidebar -->
                
            </div>    
        </section>
        <!-- / Content -->
        
        <!-- Footer -->
        <footer id="footer">
            <?php $this->load->view('default/footer'); ?>
        </footer>
        <!-- / Footer -->

        <!-- Back To Top -->
        <a href="#" id="back-to-top">Back to Top</a>
        <!-- /Back To Top -->
</div>
<!-- / Body Wrapper -->

<!-- SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/default/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/easing.min.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/ui.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/carouFredSel.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/customM.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/tweetable.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/timeago.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/jflickrfeed.min.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/mobilemenu.js"></script>
<script type="text/javascript" src="<?php echo $public_path; ?>js/backtotop.js"></script>

<!--[if lt IE 9]> <script type="text/javascript" src="js/html5.js"></script> <![endif]-->
<script type="text/javascript" src="<?php echo $public_path; ?>js/mypassion.js"></script>

</body>

</html>
