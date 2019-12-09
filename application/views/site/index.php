<!doctype html>
<html lang="en" class="no-js">
<head>
	<title>Mahonnathi</title>

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

		<!-- heading-news-section2
			================================================== -->
			
		<section class="heading-news2">

			<div class="container">

				<div class="iso-call heading-news-box">

					

					
					<!-- 2  -->
					<?php if(!empty($banner[1])){ ?>
						<div class="news-post image-post default-size small-post">
							<img src="<?php echo base_url().$banner[1]->image ?>" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<?php 
										echo (!empty($banner[1]->category)? '<a class="category-post" href="#!">'.$banner[1]->category.'</a>': ' ' ) ;
										if(empty($banner[1]->category)){
											$urllink = $this->urls->urlFormat($banner[1]->slug);
										}else{
											$urllink = $this->urls->urlFormat(base_url().$banner[1]->category.'/'.$banner[1]->slug);
										}
										(!empty($banner[1]->content)? $content = $banner[1]->content : $content = '' ) ;
									?>
									


									<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($banner[1]->title)) > 43) ? substr(strip_tags($banner[1]->title),0,40).'...' : strip_tags($banner[1]->title); ?></a></h2>
									<ul class="post-tags">
										<!-- <li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li> -->
										<?php 
											echo (!empty($banner[1]->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$banner[1]->posted_by .'</a></li>' : '' )
										?>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									</ul>
									<p><?php echo  (strlen(strip_tags($content )) > 43) ? substr(strip_tags($content ),0,40).'...' : strip_tags($content ); ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- 1  -->

					<?php if(!empty($banner[0])){ ?>
					<div class="image-slider snd-size">
						<span class="top-stories">TOP STORIES</span>
						
						<div class="news-post image-post ">
								<div class="topimgox">
									<img src="<?php echo base_url().$banner[0]->image ?>" alt="">
								</div>
							<div class="hover-box">
								<div class="inner-hover">
									<?php 
										echo (!empty($banner[0]->category)? '<a class="category-post" href="#!">'.$banner[0]->category.'</a>': ' ' ) ;
										if(empty($banner[0]->category)){
											$urllink = $this->urls->urlFormat($banner[0]->slug);
										}else{
											$urllink = $this->urls->urlFormat(base_url().$banner[0]->category.'/'.$banner[0]->slug);
										}
										(!empty($banner[0]->content)? $content = $banner[0]->content : $content = '' ) ;
									?>
									


									<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($banner[0]->title)) > 43) ? substr(strip_tags($banner[0]->title),0,40).'...' : strip_tags($banner[0]->title); ?></a></h2>
									<ul class="post-tags">
										<!-- <li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li> -->
										<?php 
											echo (!empty($banner[0]->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$banner[0]->posted_by .'</a></li>' : '' )
										?>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									</ul>
									<p><?php echo  (strlen(strip_tags($content )) > 203) ? substr(strip_tags($content ),0,200).'...' : strip_tags($content ); ?></p>
								</div>
							</div>
						</div>
							
					</div>
					<?php } ?>

					<!-- 4  -->
					<?php if(!empty($banner[3])){ ?>
						<div class="news-post image-post  small-post">
							<img src="<?php echo base_url().$banner[3]->image ?>" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<?php 
										echo (!empty($banner[3]->category)? '<a class="category-post" href="#!">'.$banner[3]->category.'</a>': ' ' ) ;
										if(empty($banner[3]->category)){
											$urllink = $this->urls->urlFormat($banner[3]->slug);
										}else{
											$urllink = $this->urls->urlFormat(base_url().$banner[3]->category.'/'.$banner[3]->slug);
										}
										 (!empty($banner[3]->content)? $content = $banner[3]->content : $content = '' ) ;
									?>
									


									<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($banner[3]->title)) > 43) ? substr(strip_tags($banner[3]->title),0,40).'...' : strip_tags($banner[3]->title); ?></a></h2>
									<ul class="post-tags">
										<!-- <li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li> -->
										<?php 
											echo (!empty($banner[3]->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$banner[3]->posted_by .'</a></li>' : '' )
										?>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									</ul>
									<p><?php echo  (strlen(strip_tags($content )) > 43) ? substr(strip_tags($content ),0,40).'...' : strip_tags($content ); ?></p>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- 3  -->
					<?php if(!empty($banner[2])){ ?>
						<div class="news-post image-post  small-post">
							<img src="<?php echo base_url().$banner[2]->image ?>" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<?php 
										echo (!empty($banner[2]->category)? '<a class="category-post" href="#!">'.$banner[2]->category.'</a>': ' ' ) ;
										if(empty($banner[2]->category)){
											$urllink = $this->urls->urlFormat($banner[2]->slug);
										}else{
											$urllink = $this->urls->urlFormat(base_url().$banner[2]->category.'/'.$banner[2]->slug);
										}
										 (!empty($banner[2]->content)? $content = $banner[2]->content : $content = '' ) ;
									?>
									


									<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($banner[2]->title)) > 43) ? substr(strip_tags($banner[2]->title),0,40).'...' : strip_tags($banner[2]->title); ?></a></h2>
									<ul class="post-tags">
										<!-- <li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li> -->
										<?php 
											echo (!empty($banner[2]->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$banner[2]->posted_by .'</a></li>' : '' )
										?>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									</ul>
									<p><?php echo  (strlen(strip_tags($content )) > 43) ? substr(strip_tags($content ),0,40).'...' : strip_tags($content ); ?></p>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- 5  -->
					<?php if(!empty($banner[4])){ ?>
						<div class="news-post image-post default-size small-post">
							<img src="<?php echo base_url().$banner[4]->image ?>" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<?php 
										echo (!empty($banner[4]->category)? '<a class="category-post" href="#!">'.$banner[4]->category.'</a>': ' ' ) ;
										if(empty($banner[4]->category)){
											$urllink = $this->urls->urlFormat($banner[4]->slug);
										}else{
											$urllink = $this->urls->urlFormat(base_url().$banner[4]->category.'/'.$banner[4]->slug);
										}
										 (!empty($banner[4]->content)? $content = $banner[4]->content : $content = '' ) ;
									?>
									


									<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($banner[4]->title)) > 43) ? substr(strip_tags($banner[4]->title),0,40).'...' : strip_tags($banner[4]->title); ?></a></h2>
									<ul class="post-tags">
										<!-- <li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li> -->
										<?php 
											echo (!empty($banner[4]->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$banner[4]->posted_by .'</a></li>' : '' )
										?>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									</ul>
									<p><?php echo  (strlen(strip_tags($content )) > 43) ? substr(strip_tags($content ),0,40).'...' : strip_tags($content ); ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
					

				</div>
			</div>

		</section>
		<!-- End heading-news-section -->

		<!-- ticker-news-section
			================================================== -->
		<?php if(!empty($breaking) ){ ?>
		<section class="ticker-news">
			<div class="container">
				<div class="ticker-news-box">
					<span class="breaking-news">breaking news</span>
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
			<div class="container">
				<div class="row">

					<div class="col-md-2 col-sm-0 sidebar-sticky ">

						<!-- sidebar -->
						<div class="sidebar small-sidebar theiaStickySidebar">

							<div class="widget review-widget">
								<div class="title-section">
									<h1><span>BIG STORIES</span></h1>
								</div>

								<ul class="review-posts-list">
									<li>
										<img src="https://placeimg.com/190/140/any" alt="">
										<h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum.</a></h2>
										<!-- <span class="date">27 may 2013</span> -->
									</li>
									<li>
										<h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum.</a></h2>
										<!-- <span class="date">27 may 2013</span> -->
									</li>
									<li>
										<img src="https://placeimg.com/190/140/any" alt="">
										<h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum.</a></h2>
										<!-- <span class="date">27 may 2013</span> -->
									</li>
								</ul>
							</div>

							<div class="widget post-widget">
								<div class="title-section">
									<h1><span>Featured Video</span></h1>
								</div>
								<div>
									<div class="news-post video-post">
										<img alt="" src="https://placeimg.com/153/153/any">
										<a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
										<div class="hover-box">
											<h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
										<p></p>
									</div>
									<p>Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. </p>
								</div>
								<div>
									<div class="news-post video-post">
										<img alt="" src="https://placeimg.com/154/154/any">
										<a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
										<div class="hover-box">
											<h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
										<p></p>
									</div>
									<p>Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. </p>
								</div>
							</div>

							<div class="advertisement">
								<div class="desktop-advert">
									<img src="https://placeimg.com/154/154/any" alt="">
								</div>
							</div>

							

						</div>

					</div>

					<div class="col-md-7 col-sm-8 content-blocker brd">

						<!-- block content -->
						<div class="block-content">

							<!-- grid box -->
							<div class="grid-box">

								<div class="title-section">
									<h1 class=""><span class="red">Today's Featured</span></h1>
								</div>

								
							<?php 
						
							 if(!empty($fetured[0])){ ?>	
								<div class="image-post-slider">
									<ul class="ul">

										<li>
											<div class="news-post image-post2">
												<div class="post-gallery">
													<div class="featured-imgs">
														<img src="<?php echo base_url().$fetured[0]->image ?>" alt="">
													</div>
													<div class="hover-box overlaybox">
														<div class="inner-hover">
														<?php 
															echo (!empty($fetured[0]->category)? '<a class="category-post" href="#!">'.$fetured[0]->category.'</a>': ' ' ) ;
															if(empty($fetured[0]->category)){
																$urllink = $this->urls->urlFormat($fetured[0]->slug);
															}else{
																$urllink = $this->urls->urlFormat(base_url().$fetured[0]->category.'/'.$fetured[0]->slug);
															}
														?>
															<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($fetured[0]->title)) > 53) ? substr(strip_tags($result[0]->title),0,50).'...' : strip_tags($result[0]->title); ?></a></h2>
															<ul class="post-tags">
																<!--  -->
																<?php 
																	echo (!empty($fetured[0]->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$fetured[0]->posted_by .'</a></li>' : '' )
																?>
																<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
																<li><i class="fa fa-eye"></i>872</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							<?php } if(!empty($fetured)){ ?>	

								<div class="row">
									
									<ul class="list-posts">
										<?php foreach ($fetured as $key => $row) { 
											if(!empty($row->id) && $key > 0 ){
										?>
											<li class="col-md-6">
												<div class="featuedimg-second">
													<img src="<?php echo base_url().$row->image ?>" alt="">
												</div>

												<?php 
													if(empty($row->category)){
														$urllink = $this->urls->urlFormat($row->slug);
													}else{
														$urllink = $this->urls->urlFormat(base_url().$row->category.'/'.$row->slug);
													}
												?>
												<div class="post-content">
													<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($row->title)) > 53) ? substr(strip_tags($row->title),0,50).'...' : strip_tags($row->title); ?></a></h2>
													<ul class="post-tags">
														<!--  -->
													</ul>
												</div>
											</li>
										<?php } }?>
										
									</ul>
								</div>
							<?php } ?>
							</div>
							<!-- End grid box -->


							<!-- carousel box Nation -->
							<?php if(!empty( $cArticle['0'])){ ?>
							<div class="carousel-box owl-wrapper">

								<div class="title-section">
									<h1><span class="green"><?php echo $cArticle['0']->title ?></span></h1>
								</div>

								
									<div class="row">
										<?php  foreach ($cArticle['0']->data as $key => $carow) { if($key < 2){ ?>
											<div class="item col-sm-12 col-md-6">
												<div class="news-post image-post2">
													<div class="post-gallery">
														<div class="post-gallerybox">
															<img src="<?php echo base_url().$carow->image ?>" alt="">
														</div>
														<div class="hover-box">
															<div class="inner-hover">
																<!-- <a class="category-post" href="politics-category.html">Opionion</a> -->
																<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['0']->title.'/'.$carow->slug) ?>"><?php echo $carow->title ?></a></h2>
																<ul class="post-tags">
																	<!--  -->
																	<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>		
										<?php } } ?> 
										<div class="col-sm-12">
											<ul class="list-posts column-2">
												<?php  foreach ($cArticle['0']->data as $key => $carow) { if($key >= 2){ ?>
													<li>
														<div class="featuedimg-second">
															<img src="<?php echo base_url().$carow->image ?>" alt="">
														</div>
														<div class="post-content">
															<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['1']->title.'/'.$carow->slug) ?>"><?php echo $carow->title ?></a></h2>
														</div>
													</li>
												<?php } }?>	
											</ul>
										</div>
											
									</div>				
									

								
									

								

							</div>
							<?php } ?>
                            <!-- End carousel box -->
                            <?php if(!empty( $cArticle['1'])){ ?>
                            <!-- carousel box Spirtual -->
							<div class="carousel-box owl-wrapper">

                                <div class="title-section">
                                    <h1><span class="orange"><?php echo $cArticle['1']->title ?></span></h1>
                                </div>
                                <ul class="list-posts column-2">
									<?php  foreach ($cArticle['1']->data as $key => $row) { ?>
										<li>
											<div class="featuedimg-second">
												<img src="<?php echo base_url().$row->image ?>" alt="">
											</div>
											<div class="post-content">
												<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['1']->title.'/'.$row->slug) ?>"><?php echo $row->title ?></a></h2>
											</div>
										</li>
									<?php } ?>
                                </ul>

                            </div>
                            <!-- End carousel box -->
							<?php } ?>			
							<!-- advertisement -->
							<div class="advertisement">
								<div class="desktop-advert">
									<img src="<?php echo base_url()?>assets/upload/addsense/600x80.jpg" alt="">
								</div>
								<div class="tablet-advert">
									<img src="<?php echo base_url()?>assets/upload/addsense/468x60-white.jpg" alt="">
								</div>
								<div class="mobile-advert">
									<img src="<?php echo base_url()?>assets/upload/addsense/300x250.jpg" alt="">
								</div>
							</div>

							<!-- Technology -->
							<div class="grid-box">

								<div class="row">

									<?php foreach ($cArticle as $key => $category) { if($key != 0 && $key != 1 && $key < 4) { ?>	
										<div class="col-md-6">

											<div class="title-section">
												<h1><span class="blue"><?php echo  $category->title ?></span></h1>
											</div>
											<?php foreach ($category->data as $skey => $drow) { ?>
												<ul class="list-posts">
													<li>
														<div class="featuedimg-second">
															<img src="<?php echo base_url().$drow->image ?>" alt="">
														</div>
														<div class="post-content">
															<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['1']->title.'/'.$drow->slug) ?>"><?php echo $drow->title ?></a></h2>
															<ul class="post-tags">
																<!-- <li><i class="fa fa-clock-o"></i>27 may 2013</li> -->
															</ul>
														</div>
													</li>
												</ul>
											<?php } ?>
										</div>
									<?php }} ?>	

								</div>

							</div>

                            <!-- carousel box -->
							<div class="carousel-box owl-wrapper darkcorocol">
								<div class="title-section">
									<h1><span>Most viewed</span></h1>
								</div>
								<div class="owl-carousel" data-num="4">
								<?php for ($i=0; $i < 7; $i++) { ?>
									<div class="item news-post video-post">
										<img src="https://placeimg.com/185/180/any" alt="">
										<a href="https://vimeo.com/47511875" class="video-link"><i class="fa fa-play-circle-o"></i></a>
										<div class="hover-box">
											<h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a></h2>
											
										</div>
									</div>
								<?php } ?>

								</div>
							</div>
                            <!-- End carousel box -->
                            
                            <section class="features-today">
                                <div class="">

                                    <div class="title-section">
                                        <h1><span>Today's Featured</span></h1>
                                    </div>

                                    <div class="features-today-box owl-wrapper">
                                        <div class="owl-carousel" data-num="3">
                                        <?php for ($i=0; $i < 6; $i++) { ?>
											
                                            <div class="item news-post standard-post">
                                                <div class="post-gallery">
                                                    <img src="https://placeimg.com/153/153/any" alt="">
                                                    <a class="category-post world" href="world.html">Music</a>
                                                </div>
                                                <div class="post-content">
                                                    <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                    <ul class="post-tags">
                                                        
                                                        <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                        <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
										<?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </section>

						</div>
						<!-- End block content -->

					</div>

					<div class="col-md-3 col-sm-4 sidebar-sticky">

						<!-- sidebar -->
						<div class="sidebar large-sidebar theiaStickySidebar">

							<div class="widget social-widget">
								<div class="title-section">
									<h1><span>Stay Connected</span></h1>
								</div>
								<ul class="social-share">
									
									<li>
										<a href="https://www.facebook.com/Mahonnathi-111889260186202/?modal=admin_todo_tour" class="facebook"><i class="fa fa-facebook"></i></a>
										<span class="number">56,743</span>
										<span>Fans</span>
									</li>
									<li>
										<a href="https://twitter.com/Mahonnathii" class="twitter"><i class="fa fa-twitter"></i></a>
										<span class="number">43,501</span>
										<span>Followers</span>
									</li>
									<li>
										<a href="https://www.youtube.com/channel/UC32CdzgdOb15enGuIR5QfCg/featured?view_as=subscriber" class="google"><i class="fa fa-youtube"></i></a>
										<span class="number">35,003</span>
										<span> Subscribers</span>
									</li>
									<li>
										<a href="https://www.instagram.com/mahonnathii/" class="rss"><i class="fa fa-instagram"></i></a>
										<span class="number">9,455</span>
										<span>Followers</span>
									</li>
								</ul>
							</div>

							<div class="widget features-slide-widget">
								<div class="title-section">
									<h1><span>Featured Posts</span></h1>
								</div>
								<div class="image-post-slider">
									<ul class="bxslider">
										<li>
											<div class="news-post image-post2">
												<div class="post-gallery">
													<img src="https://placeimg.com/270/240/any" alt="">
													<div class="hover-box">
														<div class="inner-hover">
															<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam pharetra a, ultricies in, diam. </a></h2>
															<ul class="post-tags">
																<!--  -->
																<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="news-post image-post2">
												<div class="post-gallery">
													<img src="https://placeimg.com/270/240/any" alt="">
													<div class="hover-box">
														<div class="inner-hover">
															<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam pharetra a, ultricies in, diam. </a></h2>
															<ul class="post-tags">
																<!--  -->
																<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="news-post image-post2">
												<div class="post-gallery">
													<img src="https://placeimg.com/270/240/any" alt="">
													<div class="hover-box">
														<div class="inner-hover">
															<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam pharetra a, ultricies in, diam. </a></h2>
															<ul class="post-tags">
																<!--  -->
																<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<ul class="list-posts">
									<li>
										<img src="https://placeimg.com/109/109/any" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<!--  -->
											</ul>
										</div>
									</li>

									<li>
										<img src="https://placeimg.com/109/109/any" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
											<ul class="post-tags">
												<!--  -->
											</ul>
										</div>
									</li>
								</ul>
							</div>

							<div class="advertisement">
								<div class="desktop-advert">
									<span>Advertisement</span>
									<img src="<?php echo base_url() ?>assets/upload/addsense/250x250.jpg" alt="">
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

							<div class="widget tab-posts-widget">

								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a href="#option1" data-toggle="tab">Popular</a>
									</li>
									<li>
										<a href="#option2" data-toggle="tab">Recent</a>
									</li>
								</ul>

								<div class="tab-content">
									<div class="tab-pane active" id="option1">
										<ul class="list-posts">
										<?php for ($i=0; $i < 6; $i++) {  ?>
											<li>
												<img src="https://placeimg.com/110/110/any" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam pharetra a, ultricies in, diam. </a></h2>
													<ul class="post-tags">
														<!--  -->
													</ul>
												</div>
											</li>
										<?php } ?>
										</ul>
									</div>
									<div class="tab-pane" id="option2">
										<ul class="list-posts">

										<?php for ($i=0; $i < 5; $i++) {  ?>
											<li>
												<img src="https://placeimg.com/108/108/any" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam pharetra a, ultricies in, diam. </a></h2>
													<ul class="post-tags">
														<!--  -->
													</ul>
												</div>
											</li>
										<?php } ?>
												<img src="<?php echo base_url() ?>assets/upload/news-posts/listw2.jpg" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
													<ul class="post-tags">
														<!--  -->
													</ul>
												</div>
											</li>
										</ul>										
									</div>
								</div>
							</div>

							<div class="widget subscribe-widget">
								<form class="subscribe-form">
									<h1>Subscribe to RSS Feeds</h1>
									<input type="text" name="sumbscribe" id="subscribe" placeholder="Email">
									<button id="submit-subscribe">
										<i class="fa fa-arrow-circle-right"></i>
									</button>
									<p>Get all latest content delivered to your email a few times a month.</p>
								</form>
							</div>

							<div class="widget hcate categories-widget">
								<div class="title-section">
									<h1><span>Categories</span></h1>
								</div>
								<ul class="category-list">
								<?php if(!empty(categories())){ foreach(categories() as $key => $value) { ?>
									<li><a class="world" href="<?php echo $this->urls->urlFormat(base_url().$value->title) ?>"><?php echo $value->title ?> <span><?php echo $value->total ?></span></a> </li>
								<?php } } ?>	
								</ul>
							</div>

						</div>
						<!-- End sidebar -->

					</div>

				</div>

			</div>
		</section>
		<!-- End block-wrapper-section -->

		<!-- list line posts section -->
		<div class="list-line-posts">
			<div class="container">

				<div class="owl-wrapper">
					<div class="owl-carousel" data-num="4">

						<div class="item list-post">
							<div class="post-content">
								<a href="politics-category.html">Opinion</a>
								<h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. </a></h2>
								<ul class="post-tags">
									<!--  -->
								</ul>
							</div>
						</div>

						<div class="item list-post">
							<div class="post-content">
								<a href="politics-category.html">World</a>
								<h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
								<ul class="post-tags">
									<!--  -->
								</ul>
							</div>
						</div>

						<div class="item list-post">
							<div class="post-content">
								<a href="politics-category.html">Video</a>
								<h2><a href="single-post.html">Aliquam porttitor mauris sit amet orci. </a></h2>
								<ul class="post-tags">
									<!--  -->
								</ul>
							</div>
						</div>

						<div class="item list-post">
							<div class="post-content">
								<a href="politics-category.html">Elections</a>
								<h2><a href="single-post.html">Morbi in sem quis dui placerat ornare. </a></h2>
								<ul class="post-tags">
									<!--  -->
								</ul>
							</div>
						</div>

						<div class="item list-post">
							<div class="post-content">
								<a href="politics-category.html">Nations</a>
								<h2><a href="single-post.html">Morbi in sem quis dui placerat ornare. </a></h2>
								<ul class="post-tags">
									<!--  -->
								</ul>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
		<!-- End list line posts section -->

		

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
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/theia-sticky-sidebar.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/sticky.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>

</body>
</html>