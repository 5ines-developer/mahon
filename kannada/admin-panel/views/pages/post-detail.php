<!DOCTYPE html>
<html>

   <head>
      <title><?php echo $title ?></title>
      <meta charset="UTF-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      
     
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
                    <?php if(!empty($post)){ ?>
                        <div class="card m0">
                            <div class="card-content">
                                <img src="<?php echo $this->config->item('web_url').$post->image ?>" class="responsive-img" alt="">
                                <h5><?php echo $post->title  ?></h5>
                                <div class="tags-block">
                                    <span ><i class="fas fa-tags"></i></span><span class="mr10"> Tags:</span>
                                <?php  $tags = explode(',',$post->tags); 
                                    foreach ($tags as $key => $tag) {
                                        echo '<span class="btn btn-small blue mr10">'.$tag.'</span>';
                                    }
                                ?>
                                </div>
                                <div class="mt15 widg-section">
                                    <span class="black-text">Category : </span> <span class="mr10 grey-text text-darken-2"><?php echo $post->category  ?></span> 
                                    <span class="mr10">  | </span>
                                    <span class="black-text">Post By : </span> <span class="mr10 grey-text text-darken-2"><?php echo $post->posted_by  ?></span>
                                    <span class="mr10">  | </span>
                                    <span class="black-text">Date : </span> <span class="mr10 grey-text text-darken-2"><?php echo $post->date  ?></span>
                                    <span class="mr10">  | </span>
                                    <span class="black-text">Posted Date : </span> <span class="mr10 grey-text text-darken-2"><?php echo date('d M Y',strtotime($post->created_on))  ?></span>
                                </div>
                                <div class="content-section mt20">
                                    <?php echo $post->content  ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

               </div>
            </div>
         </div>
      </section>

      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
   
    <script>
        $(document).ready( function () {
            $('select').formSelect();
        });
    </script>
</body>
</html>
