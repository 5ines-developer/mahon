<!doctype html>
<html lang="en" class="no-js">
<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	
	<?php  if(!empty($post)){ ?>
		<!-- Meta tags -->
		<title><?php echo $post->ptitle ?></title>
		<meta name="description" content="<?php echo $post->pdes ?>" />
		<meta name="keywords" content="<?php echo $post->pkeyword ?>" />
		<!-- facebook meta tags -->
		<meta property="fb:pages" content="454748752068930" />
		<meta property="og:image" content="<?php echo base_url().$post->image ?>" />
		<meta property="og:title" content="<?php echo $post->ftitle ?>">
		<meta property="og:site_name" content="Mahonnathi">
		<meta property="og:url" content="<?php echo current_url() ?>">
		<meta property="og:description" content="<?php echo $post->fdes ?>">
		<meta property="og:type" content="website">
		<!-- Twitter card -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@Mahonnathi">
		<meta name="twitter:image" content="<?php echo base_url().$post->image ?>">
		<meta name="twitter:url" content="<?php echo base_url() ?>">
		<meta name="twitter:title" content="<?php echo $post->ttitle ?>">
		<meta name="twitter:description" content="<?php echo $post->tdes ?>">
	<?php  } ?>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/magnific-popup.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/owl.theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/ticker-style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" media="screen">
	<style>
		.auther-image {
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 50%;
	float: left;
}
.auther-image img{max-width:100% !important; border-radius:0px !important}
	</style>

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

	<!-- Container -->
	<div id="container">

		<!-- Header
		    ================================================== -->
            <?php $this->load->view('include/header'); ?>
		<!-- End Header -->

		<!-- ticker-news-section
			================================================== -->
			<?php if(!empty($breaking) ){ ?>
				<section class="ticker-news">
					<div class="container">
						<div class="ticker-news-box">
							<span class="breaking-news">ಬ್ರೇಕಿಂಗ್ ನ್ಯೂಸ್</span>
							<ul id="js-news">
								<?php foreach ($breaking as $key => $value) { ?>
									<li class="news-item"><a href="<?php echo $value->url?>"><?php echo $value->title?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</section>
			<?php } ?>
		<!-- End ticker-news-section -->

		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container-fluid1">
				<div class="row">
					<div class="col-sm-2">
						<div class="sidebar">
							<?php if(!empty($videos)){ ?>
								<div class="widget post-widget">
									<div class="title-section">
										<h1><span>ಕಿರು ಚಿತ್ರ</span></h1>
									</div>
									<?php foreach ($videos as $key => $value) { ?>
										<div>
											<div class="news-post video-post">
												<a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>"><img alt="" src="<?php echo $value->tumb ?>"></a>
												<a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug )?>" class="video-icon"><i class="fa fa-play-circle-o"></i></a>
												
											</div>
											<p><a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>">
												<?php echo word_limiter(strip_tags($value->title), 4).'...' ?></a></p>
										</div>
									<?php } ?>
									
								</div>
							<?php } ?>

							<div class="widget">
								<div style="height: 500px; background: #428bca; color: #fff; line-height: 500px; text-align: center; ">ADS Goes Here  194 x 500</div>
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
								<div style="height: 400px; background: #42ca97; color: #fff; line-height: 400px; text-align: center; ">ADS Goes Here  194 x 400</div>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						<?php if(!empty($post))	{ ?>		
							<!-- block content -->
							<div class="block-content related-article"  data_slug="<?php echo  $post->slug ?>">

								<!-- single-post box -->
								<div class="single-post-box">

									<div class="title-post">
										<h1><?php echo $post->title ?></h1>
										<ul class="post-tags">
											<li><i class="fa fa-clock-o"></i><?php echo $post->created_on ?></li>
											<?php echo (!empty($post->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#">'.$post->author->name.'</a></li>' : '') ?>
											<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li> -->
											<!-- <li><i class="fa fa-eye"></i>872</li> -->
										</ul>
									</div>

									<div class="share-post-box">
										<ul class="share-box">
											<li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
											<li><a class="facebook" href="http://www.facebook.com/sharer.php?s=100&p[summary]=<?php echo $post->title ?>&p[url]=<?php echo current_url(); ?>&p[title]=<?php echo $post->title ?>" target="_blank"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>

											

											<li><a class="twitter" href="http://twitter.com/share?text=<?php echo $post->title ?>&url=<?php echo current_url(); ?>" target="_blank"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>
											<li><a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo current_url(); ?>" target="_blank"><i class="fa fa-linkedin"></i> &nbsp;&nbsp;<span>Share on Linkedin</span></a></li>
										</ul>
									</div>

									<div class="post-gallery">
										<img src="<?php echo base_url().$post->image ?>" alt="">
										<!-- <span class="image-caption">Cras eget sem nec dui volutpat ultrices.</span> -->
									</div>

									<div class="post-content">
										<?php echo $post->content ?>
									</div>

									

									<div class="post-tags-box">
										<ul class="tags-box">
											<li><i class="fa fa-tags"></i><span>Tags:</span></li>
											<?php  
											foreach (explode(',', $post->tags) as $key => $value) {
											?>
											<li><a href="#"><?php echo  $value ?></a></li>
											<?php } ?>
										</ul>
									</div>

									

									<div class="about-more-autor">
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#about-autor" data-toggle="tab">About The Author</a>
											</li>
										</ul>

										<div class="tab-content">

											<div class="tab-pane active" id="about-autor">
												<div class="autor-box">
													<div class="auther-image">

														<img src="<?php echo (!empty($post->author->profile))?base_url().$post->author->profile:''; ?>" alt="">
													</div>
													<div class="autor-content">
														<div class="autor-title">
															<h1><span><?php echo (!empty($post->author->name))?$post->author->name:''; ?></span>
															<!-- <a href="autor-details.html">18 Posts</a> -->
															</h1>
															<!-- <ul class="autor-social">
																<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
																<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
																<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
																<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
																<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
																<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
																<li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
															</ul> -->
														</div>
														<p>
															<?php echo (!empty($post->author->des))?$post->author->des:''; ?>
														</p>
													</div>
												</div>
											</div>

											

										</div>
									</div>

									<!-- carousel box -->
								
									<!-- End carousel box -->

									<!-- contact form box -->
									<div class="contact-form-box">
										<div class="title-section">
											<h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
										</div>
										<form id="comment-form">
											<div class="row">
												<div class="col-md-4">
													<label for="name">Name*</label>
													<input id="name" name="name" type="text">
												</div>
												<div class="col-md-4">
													<label for="mail">E-mail*</label>
													<input id="mail" name="mail" type="text">
												</div>
												<div class="col-md-4">
													<label for="website">Website</label>
													<input id="website" name="website" type="text">
												</div>
											</div>
											<label for="comment">Comment*</label>
											<textarea id="comment" name="comment"></textarea>
											<button type="submit" id="submit-contact">
												<i class="fa fa-comment"></i> Post Comment
											</button>
										</form>
									</div>
									<!-- End contact form box -->


									<div class="row">
										<div class="re-ad-block">
											<div class="col-lg-4">
												<div class="advertisement">
													<div class="desktop-advert">
														<span>Advertisement</span>
														<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
														<!-- <h6>Sponsored Heading</h6>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis eveniet placeat minima.</p> -->
													</div>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="advertisement">
													<div class="desktop-advert">
														<span>Advertisement</span>
														<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
														<!-- <h6>Sponsored Heading</h6>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis eveniet placeat minima.</p> -->
													</div>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="advertisement">
													<div class="desktop-advert">
														<span>Advertisement</span>
														<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
														<!-- <h6>Sponsored Heading</h6>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis eveniet placeat minima.</p> -->
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
								<!-- End single-post box -->

							</div>
							<!-- End block content -->

							<!-- article 2 -->
							
								
							<!-- end article -->
						<?php } ?>	

						<?php if(!empty($related)): foreach ($related as $key => $post): ?>
							<div class="next-story-border"><span class="f-spon"> ಮುಂದಿನ ಲೇಖನ</span></div>
							
								<div class="block-content related-article" data_slug="<?php echo  $post->slug ?>">
								<!-- single-post box -->
								<div class="single-post-box">

									<div class="title-post">
										<h1><?php echo $post->title ?></h1>
										<ul class="post-tags">
											<li><i class="fa fa-clock-o"></i><?php echo $post->created_on ?></li>
											<?php echo (!empty($post->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#">'.$post->author->name.'</a></li>' : '') ?>
											<li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li>
											<li><i class="fa fa-eye"></i>872</li>
										</ul>
									</div>

									<div class="share-post-box">
										<ul class="share-box">
											<li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
											<li><a class="facebook" href="http://www.facebook.com/sharer.php?s=100&p[summary]=<?php echo $post->title ?>&p[url]=<?php echo current_url(); ?>&p[title]=<?php echo $post->title ?>" target="_blank"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>
											<li><a class="twitter" href="http://twitter.com/share?text=<?php echo $post->title ?>&url=<?php echo current_url(); ?>" target="_blank"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>
											<li><a class="linkedin"href="http://www.linkedin.com/shareArticle?mini=true&amp;amp;url=<?php echo current_url(); ?>/&amp;amp;title=<?php echo $post->title ?>&amp;amp;source=<?php echo base_url() ?>" target="_blank"><i class="fa fa-linkedin"></i> &nbsp;&nbsp;<span>Share on Linkedin</span></a></li>
										</ul>
									</div>

									<div class="post-gallery">
										<img src="<?php echo base_url().$post->image ?>" alt="">
										<!-- <span class="image-caption">Cras eget sem nec dui volutpat ultrices.</span> -->
									</div>

									<div class="post-content">
										<?php echo $post->content ?>
									</div>

									

									<div class="post-tags-box">
										<ul class="tags-box">
											<li><i class="fa fa-tags"></i><span>Tags:</span></li>
											<?php  
											foreach (explode(',', $post->tags) as $key => $value) {
											?>
											<li><a href="#"><?php echo  $value ?></a></li>
											<?php } ?>
										</ul>
									</div>


									<div class="row">
										<div class="re-ad-block">
											<div class="col-lg-4">
												<div class="advertisement">
													<div class="desktop-advert">
														<span>Advertisement</span>
														<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
														<!-- <h6>Sponsored Heading</h6>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis eveniet placeat minima.</p> -->
													</div>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="advertisement">
													<div class="desktop-advert">
														<span>Advertisement</span>
														<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
														<!-- <h6>Sponsored Heading</h6>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis eveniet placeat minima.</p> -->
													</div>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="advertisement">
													<div class="desktop-advert">
														<span>Advertisement</span>
														<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
														<!-- <h6>Sponsored Heading</h6>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis eveniet placeat minima.</p> -->
													</div>
												</div>
											</div>
										</div>
									</div>

									
								</div>
							</div>
							<br>
						<?php endforeach; endif;?>  					
					</div>

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
										<a href="https://www.youtube.com/channel/UC00fs8iYCCtN9TlyEw_8JCg" class="google"><i class="fa fa-youtube"></i></a>
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

							<div class="widget">
								<div style="height: 400px; background: #ca4242; color: #fff; line-height: 400px; text-align: center; ">ADS Goes Here  194 x 400</div>
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
													$urllink = $this->urls->urlFormat((!empty($tprow->slug)?$tprow->slug:''));
												}else{
													$urllink = $this->urls->urlFormat(base_url().$tprow->category.'/'.$tprow->slug);
												}
												(!empty($tprow->content)? $content = $tprow->content : $content = '' ) ;
											?>
											<li class="temple-to-visit">
												<a href="<?php echo $urllink ?>">
													<div class="news-post image-post2">
														<div class="post-gallery">
															<div class="verticle">
																<img src="<?php echo base_url().$tprow->image ?>" alt="">
															</div>
															<div class="hover-box">
																<div class="inner-hover">
																	<h2><a href="<?php echo $urllink ?>">
																		<?php echo word_limiter(strip_tags($tprow->title), 5).'...' ?></a></h2>
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
								<div style="height: 450px; background: #001248; color: #fff; line-height: 400px; text-align: center; ">ADS Goes Here  194 x 400</div>
							</div>

							<div class="widget tab-posts-widget">

								<div class="title-section">
									<h1><span>Recommended</span></h1>
								</div>

								<div class="tab-content">
									<div class=>
										
									

											<?php foreach ($popular as $key => $prow) { 
												if(!empty($prow)){
												if(empty($prow->category)){
													$urllink = $this->urls->urlFormat($prow->slug);
												}else{
													$urllink = $this->urls->urlFormat(base_url().$prow->category.'/'.$prow->slug);
												}
												(!empty($prow->content)? $content = $prow->content : $content = '' ) ;
											?>

											<div class="news-post standard-post2 mb">
												<div class="post-gallery">
												<a href="<?php echo $urllink ?>"><img src="<?php echo base_url().$prow->image ?>" alt="<?php echo $prow->title ?>"></a>
												</div>
												<div class="post-title">
												<p><a href="<?php echo $urllink ?>">
													<?php echo word_limiter(strip_tags($prow->title), 5).'...' ?></a></p>
												</div>
											</div>
											<?php } }?>
										
									</div>
									
								</div>
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

							

							<div class="advertisement">
								<div class="desktop-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
								</div>
								<div class="tablet-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/200x200.jpg" alt="">
								</div>
								<div class="mobile-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/300x250.jpg" alt="">
								</div>
							</div>

						</div>
						<!-- End sidebar -->

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>	
	<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.min.js"></script>
	<script>
	
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
	<script>
		$(document).ready(function () {
			setTimeout(() => {
				var waypoints = $('.related-article').waypoint({
					handler: function(direction) {
					var url = this.element.attributes.data_slug.value
					history.pushState(null, url, url);
					}
				})
			}, 2000);
		});
	</script>

</body>
</html>