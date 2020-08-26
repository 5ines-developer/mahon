<!DOCTYPE html>
<html>

<head>
    <title>Mahonathi</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />




    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157746630-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-157746630-1');
    </script>

    <style>
    .p-para img {
        width: 320px;
        height: auto;
        overflow: hidden;
    }
    iframe{
        width:325px;
        height:auto;
    }
    </style>

</head>

<body>
<script>
        window.fbAsyncInit = function() {
        FB.init({
        appId : '454748752068930',
        cookie : true,
        xfbml : true,
        version : 'v7.0'
        });
        FB.AppEvents.logPageView();
        };

        (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
</script>

    <header id="myHeader">
        <nav class="nav-mahonathi nav-is">
            <div class="nav-wrapper tab-head">
                <a href="<?php echo base_url().$this->uri->segment(1) ?>" data-target="mobile-demo"
                    class="sidenav-trigger"><i
                        class="fas fa-arrow-left"></i><span><?php //echo $post->kannada; ?></span></a>
                <div class="Share-detail">
                    <ul>
                        <li><i class="fas fa-comment-alt"></i><sup>4</sup>
                        </li>
                        <!-- <li><i class="fas fa-share-alt-square"></i>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        </nav>
    </header>
    <!-- menu slider -->
    <!--section -->

    <section class="detail-cont">
        <div class="container-fluide">
            <div class="row">

                <?php if(!empty($video)) {foreach($video as $key=>$post){  ?>
                <div class="col l12 s12 m12">
                <div class="inner-detail-banner">
                <img alt="<?php echo  $post->alt ?>" src="<?php echo  base_url().$post->image ?>">
                    </div>
                    <div class="inner-detail-banner">
                    <?php echo $post->content?>
                    </div>

                    <div class="title-track-banner">
                        <h5><?php echo $post->title ?></h5>
                        <p class="sub-para1"><b>By :</b>
                            <?php //echo (!empty($post->posted_by))?$post->author->name:'';  ?> | Updated :
                            <?php echo $post->created_on ?></p>
                    </div>
                    <div class="share-post-box">
                        <ul class="share-box">
                            <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                            <li><a class="facebook"
                                    href="http://www.facebook.com/sharer.php?s=100&p[summary]=<?php echo $post->title ?>&p[url]=<?php echo current_url(); ?>&p[title]=<?php echo $post->title ?>"
                                    target="_blank"><i class="fab fa-facebook-f fb"></i><span>Share on
                                        Facebook</span></a></li>
                            <li><a class="twitter"
                                    href="http://twitter.com/share?text=<?php echo $post->title ?>&url=<?php echo current_url(); ?>"
                                    target="_blank"><i class="fab fa-twitter tw"></i><span>Share on Twitter</span></a>
                            </li>
                            <li><a class="linkedin"
                                    href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo current_url(); ?>"
                                    target="_blank"><i class="fab fa-linkedin-in li"></i> &nbsp;&nbsp;<span>Share on
                                        Linkedin</span></a></li>
                        </ul>
                    </div>
                    <div class="p-para">
                        
                    </div>
                </div>

                <?php }} ?>

            </div>
        </div>
    </section>




    <section class="detail-cont">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12 s12">
                    <div class="spr-ne">
                        <h5>Playlist</h5>
                        <div class="line-bor"></div>
                        <?php if(!empty($playlists)){ ?>
                        <div class="sponser">
                            <?php foreach ($playlists as $key => $prow){
              
                                $urllink = $this->urls->urlFormat(base_url().'playlist/'.$prow->pl_slug.'/'.$prow->slug);
                
                ?>
                            <div class="sec-list">
                                <div class="row">
                                    <div class="col l8 m8 s8">
                                        <div class="para-cont">
                                            <p><a class="black-text"  href="<?php echo  $prow->slug ?>"><?php echo  $prow->title; ?></a></h2></a></p>
                                        </div>
                                    </div>
                                    <div class="col l4 m4 s4">
                                        <div class="img-pa">
                                            <a href="<?php echo $urllink ?>"><img
                                                    src="<?php echo base_url().$prow->image ?>"
                                                    class="img-responsive img-res" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php }; ?>
                        </div>
                            <?php };?>
                    </div>
                </div>
            </div>
    </section>

    <!-- <div class="" id="test-swipe-2">

    </div> -->
    <div class="go-top active">
        <i class="fa fa-angle-double-up gray-text"></i>
    </div>
    <?php $this->load->view('mobile/footer.php'); ?>











    <!-- script -->
    <script type="text/javascript" src="<?php echo base_url()?>assets1/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/materialize.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <scrip type="text/javascript" src="<?php echo base_url()?>assets1/js/script.js">

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