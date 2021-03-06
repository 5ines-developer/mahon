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
</head>

<body>

    <header id="myHeader">
        <nav class="nav-mahonathi nav-is">
            <div class="nav-wrapper tab-head">
                <a href="<?php echo base_url().$this->uri->segment(1) ?>" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-arrow-left"></i><span><?php echo ucwords($this->urls->urlDformat($this->uri->segment(1))) ?></span></a>
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
                <?php if(!empty($related)): ?>
                <div class="sponser">
                    <?php foreach ($related as $key => $post): ?>
                    <div class="sponser-detail" data_slug="<?php echo  $post->slug ?>">
                        <img src="<?php echo base_url().$post->image ?>" class="img-responsive" alt="">
                        <h5><?php echo $post->title ?></h5>
                        <div class="p-para">
                       <?php echo $post->content ?>
                    </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <?php endif;?> 
            </div>
        </div>
    </section>
    <!-- <div class="" id="test-swipe-2">

    </div> -->
<?php $this->load->view('mobile/footer.php'); ?>











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
        </script>
</body>

</html>