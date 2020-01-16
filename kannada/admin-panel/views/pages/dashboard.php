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
                  <div class="row">
                     <div class="top-report">
                        <div class="col s6 m4 l4">
                           <a href="<?php echo base_url('post') ?>">
                           <div class="card horizontal item1 hoverable">
                                 <div class="card-image valign-wrapper ">
                                    <i class="far fa-newspaper li-icon"></i>
                                 </div>
                                 <div class="card-stacked">
                                    <div class="card-content">
                                       <p><?php echo $topCount['articles'] ?></p>
                                    </div>
                                    <div class="card-action">
                                       <span class="white-text">Articles</span>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>

                        <div class="col s6 m4 l4">
                           <a href=""<?php echo base_url('category') ?>">
                           <div class="card horizontal item2 hoverable">
                                 <div class="card-image valign-wrapper ">
                                    <i class="fas fa-boxes li-icon "></i>
                                 </div>
                                 <div class="card-stacked">
                                    <div class="card-content">
                                       <p><?php echo $topCount['category'] ?></p>
                                    </div>
                                    <div class="card-action">
                                       <span class="white-text">Categories</span>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>

                        <div class="col s6 m4 l4">
                           <a href=""<?php echo base_url('author') ?>">
                           <div class="card horizontal item3 hoverable">
                                 <div class="card-image valign-wrapper ">
                                    <i class="fas fa-user-tie li-icon"></i>
                                 </div>
                                 <div class="card-stacked">
                                    <div class="card-content">
                                       <p><?php echo $topCount['Authors'] ?></p>
                                    </div>
                                    <div class="card-action">
                                       <span class="white-text">Authors</span>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>

                     </div>
                  </div>

                  <div class="row">
                        <div class="col s12 m12 l8">
                           <!--  Most viewed Article -->
                           <?php
                              // most view per
                              $mostViewPerDay = "Today's";
                              $per = $this->input->get('mview');
                              if($per == 'week'){
                                 $mostViewPerDay = 'Current Week';
                              }elseif($per == 'half-month'){
                                 $mostViewPerDay = "Last 15 day's";
                              }elseif ($per == 'month') {
                                 $mostViewPerDay = "Current Month";
                              }
                              elseif ($per == 'year') {
                                 $mostViewPerDay = "Current Year";
                              }else{
                                 $mostViewPerDay = "Today's";
                              }
                           
                           ?>
                           <div class="most-view-toolbar">
                                 <div class="row m0">
                                    <p class="heading left">Most Viewed Articles (<?php echo $mostViewPerDay ?>)</p>
                                    <a class='dropdown-trigger btn right' href='#' data-target='dropdown1'>Sort By date &nbsp; &nbsp;<i class="fas fa-caret-down "></i></a>
                                    <ul id='dropdown1' class='dropdown-content'>
                                       <li><a href="<?php echo base_url('dashboard') ?>">Today</a></li>
                                       <li><a href="<?php echo base_url('dashboard?mview=') ?>week">Current week</a></li>
                                       <li><a href="<?php echo base_url('dashboard?mview=') ?>half-month">15 days</a></li>
                                       <li><a href="<?php echo base_url('dashboard?mview=') ?>month">Current Months</a></li>
                                       <li><a href="<?php echo base_url('dashboard?mview=') ?>year">Current Year</a></li>
                                    </ul>
                                 </div>
                           </div>
                           <?php if(!empty($mostViewed)) { foreach($mostViewed as $key => $posts) {  ?>
                              <a target="_blank" href="<?php echo $this->config->item('web_url').strtolower($posts->category.'/'.$posts->slug)?>">
                                 <div class="most-view-list hoverable">
                                    <div class="card z-depth-1">
                                       <div class="row m0">
   
                                          <div class="col s12 m8 l8">
                                             <div class="icon-list ">
                                                <span class="views"><i class="fas fa-eye grey-text"></i> <?php echo $posts->views ?></span>
                                                <span class="date"><i class="far fa-clock grey-text"></i> <?php echo date('h:i A', strtotime($posts->update_on)) ?></span>
                                             </div>
                                             <div>
                                                <p class="truncate"><?php echo $posts->title ?></p>
                                             </div>
                                          </div>
                                          <div class="col s12 m4 l4">
                                             <div class="icon-list">
                                                <span class="views"><i class="fab fa-facebook-square  blue-text text-darken-4"></i> 200</span>
                                                <span class="date"><i class="fab fa-linkedin blue-text text-darken-2"></i> 320</span>
                                                <span class="date"><i class="fab fa-twitter-square blue-text text-lighten-2"></i> 150</span>
                                             </div>
                                             <div>
                                                <p class="truncate">
                                                   <a href="<?php echo base_url('author/'). $posts->authid?>"><?php echo $posts->author ?></a>
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           <?php } }else { ?> 
                              <div class="card">
                                 <div class="card-content center">
                                    <img src="<?php echo base_url() ?>assets/img/notfound.png" style="max-height:350px" alt="" class="responsive-img">
                                    <h4 class="m0">No Result Found!</h4>
                                 </div>
                              </div>
                           <?php } ?> <!-- End Most viewed -->

                           
                        </div><!-- end col 8 -->
                        <div class="col s12 m12 l4">
                           <div class="web-visitor-chart">
                              <div class="chart-toolbar">
                                    <div class="btn-group">
                                       <a href=""  class="btn">Today</a>
                                       <a href=""  class="btn">Week</a>
                                       <a href=""  class="btn">Month</a>
                                    </div>
                              </div>
                              <div class="card">
                                    <canvas id="myChart" height="300px"></canvas>
                              </div>
                           </div><!-- web visitor count end -->

                           <div class="recent-post-authors">
                              <ul class="collection with-header">
                                 <li class="collection-header"><h5>Authors</h5></li>
                                 <?php foreach ($authors as $key => $value) { ?>
                                    <a href="<?php echo base_url('author/').$value->id ?>" class="collection-item"><div><span ><?php echo $value->name ?></span><span class="secondary-content"><?php echo $value->articles ?></span></div></a>
                                 <?php } ?>
                                 <a class="collection-item center-align green lighten-5" href="<?php echo base_url('author') ?>">View More</a>
                              </ul>
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
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
   
    <script>
        $(document).ready( function () {
            $('select').formSelect();
            $(".bluecircle").percircle();
            $('.dropdown-trigger').dropdown({
               constrainWidth: false
            });
        });

        var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['10:00 AM', '1:00 PM', '4:00 PM', '8:00 PM', '12:00 AM', '4:00 AM', '7:00 AM'],
        datasets: [{
            label: 'Website Visitors',
            backgroundColor: '#37ba68',
            borderColor: '#bceb32',
            data: [0, 100, 500, 200, 200, 300, 450]
        }]
    },

});
    </script>
</body>
</html>
