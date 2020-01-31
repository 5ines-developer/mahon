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
</head>

<body>

    <?php $this->load->view('mobile/header'); ?>
    <!-- menu slider -->
    <!--section -->
    <section class="padd-top">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <!-- <div class="add-img">
                        <center><img src="assets1/img/250x250.jpg" class="img-responsive" alt=""></center>
                    </div> -->
                    <div class="featured-vie">
                        <h5>Photo gallery</h5>
                    </div>
                    <div class="video-fet">
                        <?php 
                        if(!empty($gallery)){
                        foreach ($gallery as $key => $image) {?>
                        <a href="<?php echo base_url('photogallery/').strtolower($image->category.'/'.$image->slug) ?>">
                            <div class="dis-video">
                                <img src="<?php echo $image->image->image ?>" class="img-responsive" alt="">
                                <h1><?php echo (strlen(strip_tags($image->title)) > 53) ? substr(strip_tags($image->title),0,50).'...' : strip_tags($image->title) ?></h1>
                            
                            </div>
                        </a>
                    <?php }}?>
                        
                        
                        
                        
                    </div>
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
                $('.tabs').tabs();
                $('.modal').modal();
                $('#tabs-demo').tabs({
                    'swipeable': true
                });
                // Scroll Event
                $(window).on('scroll', function() {
                    var scrolled = $(window).scrollTop();
                    if (scrolled > 300) $('.go-top').addClass('active');
                    if (scrolled < 300) $('.go-top').removeClass('active');
                });
                // Click Event
                $('.go-top').on('click', function() {
                    $("html, body").animate({
                        scrollTop: "0"
                    }, 500);
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