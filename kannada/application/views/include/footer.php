<footer>
			<div class="container">
				<div class="footer-widgets-part">
					<div class="row">
						<div class="col-md-3">
							<img style="width:100%; margin-top:50px" src="<?php echo base_url() ?>assets/images/LOGO-kannada.png" alt="mahonnathi" class="img-responsive">
						</div>
						<div class="col-md-3">
							<div class="widget posts-widget">
								<h1>ರಾಂಡಮ್ ಪೋಸ್ಟ್ </h1>
								<ul class="list-posts">
									<?php foreach (randomArticle() as $key => $rand) { ?>
										<li>
											<div class="footer-article-img">
												<img src="<?php echo base_url().$rand->image ?>" alt="">
											</div>
											<div class="post-content">
												<a href="<?php echo $this->urls->urlFormat(base_url().strtolower($rand->category)) ?>"><?php echo $rand->kannada ?></a>
												<h2><a href="<?php echo base_url().strtolower($this->urls->urlFormat($rand->category).'/'.$rand->slug) ?>"><?php echo $rand->title ?></a></h2>
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
								<h1>ಹಾಟ್  ಕ್ಯಾಟಗರೀಸ್</h1>
								<ul class="category-list">
									<?php if(!empty(categories())){ foreach(categories() as $key => $value) { if($key <= 6){ ?>
										<li><a class="world" href="<?php echo $this->urls->urlFormat(strtolower(base_url().$value->title)) ?>"><?php echo $value->kannada ?> </a> </li>
									<?php } } }?>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget text-widget">
								<h1>ಮಹೋನ್ನತಿ ಬಗ್ಗೆ</h1>
								<p>ಮಹೋನ್ನತಿಯು ಲಾಭರಹಿತ ಶೈಕ್ಷಣಿಕ ಮತ್ತು ಸಮಾಜಸೇವಾ ಪ್ರತಿಷ್ಠಾನವಾಗಿದೆ. ಹೊಸ ಯುಗದ ಆನ್ಲೈನ್ ಪತ್ರಿಕೆಯು ಆಧ್ಯಾತ್ಮಿಕ ದೃಷ್ಟಿಕೋನ, ಪ್ರಾಚೀನ ಗ್ರಂಥಗಳು, ಸಂಸ್ಕೃತಿ, ಸಾಧನೆಗಳಿಗೆ ಸಂಬಂಧಿಸಿದ ರಾಷ್ಟ್ರೀಯ ಲೇಖನಗಳು, ದೇಶಪ್ರೇಮ, ಕಥೆಗಳು, ಆಯುರ್ವೇದ ವಿಜ್ಞಾನದ ಸಲಹೆಗಳು, ಜ್ಯೋತಿಷ್ಯ, ವಿಜ್ಞಾನ, ವೈದಿಕ ಜ್ಞಾನ ಮತ್ತು ಯೋಗದ ಬಗ್ಗೆ ಸಲಹೆಗಳನ್ನು ನೀಡುತ್ತದೆ. </p>
							</div>
							<div class="widget social-widget">
								<h1>ಸಂಪರ್ಕದಲ್ಲಿರಿ</h1>
								<ul class="social-icons">
								<li><a class="facebook" href="https://www.facebook.com/mahonnathikannada/"><i class="fa fa-facebook"></i></a></li>
									<li><a class="rss" href="https://www.instagram.com/mahonnathikannada/"><i class="fa fa-instagram"></i></a></li>
									<li><a class="twitter" href="https://twitter.com/mahonnathikan"><i class="fa fa-twitter"></i></a></li>
									<li><a class="google" href="https://www.youtube.com/channel/UC00fs8iYCCtN9TlyEw_8JCg/videos"><i class="fa fa-youtube"></i></a></li>
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
									<li><a href="<?php echo base_url() ?>">ಮುಖಪುಟ</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer>
	