<!DOCTYPE html>

<html>



<head>

    <title>Mahonathi</title>

    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="keywords" content="News Portal News, New Portal Videos News Portal Photos , News Latest Updates , News Web Portal Development, News Portal Development, News Portal Website, Media Designing Company, Latest news, India news, World News Today, Breaking News Headlines, News Today, News, Latest News, Today's News, Today's News Headlines, Breaking News, Live News, Current Affairs, Sports News in English, ">



    <meta property="og:image" content="<?php echo base_url().$banner[0]->image ?>" />

    <meta property="og:title" content="Online News Portal">

    <meta property="og:site_name" content="Online News Portal">

    <meta property="og:url" content="<?php echo base_url() ?>">

    <meta property="og:description" content="">

    <meta property="og:type" content="website">



    <meta name="twitter:card" content="summary">

    <meta name="twitter:site" content="@Mahonnathi">

    <meta name="twitter:image" content="<?php echo base_url().$banner[0]->image ?>">

    <meta name="twitter:url" content="<?php echo base_url() ?>">

    <meta name="twitter:title" content="Online News Portal">

    <meta name="twitter:description" content="">

    <meta property="fb:pages" content="110725200321598" />

    <!--Import materialize.css-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets1/css/materialize.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/jquery.mobile-1.0a1.min.css" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script> -->





    <!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157746630-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());



  gtag('config', 'UA-157746630-1');

</script>



</head>



<body style="background: #e6e6e6;">
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



    <?php $this->load->view('mobile/header'); ?>

    <!-- menu slider -->

    <!--section -->

    <!-- <div data-role="page" id="home"> -->

    <?php if(!empty($banner[0])){ 

        if(empty($banner[0]->category)){

            $urllink = $this->urls->urlFormat($banner[0]->slug);

        }else{

            $urllink = $this->urls->urlFormat(base_url().$banner[0]->category.'/'.$banner[0]->slug);

        }



        if(strlen(strip_tags($banner[0]->title)) > 83){

            $ftitle = character_limiter(strip_tags($banner[0]->title), 80).'...'; 

        }else{

            $ftitle = strip_tags($banner[0]->title);

        }



        ?>

    <section class="sec-tt sec-fe">

        <div class="row m0">

            <div class="col l12 s12 m12">

                <div class="banner-slider">

                    <img src="<?php echo base_url().$banner[0]->image ?>" class="img-responsive" alt="">

                </div>

                <div class="banner-content">

                    <h6><a class="black-text" href="<?php echo $urllink ?>"><?php echo  $ftitle; ?></a></h6>

                </div>

            </div>

        </div>

    </section>

    <?php } ?>



    <section class="spr-news feature-box">

        <div class="container-fluide">

            <div class="row">

                <div class="col l12 s12">

                    <div class="spr-ne">

                        <h5>ಇಂದಿನ‌ ಸುದ್ದಿಗಳು</h5>

                        <div class="line-bor"></div>

                        <?php if(!empty($fetured[0])){

                           

                            if(empty($fetured[0]->category)){

                                $urllink = $this->urls->urlFormat($fetured[0]->slug);

                            }else{

                                $urllink = $this->urls->urlFormat(base_url().$fetured[0]->category.'/'.$fetured[0]->slug);

                            }   





                            if(strlen(strip_tags($fetured[0]->title)) > 53){

                                $ftitle = character_limiter(strip_tags($fetured[0]->title), 50).'...'; 

                                $fcontent = '';

                            }else{

                                $ftitle = strip_tags($fetured[0]->title);

                                if (!empty($fetured[0]->content)) {

                                    $fcontent = character_limiter(strip_tags($fetured[0]->content), 50).'...'; 

                                }else{

                                    $fcontent = '';

                                }

                            }

                        ?>



                        <div class="sec-list">

                            <div class="row">

                                <div class="col  m8 s8">

                                    <div class="para-cont">

                                        <p><a class="black-text" href="<?php echo $urllink ?>"><?php echo $ftitle ?></a></p>

                                        <?php echo (!empty($fcontent))?'<p class="para-par">'.$fcontent.'</p>':''; ?>

                                    </div>

                                </div>

                                <div class="col m4 s4">

                                    <div class="img-pa">

                                        <a href="<?php echo $urllink ?>"> <img src="<?php echo base_url().$fetured[0]->image ?>" class="img-responsive img-res" alt=""> </a>

                                    </div>

                                </div>

                            </div>

                        </div>







                        <?php } if(!empty($fetured)){

                            foreach ($fetured as $key => $row) { 

                            if(!empty($row->id) && $key > 0 ){

                            if(empty($row->category)){

                                $urllink = $this->urls->urlFormat($row->slug);

                            }else{

                                $urllink = $this->urls->urlFormat(base_url().$row->category.'/'.$row->slug);

                            }



                            if(strlen(strip_tags($row->title)) > 53){

                                $ftitle = character_limiter(strip_tags($row->title), 50).'...'; 

                                $fcontent = '';

                            }else{

                                $ftitle = strip_tags($row->title);

                                if (!empty($row->content)) {

                                    $fcontent = character_limiter(strip_tags($row->content), 50).'...';

                                }else{

                                    $fcontent = '';

                                }

                            }







                            ?>







                        <div class="sec-list">

                            <div class="row">

                                <div class="col  m8 s8">

                                    <div class="para-cont">

                                        <p><a class="black-text" href="<?php echo $urllink ?>"><?php echo $ftitle ?></a></p>

                                        <?php echo (!empty($fcontent))?'<p class="para-par">'.$fcontent.'</p>':''; ?>

                                    </div>

                                </div>

                                <div class="col m4 s4">

                                    <div class="img-pa">

                                        <a href="<?php echo $urllink ?>"><img src="<?php echo base_url().$row->image ?>" class="img-responsive img-res" alt=""></a>

                                    </div>

                                </div>

                            </div>

                        </div>







                        <?php }} } ?>









                    </div>



                </div>

            </div>



        </div>



    </section>



    <section class="feature-box">

        <div class="row">

            <!-- <div class="youtube-sub">

                <div class="right-btn text-right">

     

                </div>

            </div> -->

            <div class="title-tra">

                <h6><i class="fas fa-video"></i> ವೀಡಿಯೊ</h6>

                <!-- <p> Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.massa quis enim. Donec pede justo.

                </p> -->

            </div>

            <div class="video-pass">

                <?php foreach($fvideos as $key => $fvideo) { 

                    if(strlen(strip_tags($fvideo->title)) > 53){

                        $ftitle = character_limiter(strip_tags($fvideo->title), 50).'...'; 

                    }else{

                        $ftitle = strip_tags($fvideo->title);

                    }



                ?>

                <div class="news-post standard-post">

                    <div class="post-gallery">

                        <a href="<?php echo strtolower(base_url('videos/').$fvideo->category.'/'.$fvideo->slug) ?>">

                            <div class="rr-gallery rr-gal">



                                <a href="<?php echo strtolower(base_url('videos/').$fvideo->category.'/'.$fvideo->slug) ?>"><img alt="" class="img-responsive" src="<?php echo $fvideo->tumb ?>"></a>

               

                            </div>

                            <p><a class="black-text" href="<?php echo strtolower(base_url('videos/').$fvideo->category.'/'.$fvideo->slug) ?>"><?php echo $ftitle;  ?></a></p>

                            <div class="post-div">

                                        <i class="fa fa-play blink "></i>

                                    </div>

                        </a>

                    </div>

                </div>

                <?php } ?>

            </div>

            <div class="line-end">

                <a href="<?php echo base_url('video')?>">ಎಲ್ಲವನ್ನೂ ನೋಡಿ</a>

                <span class="sbscrib">Subscribe Now</span>

                <div class="sub-title" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent none repeat scroll 0% 0%; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 84px; height: 24px;"

                    id="___ytsubscribe_0">

                    <iframe ng-non-bindable="" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 84px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" id="I0_1579514206747"

                        name="I0_1579514206747" src="https://www.youtube.com/subscribe_embed?usegapi=1&amp;channelid=UC00fs8iYCCtN9TlyEw_8JCg&amp;layout=default&amp;count=hidden&amp;origin=https%3A%2F%2Fwww.mahonnathi.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.xh-S9KbEGSE.O%2Fam%3DwQc%2Fd%3D1%2Fct%3Dzgms%2Frs%3DAGLTcCNaUSRWzhd71dAsiMVOstVE3KcJZw%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1579514206747&amp;_gfid=I0_1579514206747&amp;parent=https%3A%2F%2Fwww.mahonnathi.com&amp;pfname=&amp;rpctoken=35547097"

                        data-gapiattached="true" width="100%" frameborder="0"></iframe></div>

            </div>

        </div>



    </section>

    <section class="spr-news feature-box">

        <div class="container-fluide">

            <?php if(!empty($temple)){ ?>

            <div class="row">

                <div class="col l12">

                    <div class="spr-ne spr-pp">

                        <h5>ದೇಗುಲ ದರ್ಶನ</h5>

                        <?php foreach ($temple as $key => $tprow) { 



                            

                            if(empty($tprow->category)){

                                $urllink = $this->urls->urlFormat($tprow->slug);

                            }else{

                                $urllink = $this->urls->urlFormat(base_url().$tprow->category.'/'.$tprow->slug);

                            }

                            (!empty($tprow->content)? $content = $tprow->content : $content = '' ) ;





                            if(strlen(strip_tags($tprow->title)) > 53){

                                $ftitle = character_limiter(strip_tags($tprow->title), 50).'...';

                                $fcontent = '';

                            }else{

                                $ftitle = strip_tags($tprow->title);

                                if (!empty($tprow->title)) {

                                    $fcontent = character_limiter(strip_tags($tprow->content), 50).'...';

                                }else{

                                    $fcontent = '';

                                }

                            }



                        ?>

                        <div class="sec-list">

                            <div class="row m0">

                                <div class="col  m8 s8">

                                    <div class="para-cont">

                                        <p><a class="black-text" href="<?php echo $urllink ?>"><?php echo  $ftitle; ?></a></p>

                                        <?php echo  (!empty($fcontent))?'<p class="para-par">'.$fcontent.'</p>':''; ?>

                                    </div>

                                </div>

                                <div class="col m4 s4">

                                    <div class="img-pa">

                                        <a href="<?php echo $urllink ?>"><img src="<?php echo base_url().$tprow->image ?>" class="img-responsive img-res" alt=""></a>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php } ?>





                    </div>



                </div>

            </div>

            <?php } ?>

            <div class="add-images">

                <img src="https://www.mahonnathi.com/assets/upload/addsense/250x250.jpg" class="img-responsive" alt="">

            </div>

        </div>

    </section>

    <?php if(!empty($videos)){ ?>

    <section class="feature-box">

        <div class="row">

            <div class="title-tra">

                <h6><i class="fas fa-video"></i> ಕಿರುಚಿತ್ರ</h6>

            </div>

            <div class="video-pass">

                <?php foreach ($videos as $key => $value) { 



                if(strlen(strip_tags($value->title)) > 53){

                    $ftitle = character_limiter(strip_tags($value->title), 50).'...';

                }else{

                    $ftitle = strip_tags($value->title);

                }

                ?>

                <div class="news-post standard-post">

                    <div class="post-gallery">

                        <div class="rr-gallery rr-gal">

                            <a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug) ?>"><img alt="" class="img-responsive" src="<?php echo $value->tumb ?>"></a>

                            <a href="<?php echo strtolower(base_url('videos/').$value->category.'/'.$value->slug )?>" class="video-icon"><i class="fa fa-play-circle-o"></i></a>

                            <div class="post-div">

                                        <i class="fa fa-play blink "></i>

                                    </div>

                        </div>

                        <p><?php echo $ftitle;  ?></p>

                    </div>

                </div>

                <?php } ?>

            </div>

            <div class="line-end">

                <a href="<?php echo base_url('video')?>">ಎಲ್ಲವನ್ನೂ ನೋಡಿ</a> </div>

        </div>

    </section>

    <?php } ?>

    <section class="spr-ne feature-box">

        <?php if(!empty($trending)){ ?>

        <div class="container-fluide">

            <div class="row">

                <div class="col l12">

                    <div class="spr-ne">

                        <h5>ಟ್ರೆಂಡಿಂಗ್ ಪೋಸ್ಟ್</h5>

                        <?php foreach ($trending as $key => $trow) {

                            if(empty($trow->category)){

                                $urllink = $this->urls->urlFormat($trow->slug);

                            }else{

                                $urllink = $this->urls->urlFormat(base_url().$trow->category.'/'.$trow->slug);

                            }

                            (!empty($trow->content)? $content = $trow->content : $content = '' ) ;





                            if(strlen(strip_tags($trow->title)) > 53){

                                $ftitle = character_limiter(strip_tags($trow->title), 50).'...';

                                $fcontent = '';

                            }else{

                                $ftitle = strip_tags($trow->title);

                                if (!empty($trow->title)) {

                                    $fcontent = character_limiter(strip_tags($trow->content), 50).'...';

                                }else{

                                    $fcontent = '';

                                }

                            }



                        ?>

                        <div class="sec-list">

                            <div class="row">

                                <div class="col  m8 s8">

                                    <div class="para-cont">

                                        <p><a class="black-text" href="<?php echo $urllink ?>"><?php echo  $ftitle ?></a></p>

                                        <?php echo (!empty($fcontent))?'<p class="para-par">'.$fcontent.'</p>':''; ?>

                                    </div>

                                </div>

                                <div class="col m4 s4">

                                    <div class="img-pa">

                                        <img src="<?php echo base_url().$trow->image ?>" class="img-responsive img-res" alt="">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php } ?>



                    </div>



                </div>

            </div>

        </div>

        <?php } ?>



        <div class="row">

            <div class="title-tra">

                <h6>ಫೋಟೋ ಗ್ಯಾಲರಿ</h6>

                <!-- <p>Banner Detail he power of mind is indescribable & unimaginable. Mauris magna metus</p> -->

            </div>

            <div class="photo-pass">

                <?php foreach ($gallery as $key => $image) {



                    if(strlen(strip_tags($image->title)) > 53){

                        $ftitle = character_limiter(strip_tags($image->title), 50).'...';

                    }else{

                        $ftitle = strip_tags($image->title);

                        

                    }

                    ?>

                <div class="photo-post standard-post">

                    <div class="post-gallery">

                        <div class="rr-gallery photo-gal">

                            <a href="<?php echo base_url('photogallery/').strtolower($image->category.'/'.$image->slug) ?>"> <img src="<?php echo $image->image->image ?>" class="img-responsive" alt=""> </a>



                        </div>

                        <p><a class="black-text" href="<?php echo base_url('photogallery/').strtolower($image->category.'/'.$image->slug) ?>"><?php echo $ftitle ?></a></p>

                        <div class="post-div">

                        <i class="fas fa-image blink"></i>

                                    </div>

                    </div>

                </div>

                <?php } ?>

            </div>

            <div class="line-end">

                <a href="<?php echo base_url('photo-gallery/') ?>">ಎಲ್ಲವನ್ನೂ ನೋಡಿ</a>

            </div>

        </div>

        </div>

        <!-- playlist slider -->
        <div class="row">
            <div class="title-tra">
                <h6>Playlist</h6>
               
            </div>
            <div class="photo-pass">
                <?php foreach ($playlists as $key => $row) {

                   
                    ?>
                <div class="photo-post standard-post">
                    <div class="post-gallery">
                        <div class="rr-gallery photo-gal">
                            <a
                                href="<?php echo strtolower(base_url().'playlist/').$row->pl_slug; ?>">
                                <img src="<?php echo $row->playlist_img ?>" class="img-responsive" alt=""> </a>

                        </div>
                        <p><a class="black-text"
                                href="<?php echo strtolower(base_url().'playlist/').$row->pl_slug; ?>"><?php echo ($row->playlist) ?></a>
                        </p>
                        <div class="post-div">
                            <i class="fas fa-image blink"></i>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
           
        </div>



    </section>

    <div class="height-li"></div>

    <!-- <div id="spiritual" class="col s12 red">Test 2</div>

    <div id="nation" class="col s12 green">Test 3</div> -->

    </div>



    <!-- <div class="" id="test-swipe-2">



    </div> -->

    <?php $this->load->view('mobile/footer.php'); ?>



    <!-- script -->

    <div class="go-top active" onclick="topFunction()">

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

                $('.video-pass').slick({

                    dots: false,

                    infinite: false,

                    speed: 300,

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    arrows: true,

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

                            infinite: true,

                            speed: 300,

                            arrows: true,

                            autoplay: true,

                            autoplaySpeed: 5000,

                            nextArrow: '<span class="next"><i class="fas fa-caret-right rr-dm"></i></span>',

                            prevArrow: '<span class="prev"><i class="fas fa-caret-left ll-dm"></i></span>',



                        }



                    }]



                });

                $('.photo-pass').slick({

                    dots: false,

                    infinite: false,

                    speed: 300,

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    arrows: true,

                    autoplay:true,

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



                            slidesToScroll: 2,

                             arrows: false,



                        }



                    }, {



                        breakpoint: 580,

                        settings: {

                            slidesToShow: 1,

                            slidesToScroll: 1,

                            dots: false,

                            infinite: true,

                            speed: 300,

                            arrows: false,

                            autoplay: true,

                            autoplaySpeed: 5000,

                            nextArrow: '<span class="next"><i class="fas fa-caret-right r-dm"></i></span>',

                            prevArrow: '<span class="prev"><i class="fas fa-caret-left l-dm"></i></span>',



                        }



                    }]



                });

                // Scroll Event

                // $(window).on('scroll', function() {

                //     var scrolled = $(window).scrollTop();

                //     if (scrolled > 300) $('.go-top').addClass('active');

                //     if (scrolled < 300) $('.go-top').removeClass('active');

                // });

                // Click Event

                // $('.go-top').on('click', function() {

                //     $("html, body").animate({

                //         scrollTop: "-0"

                //     }, 500);;

                // });







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

                    $(".bs").css("display", "block");

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

            // $(window).scroll(function() {

            //     if ($('#pageStart:in-viewport(tmp)')) {

            //         $(".go-top").hide("slow");

            //     } else {

            //         $(".go-top").show("slow");

            //     }

            // });

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