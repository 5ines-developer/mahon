<!DOCTYPE html>
<html>
<head>
    <title>Mahonathi</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/jquery.mobile-1.0a1.min.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script> -->

</head>

<body>

    <?php $this->load->view('mobile/header'); ?>
    <!-- menu slider -->
    <!--section -->
    <section class="spr-ne padd-top"  >
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <!-- temple to visit -->
                    <?php if(!empty($post)){?> 
                        <div class="spr-ne">
                        <?php foreach ($post as $key => $posts) {

                            if(strlen(strip_tags($posts->title)) > 83){
                                $ftitle = character_limiter(strip_tags($posts->title), 80).'...';
                                $fcontent = '';
                            }else{
                                $ftitle = strip_tags($posts->title);
                                if (!empty($posts->content)) {
                                    $fcontent = character_limiter(strip_tags($posts->content), 80).'...';
                                }else{
                                    $fcontent = '';
                                }
                            }
                        ?>
                        <div class="sec-list">
                            <a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>" class="black-text">
                                <div class="row">
                                    <div class="col  m8 s8">
                                        <div class="para-cont">
                                        <p><a class="black-text" href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>"><?php echo  $ftitle ?></a></p>
                                        <?php echo (!empty($fcontent))?'<p class="para-par">'.$fcontent.'</p>':''; ?>   
                                    </div>
                                    </div>
                                    <div class="col m4 s4">
                                        <div class="img-pa img-i">
                                            <a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>">
                                            <img src="<?php echo base_url().$posts->image ?>" class="img-responsive img-res"  alt="">
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php }else if(!empty($vid)){  ?>

                        <div class="featured-vie">
                            <h5>Featured Videos</h5>
                        </div>

                       <?php foreach ($vid as $key => $vids) {
                        if($vids->vtype == 'featured'){ ?> 
                        <div class="video-fet">
                            <a href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>">
                                <div class="dis-video">
                                    <img src="<?php echo $vids->tumb ?>" class="img-responsive" alt="">
                                    <h1><?php echo word_limiter(strip_tags($vids->title), 6).'...' ?></h1>
                                    <div class="post-div">
                                        <i class="fa fa-play"></i>
                                    </div>

                                </div>
                            </a>
                        </div>
                    <?php } } ?>
                        <div class="featured-vie">
                            <h5>SHORT MOVIES</h5>
                        </div>
                    <?php foreach ($vid as $key => $vids) {
                        if($vids->vtype == 'short'){ ?> 
                        <div class="video-fet">
                            <a href="<?php echo strtolower(base_url('videos/').$vids->category.'/'.$vids->slug) ?>">
                                <div class="dis-video">
                                    <img src="<?php echo $vids->tumb ?>" class="img-responsive" alt="">
                                    <h1><?php echo word_limiter(strip_tags($vids->title), 6).'...' ?></h1>
                                    <div class="post-div">
                                        <i class="fa fa-play"></i>
                                    </div>

                                </div>
                            </a>
                        </div>
                    <?php } }  }else{ ?>
                        <div class="error-banner">
                            <h1>No Result <span>Found</span></h1>
                            <p>Oops! It looks like nothing was found at this search. Maybe try another search?</p>
                        </div>
                    <?php } ?>



                    <!--end temple to visit -->
                </div>
            </div>
        </div>
    </section>
    <div class="height-li"></div>

   <?php $this->load->view('mobile/footer.php'); ?>
   
    <!-- script -->
    <div class="go-top active">
        <i class="fa fa-angle-double-up gray-text"></i>
    </div>
    <script type="text/javascript" src="<?php echo base_url()?>assets1/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/materialize.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <scrip type="text/javascript" src="<?php echo base_url()?>assets1/js/script.js">
        </script>
        <script>
            $(document).ready(function() {
                $('.sidenav').sidenav();
                $('.modal').modal();
                //Check to see if the window is top if not then display button
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                        $('.go-top').fadeIn();
                    } else {
                        $('.go-top').fadeOut();
                    }
                });
                //Click event to scroll to top
                $('.go-top').click(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 900);
                    // return false;
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $(".btn-search").click(function() {
                    $(".bs").css("display", "none");
                    $('.img-logo').css("display", "none");
                    $(".btn-search-close").fadeIn("slow");
                    $(".btn-search-close").css("display", "block");
                    $(".input-search").css("display", "block");
                });
                $(".btn-search-close").click(function() {
                    $(".bc").css("display", "none");
                    $(".btn-search").fadeIn("slow");
                    $('.img-logo').css("display", "block");
                    $(".btn-search").css("display", "block");
                    $(".input-search").css("display", "none");
                });
            });

        </script>

        <script>
            window.onscroll = function() {
                myFunction()
            };

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }
            var header = document.getElementById("myDIV");
            var btns = header.getElementsByClassName("bt");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        </script>
</body>

</html>