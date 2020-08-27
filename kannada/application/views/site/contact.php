<!doctype html>
<html lang="en" class="no-js">
<head>
	<title>Mahonnathi</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="News Portal News, New Portal Videos News Portal Photos , News Latest Updates , News Web Portal Development, News Portal Development, News Portal Website, Media Designing Company, Latest news, India news, World News Today, Breaking News Headlines, News Today, News, Latest News, Today's News, Today's News Headlines, Breaking News, Live News, Current Affairs, Sports News in English, " >

	<meta property="og:image" content="<?php echo base_url().$banner[0]->image ?>" />
	<meta property="og:title" content="Online News Portal">
	<meta property="og:site_name" content="Online News Portal">
	<meta property="og:url" content="<?php echo base_url() ?>">
	<meta property="og:description" content="">
	<meta property="og:type" content="website">
	
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@Mahonnathi">
	<meta name="twitter:image" content="<?php echo base_url().$banner[0]->image ?>">
	<meta name="twitter:url" content="<?php echo base_url() ?>">
	<meta name="twitter:title" content="Online News Portal">
	<meta name="twitter:description" content="">
	<?php $this->load->view('include/favicon.php'); ?>
	

	<link href='//fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/magnific-popup.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/owl.theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/ticker-style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" media="screen">
	<link href="<?php echo base_url()?>assets/css/jquery.alertable.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/widget.css">
    
	<script data-ad-client="ca-pub-8593432034756272" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
  window.googletag = window.googletag || {cmd: []};
  googletag.cmd.push(function() {
    googletag.defineSlot('/21906498668/PG-TOP', [468, 60], 'div-gpt-ad-1580129697409-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>

<script data-ad-client="ca-pub-9153450084338777" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148770094-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148770094-1');
</script>

<style>
	label.error {
    color: red !important;
}
</style>

</head>
<body>
<script>
        window.fbAsyncInit = function() {
        FB.init({
        appId : '454748752068930',
        cookie : true,
        xfbml : true,
        version : 'v7.0'
        });
        FB.AppEvents.logPageView();
        };

        (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
</script>

	<?php $this->load->view('include/widget'); ?>

	<!-- Container -->
	<div id="container">

		<!-- Header
		    ================================================== -->
        <?php $this->load->view('include/header'); ?>
		<!-- End Header -->

		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">
				<div class="row">

					<div class="col-sm-3">

						<!-- sidebar -->
						<div class="sidebar">

							<div class="widget social-widget">
								<div class="title-section">
									<h1><span>ಸಂಪರ್ಕದಲ್ಲಿರಿ</span></h1>
								</div>
								<ul class="social-share">
									<li>
										<a href="https://www.facebook.com/mahonnathikannada/" class="facebook"><i class="fa fa-facebook"></i></a>
										<span class="number">Facebook</span>
										<!-- <span>Facebook</span> -->
									</li>
									<li>
										<a href="https://twitter.com/mahonnathikan" class="twitter"><i class="fa fa-twitter"></i></a>
										<span class="number">Twitter</span>
										<!-- <span>Twitter</span> -->
									</li>
									<li>
										<a href="https://www.youtube.com/channel/UC00fs8iYCCtN9TlyEw_8JCg/videos
" class="google"><i class="fa fa-youtube"></i></a>
										<span class="number">YouTube</span>
										<!-- <span>YouTube</span> -->
									</li>
									<li>
										<a href="https://www.instagram.com/mahonnathikannada/" class="rss"><i class="fa fa-instagram"></i></a>
										<span class="number">Instagram</span>
										<!-- <span>Instagram</span> -->
									</li>
								</ul>
							</div>
							<?php if(!empty($temple)){ ?>
								<div class="widget features-slide-widget">
									<div class="title-section">
										<h1><span>ದೇಗುಲ ದರ್ಶನ</span></h1>
									</div>
									<div class="image-post-slider">
										<ul class="bxslider">

											<?php foreach ($temple as $key => $tprow) { 
												if(empty($tprow->category)){
													$urllink = $this->urls->urlFormat((!empty($tprow->slug))?$tprow->slug:'');
												}else{
													
													$urllink = $this->urls->urlFormat(base_url().$tprow->category.'/'.$tprow->slug);
												}
												(!empty($tprow->content)? $content = $tprow->content : $content = '' ) ;
												$igm = (!empty($tprow->image))?$tprow->image:'';
												$ttle = (!empty($tprow->title))?$tprow->title:'';
											?>
											<li class="temple-to-visit">
												<a href="<?php echo $urllink ?>">
													<div class="news-post image-post2">
														<div class="post-gallery">
															<div class="verticle">
																<img src="<?php echo base_url().$igm ?>" alt="">
															</div>
															<div class="hover-box">
																<div class="inner-hover">
																	<h2><a href="<?php echo $urllink ?>">
																		<?php echo word_limiter(strip_tags($ttle), 5).'...' ?></a></h2>
																	<ul class="post-tags">
																		<!--  -->
																		<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</a>
											</li>
												
											<?php } ?>
											
											
										</ul>
									</div>
								</div>
							<?php } ?>	
							<div class="widget">
								<a href="http://www.mindvik.com/" target="_blank">
								<img src="<?php echo base_url() ?>assets/images/ad-img3.png" class="img-responsive" alt=""></a>
							</div>						
												
							
										
							<div class="widget">
								<a href="http://www.5ines.com/" target="_blank">
								<img src="<?php echo base_url() ?>assets/images/ad-img4.png" class="img-responsive" alt=""></a>
							</div>
							<div class="widget">
								<a href="http://www.getmyappz.com/" target="_blank">
								<img src="<?php echo base_url() ?>assets/images/ad-img5.jpg" class="img-responsive" alt=""></a>
							</div>
							<div class="widget subscribe-widget">
								<form class="subscribe-form">
									<h1>ಸಬ್ ಸ್ರೈಬ್ ಆಗಿ</h1>
									<input type="email" required name="sumbscribe" id="subscribe" placeholder="Email"/>
									<button id="submit-subscribe">
										<i class="fa fa-arrow-circle-right"></i>
									</button>
									<p>Get all latest content delivered to your email a few times a month.</p>
								</form>
							</div>
							<?php if(!empty($videos)){ ?>				
								<div class="widget post-widget">
									<div class="title-section">
										<h1><span>ಕಿರು ಚಿತ್ರ</span></h1>
									</div>
									<?php foreach ($videos as $key => $value) {
										?>
										<div>
											<div class="news-post video-post">
												<a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>"><img alt="" src="<?php echo $value->tumb ?>"></a>
												<a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug )?>" class="video-icon"><i class="fa fa-play-circle-o"></i></a>
												
											</div>
											<p><a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>"><?php echo word_limiter(strip_tags($value->title), 3).'...' ?></a></p>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
							

						</div>
						<!-- End sidebar -->

					</div>

					<div class="col-md-7 col-sm-8 content-blocker brd">

						<!-- block content -->
						<div class="block-content">

							

							<!-- contact form box -->
							<div class="contact-form-box">
								<div class="title-section">
									<h1><span>ಸಂಪರ್ಕಿಸಿ</span></h1>
								</div>
								<form action="<?php echo base_url('contact-submit') ?>" method="post" id="contact-form">
									<div class="row">
										<div class="col-md-6">
											<label for="name">ಹೆಸರು*</label>
											<input id="name" name="name" type="text" required="">
										</div>
										<div class="col-md-6">
											<label for="mail">ಇಮೇಲ್*</label>
											<input id="mail" name="mail" type="text" required="">
										</div>
										<div class="col-md-6">
											<label for="phone">ದೂರವಾಣಿ*</label>
											<input id="phone" name="phone" type="text" required="">
										</div>
										<div class="col-md-6">
											<label for="subject">ವಿಷಯ</label>
											<input id="subject" name="subject" type="text">
										</div>
									</div>
									<label for="comment">ನಿಮ್ಮ ಸಂದೇಶ*</label>
									<textarea id="comment" name="comment"></textarea>
									<button type="submit" id="submit-contact">
										<i class="fa fa-paper-plane"></i> ಕಳುಹಿಸಿ
									</button>
								</form>
							</div>
							<!-- End contact form box -->

						</div>

					</div>

					<div class="col-sm-2">
						<div class="right-inside-add sidebar">
							
							<div class="widget">
								<img src="http://www.winchesteril.com/wp-content/uploads/2017/10/ad-placeholder.jpg" class="img-responsive" alt="">
							</div>
							<?php if(!empty($trending)){ ?>
								<div class="widget review-widget">
									<div class="title-section">
										<h1><span>ಟ್ರೆಂಡಿಗ್ ಪೋಸ್ಟ್</span></h1>
									</div>

									<ul class="review-posts-list">

										<?php foreach ($trending as $key => $trow) { 
															
											if(empty($trow->category)){
												$urllink = $this->urls->urlFormat($trow->slug);
											}else{
												$urllink = $this->urls->urlFormat(base_url().$trow->category.'/'.$trow->slug);
											}
											(!empty($trow->content)? $content = $trow->content : $content = '' ) ;
										?>
											<li>
												<a href="<?php echo $urllink ?>">
													<img src="<?php echo base_url().$trow->image ?>" alt="">
													<h2><?php echo word_limiter(strip_tags($trow->title), 5).'...' ?></h2>
												</a>
												<!-- <span class="date">27 may 2013</span> -->
											</li>
										
										<?php } ?>
									</ul>
								</div>
							<?php } ?>
							<div class="widget">
								<a href="http://www.mindvik.com/" target="_blank">
								<img src="<?php echo base_url() ?>assets/images/ad-img2.jpg" class="img-responsive" alt=""></a>
							</div>
							<div class="widget">
								<img src="http://www.addads.net/assets/200x600S.JPG" class="img-responsive" alt="">
							</div>
							<div class="widget">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3-YcSDskfhsUagdpGVJJuM0d6NZuK1o5wU6S1guTTMWT0Oa9dEg&s" class="img-responsive" alt="">
							</div>
							<div class="advertisement">
								<div class="desktop-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/200x200.jpg" class="img-responsive" alt="">
								</div>
								<div class="tablet-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/200x200.jpg" class="img-responsive" alt="">
								</div>
								<div class="mobile-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/200x200.jpg" class="img-responsive" alt="">
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End block-wrapper-section -->

<br>
<br>
<br>
<br>
		<!-- footer 
			================================================== -->
			<?php $this->load->view('include/footer'); ?>
        
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.migrate.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.ticker.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/theia-sticky-sidebar.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/sticky.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
	<script src="https://www.jqueryscript.net/demo/Horizontal-Vertical-Image-Carousel-Slide-Fade-Animations-jqCarousel/jquery.carousel.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery.alertable.js"></script>
	<script>
	<?php if($this->session->flashdata('error')){ ?>
		$.alertable.alert('<?php echo $this->session->flashdata('error') ?>');
	<?php }?>
	<?php if($this->session->flashdata('success')){ ?>
		$.alertable.alert('<?php echo $this->session->flashdata('success') ?>');
	<?php }?>
</script>
	<script>
		$(document).ready(function () {
			$('.twitt-silder').jCarousel({
				type: 'slidey-up',
				circle: { isshow:false, },
				arrow: { isshow:false, },
				carsize: { carwidth:250, carheight:450 },
				auto: { isauto:true, interval:5000 },
			});

			$('.subscribe-form').submit(function (e) { 
				e.preventDefault();
				$.ajax({
					type: "post",
					url: "<?php echo base_url() ?>home/subscribe",
					data: {email: $('#subscribe').val()},
					dataType: "json",
					success: function (response) {
						$.notify(
							{ 
								message: 'your subscription has been successfully confirmed' 
							},
							{ 
								type: 'success',
								z_index: 9999999,
								timer: 1000,
								placement: {
									from: "top",
									align: "center"
								},
								delay: 5000,
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								},
							}
						);
					},
					error: function (response) {
						$.notify(
							{ 
								message: response.responseJSON
							},
							{ 
								type: 'danger',
								z_index: 9999999,
								timer: 1000,
								placement: {
									from: "top",
									align: "center"
								},
								delay: 5000,
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								},
							}
						);
					},
				});
				
				
			});

		});

	</script>


<script>
$(document).ready(function() {
	$("#contact-form").validate({
		rules: {
			name: { required: true, },
			mail: { required: true, email: true }, 
			phone: { required: true,minlength: 10,
                    maxlength: 10,number: true, },
			comment: { required: true, },
		},
		messages: {
			name: "Please enter your name",
			mail: {
				required: "Please enter your email",
				email: "Please enter a valid email"
			},
			phone: {
                    required: "Please enter your Mobile number",
                    number: "Please enter a valid Mobile number",
                    minlength: "Your Mobile number at least 10 digits",
                    maxlength: "Your Mobile number must be 10 digits",
                },
			comment: "Please enter the message",
		}
	});
});
</script>



</body>
</html>