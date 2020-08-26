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
                                        <a href="<?php echo $this->config->item('web_url'); ?>">English</a>
                                    </li>
                                    <li class="language">
                                        <a href="<?php echo base_url('kannada') ?>">ಕನ್ನಡ</a>
                                    </li>
									<li><span class="time-now"> <?php echo date("l jS  F Y  / h:i:s A") ?></span></li>
									<li><a href="<?php echo base_url('contact-us') ?>">ಸಂಪರ್ಕಿಸಿ</a></li>
								</ul>
							</div>	
							<div class="col-md-3">
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
								<!-- /21906498668/PG-TOP -->
<div id='div-gpt-ad-1580129697409-0' style='width: 468px; height: 60px;'>
  <script>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1580129697409-0'); });
  </script>
</div>
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
								<li><a  href="<?php echo base_url() ?>">ಮುಖಪುಟ</a> </li>
								<?php 
								if(!empty(categories())){
								foreach(categories() as $key => $value) {
									if($value->title == 'Featured'){
										$rurl = $this->urls->urlFormat(base_url().$value->title);
										echo '<li><a class="world" href="'.$rurl.'">'.$value->kannada.'</a> </li>';
									} }} ?>

								<?php  $vd = '';
								$kn='';
								if(!empty(categories())){
								foreach(categories() as $key => $value) {
 								if($value->title == 'Video'){$vd = '1'; }
								if($value->menu == 1 && $value->title != 'Video' && $value->title != 'Featured'){
								$rurl = $this->urls->urlFormat(base_url().$value->title) ?>
									<li><a class="world" href="<?php echo $rurl ?>"><?php echo $value->kannada ?></a> </li>
								<?php }


								if($value->title == 'Video'){ 
									$kn = $value->kannada;
									$rurl1 = $this->urls->urlFormat(base_url().$value->title);
								 } } }  if (!empty($vd)) { ?>
								 	<li><a class="world" href="<?php echo $rurl1 ?>"><?php echo $kn ?></a> </li>
								<?php } ?>


                            </ul>
                            <ul class="navbar-form nav navbar-nav navbar-right">
                                <li>
                                    <form class="" id="search-form" role="search" method="post">
                                        <input type="text" required="" id="search" name="search" placeholder="Search here" autofocus onfocus="convertToSlug(this.value)" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" onchange="convertToSlug(this.value)"  value="<?php echo (!empty($mtitle)? $mtitle : '') ?>">
                                        <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                            </ul>
							
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
				<!-- End navbar list container -->

			</nav>
			<!-- End Bootstrap navbar -->

		</header>

