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
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/percircle.css">
      
      <style type="text/css">
         .dash-list a .list-dashboard{transition: 0.5s}
         .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}
         .percircle  span{line-height:11px}
      
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
                  <div class="row m0">
                     <div class="top-report">

                        <div class="col s6 m4 l4">
                           <div class="card horizontal cyan  ">
                              <div class="card-image valign-wrapper ">
                                 <i class="far fa-newspaper li-icon"></i>
                              </div>
                              <div class="card-stacked">
                                 <div class="card-content">
                                    <p>500</p>
                                 </div>
                                 <div class="card-action">
                                    <a href="#">Articles</a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col s6 m4 l4">
                           <div class="card horizontal teal accent-4">
                              <div class="card-image valign-wrapper ">
                                 <i class="fas fa-boxes li-icon "></i>
                              </div>
                              <div class="card-stacked">
                                 <div class="card-content">
                                    <p>20</p>
                                 </div>
                                 <div class="card-action">
                                    <a href="#">Category</a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col s6 m4 l4">
                           <div class="card horizontal teal">
                              <div class="card-image valign-wrapper ">
                                 <i class="fas fa-user-tie li-icon"></i>
                              </div>
                              <div class="card-stacked">
                                 <div class="card-content">
                                    <p>50</p>
                                 </div>
                                 <div class="card-action">
                                    <a href="#">Author</a>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/percircle.js"></script>
   
    <script>
        $(document).ready( function () {
            $('select').formSelect();
            $(".bluecircle").percircle();
        });
    </script>
</body>
</html>
