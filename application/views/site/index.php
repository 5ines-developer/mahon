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
										<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
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
										echo (!empty($banner[0]->category)? '<a class="category-post" href="'.$this->urls->urlFormat(base_url().$banner[0]->category).'">'.$banner[0]->category.'</a>': ' ' ) ;
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
										<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
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
										echo (!empty($banner[3]->category)? '<a class="category-post" href="'. $this->urls->urlFormat(base_url().$banner[3]->category).'">'.$banner[3]->category.'</a>': ' ' ) ;
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
										<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
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
										echo (!empty($banner[2]->category)? '<a class="category-post" href="'.$this->urls->urlFormat(base_url().$banner[2]->category).'">'.$banner[2]->category.'</a>': ' ' ) ;
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
										<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
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
										echo (!empty($banner[4]->category)? '<a class="category-post" href="'.$this->urls->urlFormat(base_url().$banner[4]->category).'">'.$banner[4]->category.'</a>': ' ' ) ;
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
										<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
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
				<!-- <div class="col-sm-12 col-md-9 col-lg-9"> -->
					<div class="ticker-news-box">
						<span class="breaking-news">breaking news</span>
						<ul id="js-news">
							<?php foreach ($breaking as $key => $value) { ?>
								<li class="news-item"><a href="<?php echo $value->url?>"><?php echo $value->title?></li>
							<?php } ?>
						</ul>
					</div>
				<!-- </div> -->
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
											<p><a class="col-par" href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>"><?php echo (strlen(strip_tags($value->title)) > 33) ? substr(strip_tags($value->title),0,30).'...' : strip_tags($value->title);  ?></a></p>
										</div>
									<?php } ?>
									
								</div>
							<?php } ?>

							
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
						
							 if(!empty($fetured[0])){ 
								if(empty($fetured[0]->category)){
									$urllink = $this->urls->urlFormat($fetured[0]->slug);
								}else{
									$urllink = $this->urls->urlFormat(base_url().$fetured[0]->category.'/'.$fetured[0]->slug);
								}	 
							?>	
								<div class="image-post-slider">
									<ul class="ul">

										<li>
											<div class="news-post image-post2">
												<div class="post-gallery">
													<div class="featured-imgs">
														<a href="<?php echo $urllink ?>">
															<img src="<?php echo base_url().$fetured[0]->image ?>" alt="">
							 							</a>
													</div>
													<div class="hover-box overlaybox">
														<div class="inner-hover">
														<?php 
															echo (!empty($fetured[0]->category)? '<a class="category-post" href="'.$urllink.'">'.$fetured[0]->category.'</a>': ' ' ) ;
															
														?>
															<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($fetured[0]->title)) > 53) ? substr(strip_tags($fetured[0]->title),0,50).'...' : strip_tags($fetured[0]->title); ?></a></h2>
															<ul class="post-tags">
																<!--  -->
																<?php 
																	echo (!empty($fetured[0]->posted_by)? '<li><i class="fa fa-user"></i>by <a href="#!">'.$fetured[0]->posted_by .'</a></li>' : '' )
																?>
																<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
																<li><i class="fa fa-eye"></i>872</li> -->
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

												if(empty($row->category)){
													$urllink = $this->urls->urlFormat($row->slug);
												}else{
													$urllink = $this->urls->urlFormat(base_url().$row->category.'/'.$row->slug);
												}
										?>
											<li class="col-md-6">
												<div class="featuedimg-second">
												<a href="<?php echo $urllink ?>"><img src="<?php echo base_url().$row->image ?>" alt=""></a>
												</div>

												
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
									<h1><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['0']->title) ?>"><span class="green"><?php echo $cArticle['0']->title ?></span></a></h1>
								</div>

								
									<div class="row">
										<?php  foreach ($cArticle['0']->data as $key => $carow) { if($key < 2){ ?>
											<div class="item col-sm-12 col-md-6">
												<div class="news-post image-post2">
													<div class="post-gallery">
														<div class="post-gallerybox">
															<div class="afterlay">
															<a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['0']->title.'/'.$carow->slug) ?>">
																<img src="<?php echo base_url().$carow->image ?>" alt="">
															</a>
															</div>
														</div>
														<div class="hover-box">
															<div class="inner-hover">
																<!-- <a class="category-post" href="politics-category.html">Opionion</a> -->
																<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['0']->title.'/'.$carow->slug) ?>"><?php echo $carow->title ?></a></h2>
																<ul class="post-tags">
																	<!--  -->
																	<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
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
														<a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['0']->title.'/'.$carow->slug) ?>"><img src="<?php echo base_url().$carow->image ?>" alt=""></a>
														</div>
														<div class="post-content">
															<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['0']->title.'/'.$carow->slug) ?>"><?php echo $carow->title ?></a></h2>
														</div>
													</li>
												<?php } }?>	
											</ul>
										</div>
											
									</div>				
									
									<div class="row">
									<div class="title-section">
										<h1><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['2']->title) ?>"><span class="green"><?php echo $cArticle['2']->title ?></span></a></h1>
									</div>
										<?php  foreach ($cArticle['2']->data as $key => $carow) { if($key < 2){ ?>
											<div class="item col-sm-12 col-md-6">
												<div class="news-post image-post2">
													<div class="post-gallery">
														<div class="post-gallerybox">
															<div class="afterlay">
															<a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['2']->title.'/'.$carow->slug) ?>"><img src="<?php echo base_url().$carow->image ?>" alt=""></a>
															</div>
														</div>
														<div class="hover-box">
															<div class="inner-hover">
																<!-- <a class="category-post" href="politics-category.html">Opionion</a> -->
																<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['2']->title.'/'.$carow->slug) ?>"><?php echo $carow->title ?></a></h2>
																<ul class="post-tags">
																	<!--  -->
																	<!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> -->
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>		
										<?php } } ?> 
										<div class="col-sm-12">
											<ul class="list-posts column-2">
												<?php  foreach ($cArticle['2']->data as $key => $carow) { if($key >= 2){ ?>
													<li>
														<div class="featuedimg-second">
														<a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['2']->title.'/'.$carow->slug) ?>"><img src="<?php echo base_url().$carow->image ?>" alt=""></a>
														</div>
														<div class="post-content">
															<h2><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['2']->title.'/'.$carow->slug) ?>"><?php echo $carow->title ?></a></h2>
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
                                    <h1><a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['1']->title) ?>"><span class="orange"><?php echo $cArticle['1']->title ?></span></a></h1>
                                </div>
                                <ul class="list-posts column-2">
									<?php  foreach ($cArticle['1']->data as $key => $row) { ?>
										<li>
											<div class="featuedimg-second">
											<a href="<?php echo $this->urls->urlFormat(base_url().$cArticle['1']->title.'/'.$row->slug) ?>"><img src="<?php echo base_url().$row->image ?>" alt=""></a>
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

									<?php foreach ($cArticle as $key => $category) { if($key != 0 && $key != 1 && $key != 2 && $key < 5) { ?>	
										<div class="col-md-6">

											<div class="title-section">
												<h1><a href="<?php echo $this->urls->urlFormat(base_url().$category->title) ?>"><span class="blue"><?php echo  $category->title ?></span></a></h1>
											</div>
											<?php foreach ($category->data as $skey => $drow) { ?>
												<ul class="list-posts">
													<li>
														<div class="featuedimg-second">
														<a href="<?php echo $this->urls->urlFormat(base_url().$category->title.'/'.$drow->slug) ?>"><img src="<?php echo base_url().$drow->image ?>" alt=""></a>
														</div>
														<div class="post-content">
															<h2><a href="<?php echo $this->urls->urlFormat(base_url().$category->title.'/'.$drow->slug) ?>"><?php echo $drow->title ?></a></h2>
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


							<!-- photo album -->
							<!-- <?php if (!empty($album)) {?>
							<section class="features-today">
                                <div class="">

                                    <div class="title-section">
                                        <h1><span>Photo Album</span></h1>
                                    </div>

                                    <div class="features-today-box owl-wrapper gallery-slide">
                                        <div class="owl-carousel" data-num="3">
                                        <?php foreach ($album as $key => $val) {?>
                                            <div class="item news-post standard-post">
                                                <div class="post-gallery">
													<a href="<?php echo base_url('photo-album/').$val->slug ?>">
                                                    	<img src="<?php echo $val->f_image ?>" alt="">
                                                    	<div class="cont">5 photos</div>
													</a>
                                                </div>
                                                <div class="post-content">
                                                    <h2><a href="<?php echo base_url('photo-album/').$val->slug ?>"><?php echo (strlen(strip_tags($val->title)) > 53) ? substr(strip_tags($image->title),0,50).'...' : strip_tags($val->title) ?></a></h2>
                                                </div>
                                            </div>
										<?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        <?php } ?> -->
							<!-- end photo album -->


                            <!-- carousel box -->
							<div class="carousel-box owl-wrapper graydlayer">
								<div class="title-section">
									<div class="right-btn text-right">
										<span class="sbscrib">Subscribe Now</span>
										<script src="https://apis.google.com/js/platform.js"></script>
										<div class="g-ytsubscribe" data-channelid="UC00fs8iYCCtN9TlyEw_8JCg" data-layout="default" data-count="hidden"></div>
									</div>
									
									<h1><span>Featured Videos</span></h1>
									

								</div>
								<div class="owl-carousel fvideo" data-num="3">

								<?php foreach($fvideos as $key => $fvideo) { ?>
									
										<div class="item news-post standard-post">
											<div class="post-gallery">
												<div>
													<a href="<?php echo strtolower(base_url('videos/').$fvideo->category.'/'.$fvideo->slug) ?>"><img alt="" src="<?php echo $fvideo->tumb ?>"></a>
													<a class="ply-btn" href="<?php echo strtolower(base_url('videos/').$fvideo->category.'/'.$fvideo->slug) ?>" ><i class="fa fa-play"></i></a>
												</div>
											</div>
											<div class="post-content">
											<h2><a href="<?php echo strtolower(base_url('videos/').$fvideo->category.'/'.$fvideo->slug) ?>"><?php echo (strlen(strip_tags($fvideo->title)) > 58) ? substr(strip_tags($fvideo->title),0,50).'...' : strip_tags($fvideo->title);  ?></a></h2>
												<!-- <ul class="post-tags">
													<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
													<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
												</ul> -->
											</div>
										</div>

								<?php } ?>

								</div>
							</div>
                            <!-- End carousel box -->
                            
                             <section class="features-today">
                                <div class="">

                                    <div class="title-section">
                                        <h1><span>Photo gallery</span></h1>
                                    </div>

                                    <div class="features-today-box owl-wrapper gallery-slide">
                                        <div class="owl-carousel" data-num="3">
                                        <?php foreach ($gallery as $key => $image) {?>
											
                                            <div class="item news-post standard-post">
                                                <div class="post-gallery">
													<a href="<?php echo base_url('photogallery/').strtolower($image->category.'/'.$image->slug) ?>">
                                                    	<img src="<?php echo $image->image->image ?>" alt="">
													</a>
                                                </div>
                                                <div class="post-content">
                                                    <h2><a href="<?php echo base_url('photogallery/').strtolower($image->category.'/'.$image->slug) ?>"><?php echo (strlen(strip_tags($image->title)) > 53) ? substr(strip_tags($image->title),0,50).'...' : strip_tags($image->title) ?></a></h2>
                                                </div>
                                            </div>
										<?php } ?>
										</div>
										<a class="btn-photo" href="#">ಫೋಟೋ ಗ್ಯಾಲರಿ</a>
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
										<span class="number">Facebook</span>
										<!-- <span>Facebook</span> -->
									</li>
									<li>
										<a href="https://twitter.com/Mahonnathi1" class="twitter"><i class="fa fa-twitter"></i></a>
										<span class="number">Twitter</span>
										<!-- <span>Twitter</span> -->
									</li>
									<li>
										<a href="https://www.youtube.com/channel/UCOkjDTSLNf55-fzLqrhb_9A?view_as=subscriber" class="google"><i class="fa fa-youtube"></i></a>
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
															<a href="<?php echo $urllink ?>"><img src="<?php echo base_url().$tprow->image ?>" alt=""></a>
															</div>
															<div class="hover-box">
																<div class="inner-hover">
																	<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($tprow->title)) > 43) ? substr(strip_tags($tprow->title),0,40).'...' : strip_tags($tprow->title); ?></a></h2>
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
							<?php if(!empty($twitter)){ ?>
							<div class="widget tab-posts-widget">
								<div class="twitt-silder">
									<?php foreach ($twitter as $key => $twit) { ?>
										<div class="item">
											<?php echo $twit->embed ?>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
							</div>
							<div class="widget tab-posts-widget">

								<div class="title-section">
									<h1><span>POPULAR</span></h1>
								</div>

								<div class="tab-content">
									<div class="tab-pane active" id="option1">
										<ul class="list-posts" id="small-list">
									

											<?php foreach ($popular as $key => $prow) { 
												if(!empty($prow)){
												if(empty($prow->category)){
													$urllink = $this->urls->urlFormat($prow->slug);
												}else{
													$urllink = $this->urls->urlFormat(base_url().$prow->category.'/'.$prow->slug);
												}
												(!empty($prow->content)? $content = $prow->content : $content = '' ) ;
											?>
												<li>
													<div class="featuedimg-second">

													<a href="<?php echo $urllink ?>"><img src="<?php echo base_url().$prow->image ?>" alt="<?php echo $prow->title ?>"></a>
													</div>
													<div class="post-content">
														<h2><a href="<?php echo $urllink ?>"><?php echo  (strlen(strip_tags($prow->title)) > 43) ? substr(strip_tags($prow->title),0,40).'...' : strip_tags($prow->title); ?></a></h2>
													</div>
												</li>
											<?php } }?>
										</ul>
									</div>
									
								</div>
							</div>

							<div class="widget subscribe-widget">
								<form class="subscribe-form">
									<h1>Subscribe to RSS Feeds</h1>
									<input type="email" required name="sumbscribe" id="subscribe" placeholder="Email">
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
					<div class="title-section happenings-title">
                        <h1><span>Happening's</span></h1>
					</div>				
					
				<div class="owl-wrapper">
					<div class="owl-carousel" data-num="4">
						<?php foreach ($happening as $key => $value) { ?>			
							<div class="item list-post">
								<a target="_blank" href="<?php echo $value->url ?>">
								<div class="post-content">
									<span><small><?php  echo date('d M Y', strtotime($value->date)) ?></small></span>
									<h2><?php  echo $value->title ?></h2>
									<ul class="post-tags">
										<?php 
											$date2 = date('d-m-Y h:i:s');
											$date1 = date('d-m-Y h:i:s', strtotime($value->date));
											$secs = strtotime($date1) - strtotime($date2);// == <seconds between the two times>
											$days = $secs / 86400;
										 	echo '<small><i>'.intval($days).' Days left </i></small>';
										?>
									</ul>
								</div>
								</a>
							</div>
						<?php } ?>

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
	<script src="https://www.jqueryscript.net/demo/Horizontal-Vertical-Image-Carousel-Slide-Fade-Animations-jqCarousel/jquery.carousel.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.min.js"></script>
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
</body>
</html>