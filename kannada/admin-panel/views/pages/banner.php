<!DOCTYPE html>
<html>

   <head>
      <title><?php echo $title ?></title>
      <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      
      <style type="text/css">
         .dash-list a .list-dashboard{transition: 0.5s}
         .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}
      
      </style>
   </head>
   <body>
      <!-- headder -->
         <div id="header-include">
           <?php $this->load->view('include/header.php'); ?>
         </div>
      <!-- end headder -->
      <!-- main layout -->
      <section class="sec-top">
         <div class="container-wrap">
            <div class="row">
              <!-- menu  -->

              <div id="sidemenu-include">
                <?php $this->load->view('include/menu.php'); ?>
              </div>

               <div class="col m12 s12 l9">
                    <div class="card m0">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m3">
                                    <!-- L1 -->
                                    <?php if(!empty($banner['1'])) { ?>
                                        <div class="container-banner l1">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <img src="<?php echo $this->config->item('web_url').$banner['1']->image ?>" class="activator">
                                                    <span class="card-title">L1</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#modal1" data-id="l1"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                                <div class="card-content">
                                                    <p  class="truncate"><?php echo $banner['1']->title ?></p>
                                                </div>

                                                <div class="card-reveal">
                                                    <span class="card-title grey-text text-darken-4 "><?php echo $banner['1']->title ?><i class="fas fa-times right"></i></span>
                                                    <p ><?php echo !empty($banner['1']->content) ? $banner['1']->content : '' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>    
                                    <!-- L2 -->
                                    <?php if(!empty($banner['2'])) { ?>
                                        <div class="container-banner l2">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <img src="<?php echo $this->config->item('web_url').$banner['2']->image ?>" class="activator">
                                                    <span class="card-title">L2</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#modal1" data-id="l2"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                                <div class="card-content">
                                                    <p  class="truncate"><?php echo $banner['2']->title ?></p>
                                                </div>

                                                <div class="card-reveal">
                                                    <span class="card-title grey-text text-darken-4"><?php echo $banner['2']->title ?><i class="fas fa-times right"></i></span>
                                                    <p><?php echo !empty($banner['2']->content) ? $banner['2']->content : '' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- C1 -->
                                <?php if(!empty($banner['0'])) { ?>
                                    <div class="col s12 m6">
                                        <div class="container-banner cnt">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <img src="<?php echo $this->config->item('web_url').$banner['0']->image ?>" class="activator">
                                                    <span class="card-title">C1</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#modal1" data-id="c1"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                                <div class="card-content">
                                                    <p  class="truncate"><?php echo $banner['0']->title ?></p>
                                                </div>

                                                <div class="card-reveal">
                                                    <span class="card-title grey-text text-darken-4"><?php echo $banner['0']->title ?><i class="fas fa-times right"></i></span>
                                                    <p><?php echo !empty($banner['0']->content) ? $banner['0']->content : '' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col s12 m3">
                                    <!--  R1 -->
                                    <?php if(!empty($banner['3'])) { ?>
                                        <div class="container-banner r1">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <img src="<?php echo $this->config->item('web_url').$banner['3']->image ?>" class="activator">
                                                    <span class="card-title">R1</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#modal1" data-id="r1"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                                <div class="card-content">
                                                    <p  class="truncate"><?php echo $banner['3']->title ?></p>
                                                </div>

                                                <div class="card-reveal">
                                                    <span class="card-title grey-text text-darken-4"><?php echo $banner['3']->title ?><i class="fas fa-times right"></i></span>
                                                    <p><?php echo !empty($banner['3']->content) ? $banner['3']->content : '' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- R2  -->
                                    <?php if(!empty($banner['4'])) { ?>
                                        <div class="container-banner r2">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <img src="<?php echo $this->config->item('web_url').$banner['4']->image ?>" class="activator">
                                                    <span class="card-title">R2</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#modal1" data-id="r2"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                                <div class="card-content">
                                                    <p  class="truncate"><?php echo $banner['4']->title ?></p>
                                                </div>

                                                <div class="card-reveal">
                                                    <span class="card-title grey-text text-darken-4"><?php echo $banner['4']->title ?><i class="fas fa-times right"></i></span>
                                                    <p><?php echo !empty($banner['4']->content) ? $banner['4']->content : '' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php if(empty($banner['1']) && empty($banner['0']) && empty($banner['2']) && empty($banner['3']) && empty($banner['4'])){
                                echo '<h3 class="center">No result found</h3>';
                            } ?>
                        </div>
                    </div>
               </div>
            </div>
         </div>
      </section>

      <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <form action="<?php echo base_url() ?>banner/update" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="modal-content">
            <h6 class="bold">Change Banner Article</h6>
            <br>
            <div class="row">
                <div class="col s12">
                    <span >Select Banner Type </span>
                </div>
                    <div class="col s12 m4">
                        <input type="hidden" name="postion">
                        <p>
                            <label>
                                <input class="with-gap" name="type" type="radio"  value="recent" checked />
                                <span>Recent</span>
                            </label>
                        </p>
                    </div>
    
                    <div class="col s12 m4">
                        <p>
                            <label>
                                <input class="with-gap" name="type" value="article" type="radio"  />
                                <span>Article</span>
                            </label>
                        </p>
                    </div>
    
                    <div class="col s12 m4">
                        <p>
                            <label>
                                <input class="with-gap" name="type" value="custom" type="radio"  />
                                <span>Custom</span>
                            </label>
                        </p>
                    </div>
    
                    <div class="input-field col s12 article-box">
                        <input placeholder="Past Article url" id="arurl"  name="arurl" type="text" class="validate">
                        <label for="arurl">URL</label>
                    </div>
    
                    
                    <div class="custom-box">
                        <div class="input-field col s12 m6"> 
                            <input id="ctitle" name="ctitle" placeholder="." type="text" class="validate">
                            <label for="ctitle">Title</label>
                        </div>   
    
                        <div class="input-field col s12 m6">
                            <input  id="curl" type="text" placeholder="." name="curl" class="validate">
                            <label for="curl">URL</label>
                        </div>

                        <div class="col s12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Select Image</span>
                                    <input type="file" name="img" >
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="filepath" type="text">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    
                    
                    
                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit <i class="fas fa-paper-plane right"></i> </button>
                <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small">Close <i class="fas fa-times right"></i></a>
            </div>
        </form>
    </div>

      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
   
    <script>
        <?php $this->load->view('include/message.php'); ?>;
        $(document).ready( function () {
            $('select').formSelect();
            $('.modal').modal();


            $('.container-banner .card-image a').click(function (e) { 
                e.preventDefault();
                var position = $(this).attr('data-id');
                $('input[name=postion]').val(position);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>banner/get_single_banner",
                    data: {position : position},
                    dataType: "json",
                    success: function (res) {
                        console.log(res);
                        var type = res.type;
                        if(type == 'article'){
                            $("input[value=article]").prop("checked", true);
                            $('input[name=arurl]').val(res.link);
                        }
                        else if(type == 'custom'){
                            $("input[value=custom]").prop("checked", true);
                            $('input[name=ctitle]').val(res.title);
                            $('input[name=curl]').val(res.link);
                            $('.file-path').val(res.img);
                        }
                        else{
                            $("input[value=recent]").prop("checked", true);
                        }

                        changePosition(type);
                    }
                });
            });

            $(document).on('change', 'input[type=radio]', function (e) { 
                e.preventDefault();
                var radio = $(this).val();
                if(radio == 'article'){
                    $('.article-box').fadeIn(800);
                    $('.custom-box').fadeOut(0);
                }
                else if(radio == 'custom'){
                    $('.custom-box').fadeIn(800);
                    $('.article-box').fadeOut(0);
                }
                else{
                    $('.custom-box, .article-box').fadeOut(0);
                }
            });

            function changePosition(radio){
                if(radio == 'article'){
                    $('.article-box').fadeIn(800);
                    $('.custom-box').fadeOut(0);
                }
                else if(radio == 'custom'){
                    $('.custom-box').fadeIn(800);
                    $('.article-box').fadeOut(0);
                }
                else{
                    $('.custom-box, .article-box').fadeOut(0);
                }
            }
        });
    </script>
</body>
</html>
