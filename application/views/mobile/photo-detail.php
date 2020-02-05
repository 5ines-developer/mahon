<!DOCTYPE html>
<html>

<head>
    <title>Mahonathi</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />


    <?php  if(!empty($post)){ ?>
    <!-- Meta tags -->
    <title>
        <?php echo $post->ptitle ?>
    </title>
    <meta name="description" content="<?php echo $post->pdes ?>" />
    <meta name="keywords" content="<?php echo $post->pkeyword ?>" />
    <!-- facebook meta tags -->
    <meta property="fb:pages" content="454748752068930" />
    <meta property="og:image" content="<?php echo base_url().$post->image ?>" />
    <meta property="og:title" content="<?php echo $post->ftitle ?>">
    <meta property="og:site_name" content="Mahonnathi">
    <meta property="og:url" content="<?php echo current_url() ?>">
    <meta property="og:description" content="<?php echo $post->fdes ?>">
    <meta property="og:type" content="website">
    <!-- Twitter card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Mahonnathi">
    <meta name="twitter:image" content="<?php echo base_url().$post->image ?>">
    <meta name="twitter:url" content="<?php echo base_url() ?>">
    <meta name="twitter:title" content="<?php echo $post->ttitle ?>">
    <meta name="twitter:description" content="<?php echo $post->tdes ?>">
    <?php  } ?>

    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148770094-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148770094-1');
</script>
</head>

<body>

    <header id="myHeader">
        <nav class="nav-mahonathi nav-is">
            <div class="nav-wrapper tab-head">
                <a href="<?php echo base_url('photo-gallery') ?>"  class="sidenav-trigger"><i class="fas fa-arrow-left"></i><span><?php echo ucwords($this->urls->urlDformat($this->uri->segment(1))) ?></span></a>
                <div class="Share-detail">
                    <ul>
                        <li><i class="fas fa-comment-alt"></i><sup>4</sup>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="sidenav nn-list" id="mobile-demo">
            <li class="bt <?php if($this->uri->segment(1) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url() ?>">Home</a></li>

                    <?php
                                $vd = ''; 
                                $kn='';
                                if(!empty(categories())){
                                    foreach(categories() as $key => $value) { 
                                        if($value->title == 'Video'){$vd = '1'; }
                                        if($value->menu == 1 && $value->title != 'Video'){
                                            $rurl = $this->urls->urlFormat(base_url().$value->title)
                                ?>
                                    <li><a class="world" href="<?php echo $rurl ?>"><?php echo $value->title ?></a> </li>
                                <?php } 
                                if($value->title == 'Video'){ 
                                    $rurl1 = $this->urls->urlFormat(base_url().$value->title);
                                    $kn = $value->title;
                                } 
                            } }
                            if (!empty($vd)) { ?>
                                <li><a class="world" href="<?php echo $rurl1 ?>"><?php echo $kn ?></a> </li>
                            <?php } ?> 
        </ul>
    </header>
    <!-- menu slider -->
    <!--section -->

    <section class="detail-cont">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12 s12 m12">
                    <?php if(!empty($photos))   { ?>
                    <div class="video-detial-mobile">
                        <h6><?php echo $photos->title ?></h6>
                        <div class="share-post-box">
                            <ul class="share-box">
                                <li><i class="fa fa-share-alt sha"></i><span>Share Post</span></li>
                                <li><a class="facebook" href="http://www.facebook.com/sharer.php?s=100&p[summary]=<?php echo $photos->title ?>&p[url]=<?php echo current_url(); ?>&p[title]=<?php echo $photos->title ?>" target="_blank"><i class="fab fa-facebook-f fb"></i></a></li>
                                <li><a class="twitter" href="http://twitter.com/home?url=<?php echo $photos->title ?>+<?php echo current_url(); ?>" target="_blank"><i class="fab fa-twitter tw"></i></a></li>
                                <li><a class="linkedin"href="http://www.linkedin.com/shareArticle?mini=true&amp;amp;url=<?php echo current_url(); ?>/&amp;amp;title=<?php echo $photos->title ?>&amp;amp;source=<?php echo base_url() ?>" target="_blank"><i class="fab fa-linkedin-in li"></i></a></li>
                            </ul>
                        </div>
                        <?php foreach ($photos->image as $key => $value) { ?>
                        <div class="img-pic">
                            <img src="<?php echo  $value->image ?>" class="img-responsive" alt="">
                            <p><?php echo  $value->title ?></p>
                        </div>
                        <?php } ?>
                        
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="" id="test-swipe-2">

    </div> -->
    <div class="height-li"></div>
    <?php $this->load->view('mobile/footer.php'); ?>

    <!-- script -->
    <div class="go-top active">
        <i class="fa fa-angle-double-up gray-text"></i>
    </div>


    <!-- script -->
    <script type="text/javascript" src="<?php echo base_url()?>assets1/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/materialize.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <scrip type="text/javascript" src="<?php echo base_url()?>assets1/js/script.js">
        <!-- <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
        </script>
        <script>
            $(document).ready(function() {
                $('.sidenav').sidenav();
                $('.tabs').tabs();
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
        <!-- <script>
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
        </script> -->
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