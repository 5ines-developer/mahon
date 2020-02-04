<!DOCTYPE html>
<html>

<head>
    <title>Mahonathi</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />


    <?php  if(!empty($post)){ ?>
        <!-- Meta tags -->
        <title><?php echo $post->ptitle ?></title>
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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157746630-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157746630-1');
</script>

</head>

<body>

    <header id="myHeader">
        <nav class="nav-mahonathi nav-is">
            <div class="nav-wrapper tab-head">
                <a href="<?php echo base_url().$this->uri->segment(1) ?>" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-arrow-left"></i><span><?php echo $post->kannada; ?></span></a>
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
                <?php if(!empty($post)) { ?>
                        <div class="col l12">
                            <div class="inner-detail-banner">
                    <div class="inner-banner">
                        <img src="<?php echo base_url().$post->image ?>" class="img-responsive" alt="">
                    </div>
                </div>
                    <div class="title-track-banner">
                        <h5><?php echo $post->title ?></h5>
                        <p class="sub-para1"><b>By :</b> <?php echo (!empty($post->posted_by))?$post->author->name:'';  ?> | Updated : <?php echo $post->created_on ?></p>
                    </div>
                    <div class="p-para">
                       <?php echo $post->content ?>
                    </div>
                </div>

                <?php } ?>

                <!-- <div class="widget tab-posts-widget">
                    <div class="twitt-silder">
                        <a class="twitter-timeline" href="https://twitter.com/TwitterDev/likes?ref_src=twsrc%5Etfw">Tweets Liked by @TwitterDev</a>
                    </div>
                </div> -->

            </div>
        </div>
    </section>




<section class="detail-cont">
    <div class="container-fluide">
        <div class="row">
            <div class="col l12 s12">
                    <div class="spr-ne">
            <h5>ಸಂಬಂಧಿತ ಪೋಸ್ಟ್‌ಗಳು</h5>
            <div class="line-bor"></div>
            <?php if(!empty($related)): ?>
            <div class="sponser">
                <?php foreach ($related as $key => $post):
                if(strlen(strip_tags($post->title)) > 83){
                $ftitle = strip_tags($post->title);
                $fcontent = '';
                }else{
                $ftitle = strip_tags($post->title);
                if (!empty($post->content)) {
                $fcontent = substr(strip_tags($post->content),0,50).'...';
                }else{
                $fcontent = '';
                }
                }
                ?>
                <div class="sec-list">
                    <div class="row">
                        <div class="col  m8 s8">
                            <div class="para-cont">
                                <p><a class="black-text" href="<?php echo  $post->slug ?>"><?php echo $ftitle ?></a></p>
                                <?php echo (!empty($fcontent))?'<p class="para-par">'.$fcontent.'</p>':''; ?>  
                            </div>
                        </div>
                        <div class="col m4 s4">
                            <div class="img-pa">
                                <a href="<?php echo $post->slug ?>"><img src="<?php echo base_url().$post->image ?>" class="img-responsive img-res" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php endforeach; ?>
            </div>
            <?php endif;?>
        </div>
        </div>
    </div>
</section>

    <!-- <div class="" id="test-swipe-2">

    </div> -->

    <div class="go-top active" onclick="topFunction()">
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