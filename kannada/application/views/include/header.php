<?php 
	$ishedder = '';
	if($this->session->userdata('Mht') != '' && !empty($is_detail)){  
		$ishedder = 'admin-head'; 
?>
	<header class="admin-header">
		<div class="admin-header-fixd">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url() ?>admin-panel/login" target="_blank">Admin Panel</a>
					</div>
					<ul class="nav navbar-nav">
						<li ><a href="<?php echo base_url() ?>admin-panel/post/add"><i class="fa fa-plus mr5" aria-hidden="true"></i> Add New </a></li>
						<?php if(!empty($post->id)) { ?>
							<li><a href="<?php echo base_url('admin-panel/post/edit/').$post->id ?>"><i class="fa fa-pencil mr5" aria-hidden="true"></i> Edit </a></li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
	</header>	
<?php } ?>
<script>
			function convertToSlug(str) {
				str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
				
				str = str.replace(/^\s+|\s+$/gm,'');
				
				str = str.replace(/\s+/g, '-');	
				document.getElementById("search-form").action  = '<?php echo base_url("topic/") ?>'+str;
				//return str;
			}
		</script>

<header class="clearfix second-style <?php echo $ishedder ?>">
			<!-- Bootstrap navbar -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation">

				<!-- Top line -->
				<div class="top-line">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<ul class="top-line-list">
                                    <li class="language active">
                                        <a href="#">English</a>
                                    </li>
                                    <li class="language">
                                        <a href="#">ಕನ್ನಡ</a>
                                    </li>
									<!-- <li>
										<span class="city-weather">London, United Kingdom</span>
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="24px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
											<path fill="#777777" d="M208,64c8.833,0,16-7.167,16-16V16c0-8.833-7.167-16-16-16s-16,7.167-16,16v32
												C192,56.833,199.167,64,208,64z M332.438,106.167l22.625-22.625c6.249-6.25,6.249-16.375,0-22.625
												c-6.25-6.25-16.375-6.25-22.625,0l-22.625,22.625c-6.25,6.25-6.25,16.375,0,22.625
												C316.062,112.417,326.188,112.417,332.438,106.167z M16,224h32c8.833,0,16-7.167,16-16s-7.167-16-16-16H16
												c-8.833,0-16,7.167-16,16S7.167,224,16,224z M352,208c0,8.833,7.167,16,16,16h32c8.833,0,16-7.167,16-16s-7.167-16-16-16h-32
												C359.167,192,352,199.167,352,208z M83.541,106.167c6.251,6.25,16.376,6.25,22.625,0c6.251-6.25,6.251-16.375,0-22.625
												L83.541,60.917c-6.25-6.25-16.374-6.25-22.625,0c-6.25,6.25-6.25,16.375,0,22.625L83.541,106.167z M400,256
												c-5.312,0-10.562,0.375-15.792,1.125c-16.771-22.875-39.124-40.333-64.458-51.5C318.459,145,268.938,96,208,96
												c-61.75,0-112,50.25-112,112c0,17.438,4.334,33.75,11.5,48.438C47.875,258.875,0,307.812,0,368c0,61.75,50.25,112,112,112
												c13.688,0,27.084-2.5,39.709-7.333C180.666,497.917,217.5,512,256,512c38.542,0,75.333-14.083,104.291-39.333
												C372.916,477.5,386.312,480,400,480c61.75,0,112-50.25,112-112S461.75,256,400,256z M208,128c39.812,0,72.562,29.167,78.708,67.25
												c-10.021-2-20.249-3.25-30.708-3.25c-45.938,0-88.5,19.812-118.375,53.25C131.688,234.083,128,221.542,128,208
												C128,163.812,163.812,128,208,128z M400,448c-17.125,0-32.916-5.5-45.938-14.667C330.584,461.625,295.624,480,256,480
												c-39.625,0-74.584-18.375-98.062-46.667C144.938,442.5,129.125,448,112,448c-44.188,0-80-35.812-80-80s35.812-80,80-80
												c7.75,0,15.062,1.458,22.125,3.541c2.812,0.792,5.667,1.417,8.312,2.521c4.375-8.562,9.875-16.396,15.979-23.75
												C181.792,242.188,216.562,224,256,224c10.125,0,19.834,1.458,29.25,3.709c10.562,2.499,20.542,6.291,29.834,11.291
												c23.291,12.375,42.416,31.542,54.457,55.063C378.938,290.188,389.209,288,400,288c44.188,0,80,35.812,80,80S444.188,448,400,448z"
											/>
										</svg>
										<span class="cel-temperature">+7</span>
									</li> -->
									<li><span class="time-now"> <?php echo date("l jS  F Y  / h:i:s A") ?></span></li>
									<!-- <li><a href="#">Log In</a></li>
									<li><a href="contact.html">Contact</a></li> -->
								</ul>
							</div>	
							<div class="col-md-3">
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
				<!-- End Top line -->

				<!-- Logo & advertisement -->
				<div class="logo-advertisement">
					<div class="container">

						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets\images\logo.png" alt=""></a>
						</div>

						<div class="advertisement navad">
							<div class="desktop-advert">
								<img src="<?php echo base_url() ?>assets/upload/addsense/468x60-white.jpg" alt="">
							</div>
							<div class="tablet-advert">
								<img src="<?php echo base_url() ?>assets/upload/addsense/468x60-white.jpg" alt="">
							</div>
						</div>
					</div>
				</div>
				<!-- End Logo & advertisement -->

				<!-- navbar list container -->
				<div class="nav-list-container">
					<div class="container">
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-left">

								<!-- <li class="drop"><a class="home" href="index.html">Home</a>
									
									<ul class="dropdown">
										<li><a href="index.html">Homepage Version 1</a></li>
										<li><a href="home2.html">Homepage Version 2</a></li>
										<li><a href="home3.html">Homepage Version 3</a></li>
										<li><a href="home4.html">Homepage Version 4</a></li>
										<li><a href="home5.html">Homepage Version 5</a></li>
										<li><a href="home6.html">Homepage Version 6</a></li>
									</ul>
								</li> -->
								<li><a  href="<?php echo base_url() ?>">Home</a> </li>
								<?php 
								if(!empty(categories())){
									foreach(categories() as $key => $value) { 
										if($value->menu == 1){
											$cat = $this->urls->checkCat($value->title);
											$rurl = $this->urls->urlFormat(base_url().$cat)
								?>
									<li><a class="world" href="<?php echo $rurl ?>"><?php echo $value->title ?></a> </li>
								<?php } } }?>	

                            </ul>
                            <ul class="navbar-form nav navbar-nav navbar-right">
                                <li>
                                    <form class="" id="search-form" role="search" method="post">
                                        <input type="text" id="search" name="search" placeholder="Search here" autofocus onfocus="convertToSlug(this.value)" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" value="<?php echo (!empty($mtitle)? $mtitle : '') ?>">
                                        <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                                <!-- <li class="drop"><a class="home" href="index.html">Home</a>
									
									<ul class="dropdown">
										<li><a href="index.html">Homepage Version 1</a></li>
										<li><a href="home2.html">Homepage Version 2</a></li>
										<li><a href="home3.html">Homepage Version 3</a></li>
										<li><a href="home4.html">Homepage Version 4</a></li>
										<li><a href="home5.html">Homepage Version 5</a></li>
										<li><a href="home6.html">Homepage Version 6</a></li>
									</ul>
								</li> -->
                            </ul>
							
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
				<!-- End navbar list container -->

			</nav>
			<!-- End Bootstrap navbar -->

		</header>

