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
      
      <style type="text/css">
         .dash-list a .list-dashboard{transition: 0.5s}
         .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}

         .progiletable{
            width:70px;
            height:70px;
            overflow:hidden;
            border: 1px solid #c4c4c4;
            border-radius: 50%;
            text-align:center
         }
         .progiletable img{
            margin:auto;
            max-width:100%
         }
         .pad-rad{padding: 8px; border-radius: 2px; }
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
                  <div class="main-bar">

                     <div class="row">
                         <div class="col 12 m6">
                             <p class="h5-para black-text m0">Subadmin</p>
                         </div>
                         <div class="col 12 m6 right-align">
                             <a href="<?php echo base_url('subadmin/add') ?>" class="waves-effect waves-light btn brand white-text hoverable modal-trigger"><i class="fas fa-plus left"></i> Add new</a>
                         </div>
                     </div>
                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <table id="dynamic" class="striped">
                                    <thead>
                                       <tr>
                                          <th width="75px">Sl NO.</th>
                                          <th width="200px">Name</th>
                                          <th >Email</th>
                                          <th >Phone</th>
                                          <th >Status</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      if (!empty($result)) {
                                        $sl = 0;
                                        foreach ($result as $key => $value) { $sl++; ?>
                                        <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo (!empty($value->name))?$value->name:'---'; ?></td>
                                        <td><?php echo (!empty($value->email))?$value->email:'---'; ?></td>
                                        <td><?php echo (!empty($value->phone))?$value->phone:'---'; ?></td>
                                        <td><?php  if($value->is_active == '1'){ echo '<a href="'.base_url('subadmin/block/').$value->id.'" class="red hoverable blocker   action-btn"> <i class="fas fa-check  "></i> block</a>'; }else if($value->is_active == '0'){ echo '<span class="blue hoverable action-btn update-btn pad-rad white-text">Inactive</span>'; }else{ echo '<a href="'.base_url('subadmin/unblock/').$value->id.'" class="green hoverable blocker   action-btn"> <i class="fas fa-check  "></i> Unblock</a>'; } ?></td>
                                        <td> 
                                          <a class="blue hoverable action-btn update-btn" href="<?php echo base_url('subadmin/edit/').$value->id ?>"><i class="fas fa-edit "></i></a> 
                                          <a  href="<?php echo base_url('subadmin/delete/').$value->id ?>" class="red hoverable delete-btn action-btn"><i class="fas fa-trash  "></i></a>
                                        </td>
                                      </tr>
                                      <?php  } } ?> 
                                    </tbody>
                                 </table>  
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
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
      <script>
        <?php $this->load->view('include/message'); ?>
    </script>
      <script>
        $(document).ready( function () {
             // materializedcss js initialize
            $('select').formSelect();
        
        });
      </script>
      
</body>
</html>
