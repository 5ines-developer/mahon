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
    <section class="spr-ne padd-top">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <!-- temple to visit -->
                    <?php if(!empty($post)){?> 
                        <div class="spr-ne">
                        <?php foreach ($post as $key => $posts) {
                        ?>
                        <div class="sec-list">
                            <a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>" class="black-text">
                                <div class="row">
                                    <div class="col  m8 s7">
                                        <div class="para-cont">
                                        <p><a class="black-text" href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>"><?php echo  (strlen(strip_tags($posts->title)) > 108) ? substr(strip_tags($posts->title),0,105).'...' : strip_tags($posts->title); ?></a></p>
                                        </div>
                                    </div>
                                    <div class="col m4 s5">
                                        <div class="img-pa img-i">
                                            <a href="<?php echo $this->urls->urlFormat(base_url().$posts->category.'/'.$posts->slug) ?>">
                                            <img src="<?php echo base_url().$posts->image ?>" class="img-responsive"  alt="">
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php }else{ ?>
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
   
   <?php $this->load->view('mobile/footer.php'); ?>
    <!-- script -->
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
                $('.video-pass').slick({

                    dots: false,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                        }

                    }, {

                        breakpoint: 767,

                        settings: {

                            slidesToShow: 2,

                            slidesToScroll: 2

                        }

                    }, {

                        breakpoint: 580,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: false,
                            infinite: false,
                            speed: 300,
                            arrows: false,

                        }

                    }]

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