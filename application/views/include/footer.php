<footer>
			<div class="container">
				<div class="footer-widgets-part">
					<div class="row">
						<div class="col-md-3">
							<img style="width:100%; margin-top:50px" src="<?php echo base_url() ?>assets/images/footer-logo.png" alt="mahonnathi" class="img-responsive">
						</div>
						<div class="col-md-3">
							<div class="widget posts-widget">
								<h1>Random Post</h1>
								<ul class="list-posts">
									<?php foreach (randomArticle() as $key => $rand) { ?>
										<li>
											<div class="footer-article-img">
												<img src="<?php echo base_url().$rand->image ?>" alt="">
											</div>
											<div class="post-content">
												<a href="<?php echo base_url('news/').strtolower($rand->category) ?>"><?php echo $rand->category ?></a>
												<h2><a href="<?php echo base_url('news/').strtolower($rand->category.'/'.$rand->slug) ?>"><?php echo $rand->title ?></a></h2>
												<ul class="post-tags">
													<!-- <li><i class="fa fa-clock-o"></i>27 may 2013</li> -->
												</ul>
											</div>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget categories-widget">
								<h1>Hot Categories</h1>
								<ul class="category-list">
									<?php if(!empty(categories())){ foreach(categories() as $key => $value) { if($key <= 6){ ?>
										<li><a class="world" href="<?php echo strtolower(base_url('news/').$value->title) ?>"><?php echo $value->title ?> </a> </li>
									<?php } } }?>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget text-widget">
								<h1>About</h1>
								<p>Mahonnathi is a part of Jeevan Poorna Foundation, It’s a non-profit educational and humanitarian Foundation. 
									The new age online magazine portrays the vision of Spiritual, Ancient scriptures, Culture, National articles related to achievements, 
									Patriotism, Stories, tips from the Ayurvedic Science, Astrology, Science, Vedic knowledge & Yoga. </p>
							</div>
							<div class="widget social-widget">
								<h1>Stay Connected</h1>
								<ul class="social-icons">
								<li><a class="facebook" href="https://www.facebook.com/Mahonnathi-111889260186202/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a></li>
									<li><a class="rss" href="https://www.instagram.com/mahonnathii/"><i class="fa fa-instagram"></i></a></li>
									<li><a class="twitter" href="https://twitter.com/Mahonnathii"><i class="fa fa-twitter"></i></a></li>
									<li><a class="google" href="https://www.youtube.com/channel/UC32CdzgdOb15enGuIR5QfCg/featured?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-last-line">
					<div class="row">
						<div class="col-md-6">
							<p>© Copyrights <?php echo date('Y') ?> All Rights Reserved by Mahonnathi Magazines </p>
						</div>
						<div class="col-md-6">
							<nav class="footer-nav">
								<ul>
									<li><a href="<?php echo base_url() ?>">Home</a></li>
									<li><a href="">About</a></li>
									<li><a href="">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer>
	