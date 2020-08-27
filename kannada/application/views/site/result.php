<?php 
$this->ci =& get_instance();
$bimg = (!empty($banner[0]->image))?$banner[0]->image:'';
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<title>Mahonnathi</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/widget.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157746630-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157746630-1');
</script>

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
            <section class="block-wrapper left-sidebar">
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

					<div class="col-sm-7">

						<!-- block content -->
						<div class="block-content">
							<!-- article box -->
							<div class="article-box">
								<div class="title-section">
									<?php

									if(!empty($vid)){
										echo (!empty($post[0]->kannada)? '<h1><span class="world">'.$post[0]->kannada.'</span></h1>': '<h1><span class="world">ವೀಡಿಯೊ</span></h1>');
									}else{
										echo (!empty($post[0]->kannada)? '<h1><span class="world">'.$post[0]->kannada.'</span></h1>': '');

									}  ?>
									<?php echo (!empty($mtitle)? '<h1><span class="world">'.$mtitle.'</span></h1>': '') ?>
								</div>

                                <?php 
                                    if(!empty($post)){
                                        foreach ($post as $key => $posts) {
                                        	$cat = $this->urls->checkCat($posts->category);
                                ?>
                                    <div class="news-post article-post">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="post-gallery c-post-gallery">
                                                    <img alt="" src="<?php echo base_url().$posts->image ?>">
                                                    <a class="category-post world" href="#!"><?php echo $posts->kannada ?></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="post-content">
                                                    <h2><a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>"><?php echo word_limiter(strip_tags($posts->title), 6).'...' ?></a></h2>
                                                    <ul class="post-tags">
                                                        <!-- <li><i class="fa fa-clock-o"></i>27 may 2013</li> -->
                                                        <?php 
                                                                echo (!empty($posts->author)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$posts->author .'</a></li>' : '' )
                                                        ?>
                                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
                                                        <!-- <li><i class="fa fa-eye"></i>872</li> -->
                                                    </ul>
                                                    <p><?php echo word_limiter(strip_tags($posts->content), 10).'...' ?></p>
                                                    <a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>           

                                <?php } }else if(!empty($vid)){
	                                	echo '<div class="title-section">
										<h1><span class="world">ಫೀಚರ್ಡ್ ವೀಡಿಯೊಗಳು</span></h1>
										</div>';
                                	foreach ($vid as $key => $vids) {

                                    if($vids->vtype == 'featured'){?>
                                	<div class="news-post article-post">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="post-gallery c-post-gallery">
                                                    <img alt="" src="<?php echo $vids->tumb ?>">
                                                    <a class="category-post world" href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>"><?php echo $vids->kannada ?></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="post-content">
                                                    <h2><a href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>"><?php echo word_limiter(strip_tags($vids->title), 6).'...' ?></a></h2>
                                                    <ul class="post-tags">
                                                        <!-- <li><i class="fa fa-clock-o"></i>27 may 2013</li> -->
                                                        <?php 
                                                                echo (!empty($vids->created_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$vids->created_by .'</a></li>' : '' )
                                                        ?>
                                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
                                                        <!-- <li><i class="fa fa-eye"></i>872</li> -->
                                                    </ul>
                                                    <p><?php echo strip_tags($vids->content) ?></p>
                                                    <a href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } }

                                echo '<div class="title-section">
										<h1><span class="world">ಕಿರುಚಿತ್ರ</span></h1>
										</div>';

										foreach ($vid as $key => $vids) {
                                    

										if($vids->vtype == 'short'){ ?>
	                                	<div class="news-post article-post">
	                                        <div class="row">
	                                            <div class="col-sm-6">
	                                                <div class="post-gallery c-post-gallery">
	                                                    <img alt="" src="<?php echo $vids->tumb ?>">
	                                                    <a class="category-post world" href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>"><?php echo $vids->kannada ?></a>
	                                                </div>
	                                            </div>
	                                            <div class="col-sm-6">
	                                                <div class="post-content">
	                                                    <h2><a href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>"><?php echo word_limiter(strip_tags($vids->title), 6).'...' ?></a></h2>
	                                                    <ul class="post-tags">
	                                                        <!-- <li><i class="fa fa-clock-o"></i>27 may 2013</li> -->
	                                                        <?php 
	                                                                echo (!empty($vids->created_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$vids->created_by .'</a></li>' : '' )
	                                                        ?>
	                                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
	                                                        <!-- <li><i class="fa fa-eye"></i>872</li> -->
	                                                    </ul>
	                                                    <p><?php echo strip_tags($vids->content) ?></p>
	                                                    <a href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>View</a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
                                <?php } } 
                                  } else{ ?>
									<div class="error-banner">
										<h3 style="color: #fff;">No Result <span>Found</span></h3>
										<p>Oops! It looks like nothing was found at this search. Maybe try another search?</p>
									</div>

								<?php } ?>	
							</div>
							<!-- End article box -->

							<!-- google addsense -->
							<div class="advertisement">
								<div class="desktop-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/728x90-white.jpg" alt="">
								</div>
								<div class="tablet-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/468x60-white.jpg" alt="">
								</div>
								<div class="mobile-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
								</div>
							</div>
							<!-- End google addsense -->

						</div>
						<!-- End block content -->

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
								<a href="http://www.mindvik.com/" target="_blank">
								<img src="<?php echo base_url() ?>assets/images/ad-img7.png" class="img-responsive" alt=""></a>
							</div>
							<div class="widget">
								<a href="<?php echo base_url() ?>" target="_blank">
								<img src="<?php echo base_url() ?>assets/images/ad-img6.jpg" class="img-responsive" alt=""></a>
							</div>
							<div class="advertisement">
								<div class="desktop-advert">
									<span>Advertisement</span>
									<a href="<?php echo base_url() ?>" target="_blank">
								<img src="<?php echo base_url() ?>assets/images/ad-img8.png" class="img-responsive" alt=""></a>
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

		<!-- footer 
			================================================== -->
        <?php $this->load->view('include/footer'); ?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.migrate.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.ticker.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.min.js"></script>
	<script>
		$(document).ready(function () {
			

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
								delay: 5000,
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								},
								placement: {
									from: "top",
									align: "center"
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
								delay: 5000,
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								},
								placement: {
									from: "top",
									align: "center"
								},
							}
						);
					},
				});
				
				
			});

		});

	</script>	

</body>
</html>