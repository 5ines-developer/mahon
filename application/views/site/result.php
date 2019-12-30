<!doctype html>
<html lang="en" class="no-js">
<head>
	<title>HotMagazine</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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

</head>
<body>

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
									<h1><span>Stay Connected</span></h1>
								</div>
								<ul class="social-share">
									<li>
										<a href="https://www.facebook.com/Mahonnathi-111889260186202/?modal=admin_todo_tour" class="facebook"><i class="fa fa-facebook"></i></a>
										<span class="number">Facebook</span>
										<!-- <span>Facebook</span> -->
									</li>
									<li>
										<a href="https://twitter.com/Mahonnathii" class="twitter"><i class="fa fa-twitter"></i></a>
										<span class="number">Twitter</span>
										<!-- <span>Twitter</span> -->
									</li>
									<li>
										<a href="https://www.youtube.com/channel/UC32CdzgdOb15enGuIR5QfCg/featured?view_as=subscriber" class="google"><i class="fa fa-youtube"></i></a>
										<span class="number">YouTube</span>
										<!-- <span>YouTube</span> -->
									</li>
									<li>
										<a href="https://www.instagram.com/mahonnathii/" class="rss"><i class="fa fa-instagram"></i></a>
										<span class="number">Instagram</span>
										<!-- <span>Instagram</span> -->
									</li>
								</ul>
							</div>
							<?php if(!empty($temple)){ ?>
								<div class="widget features-slide-widget">
									<div class="title-section">
										<h1><span>TEMPLE TO VISIT</span></h1>
									</div>
									<div class="image-post-slider">
										<ul class="bxslider">

											<?php foreach ($temple as $key => $tprow) { 
												
												if(empty($tprow->category)){
													$urllink = $this->urls->urlFormat($tprow->slug);
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
																	<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($tprow->title)) > 43) ? substr(strip_tags($tprow->title),0,40).'...' : strip_tags($tprow->title); ?></a></h2>
																	<ul class="post-tags">
																		<!--  -->
																		<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
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
								<img src="https://www.gourmetads.com/wp-content/uploads/2019/05/fast-food-ads-burger-king-300x600.jpg" class="img-responsive" alt="">
							</div>						
												
							
										
							<div class="widget">
								<img src="http://www.winchesteril.com/wp-content/uploads/2017/10/ad-placeholder.jpg" class="img-responsive" alt="">
							</div>
							<div class="widget">
								<img src="https://www.gourmetads.com/wp-content/uploads/2019/05/fast-food-ads-burger-king-300x600.jpg" class="img-responsive" alt="">
							</div>
							<div class="widget subscribe-widget">
								<form class="subscribe-form">
									<h1>Subscribe to RSS Feeds</h1>
									<input type="text" name="sumbscribe" id="subscribe" placeholder="Email"/>
									<button id="submit-subscribe">
										<i class="fa fa-arrow-circle-right"></i>
									</button>
									<p>Get all latest content delivered to your email a few times a month.</p>
								</form>
							</div>
							<?php if(!empty($videos)){ ?>				
								<div class="widget post-widget">
									<div class="title-section">
										<h1><span>SHORT MOVIES</span></h1>
									</div>
									<?php foreach ($videos as $key => $value) { ?>
										<div>
											<div class="news-post video-post">
												<a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>"><img alt="" src="<?php echo $value->tumb ?>"></a>
												<a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug )?>" class="video-icon"><i class="fa fa-play-circle-o"></i></a>
												
											</div>
											<p><a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>"><?php echo (strlen(strip_tags($value->title)) > 33) ? substr(strip_tags($value->title),0,30).'...' : strip_tags($value->title);  ?></a></p>
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
									<?php echo (!empty($category)? '<h1><span class="world">'.$category.'</span></h1>': '') ?>
									<?php echo (!empty($mtitle)? '<h1><span class="world">'.$mtitle.'</span></h1>': '') ?>
								</div>

                                <?php 
                                    if(!empty($post)){
                                        foreach ($post as $key => $posts) {
                                ?>
                                    <div class="news-post article-post">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="post-gallery c-post-gallery">
                                                    <img alt="" src="<?php echo base_url().$posts->image ?>">
                                                    <a class="category-post world" href="#!"><?php echo $posts->category ?></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="post-content">
                                                    <h2><a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>"><?php echo  (strlen(strip_tags($posts->title)) > 108) ? substr(strip_tags($posts->title),0,105).'...' : strip_tags($posts->title); ?></a></h2>
                                                    <ul class="post-tags">
                                                        <!-- <li><i class="fa fa-clock-o"></i>27 may 2013</li> -->
                                                        <?php 
                                                                echo (!empty($posts->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$posts->posted_by .'</a></li>' : '' )
                                                        ?>
                                                        <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                        <li><i class="fa fa-eye"></i>872</li>
                                                    </ul>
                                                    <p><?php echo  (strlen(strip_tags($posts->content)) > 230) ? substr(strip_tags($posts->content),0,227).'...' : strip_tags($posts->content); ?></p>
                                                    <a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>           

                                <?php } }else{ ?>
									<div class="error-banner">
										<h1>No Result <span>Found</span></h1>
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
										<h1><span>TRENDING POSTS</span></h1>
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
													<h2><?php echo  (strlen(strip_tags($trow->title)) > 43) ? substr(strip_tags($trow->title),0,40).'...' : strip_tags($trow->title); ?></h2>
												</a>
												<!-- <span class="date">27 may 2013</span> -->
											</li>
										
										<?php } ?>
									</ul>
								</div>
							<?php } ?>
							<div class="widget">
								<img src="https://www.gourmetads.com/wp-content/uploads/2019/05/fast-food-ads-burger-king-300x600.jpg" class="img-responsive" alt="">
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

</body>
</html>