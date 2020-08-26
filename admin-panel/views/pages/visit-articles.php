<?php  $this->ci =& get_instance();

?>

<!DOCTYPE html>
<html>

   <head>
      <title>Visit Articles</title>
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

               <div class="col m12 s12 l5">
                  <div class="main-bar">

                     

                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                            <div class="row">
                                <div class="col 12 m6">
                                    <p class="h5-para black-text m0">Visit Articles</p>
                                </div>
                            </div>
                              <div class="">
                                 <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="align-center">
                                          <th class="center" width="75px">Sl NO.</th>
                                          <th width="250px">Articles</th>
                                          <th class="center">Views</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=0; foreach($articles as $k => $row){$count++ ?>
                                            <tr>
                                                <td class="center"><?php echo $count?></td>
                                                <td><?php echo $row->title ?></td>
                                                <td class="center"><?php echo $row->views ?></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                 </table>  
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col m12 s12 l4">
                  <div class="main-bar">
                     <ul class="collection with-header m0">
                        <li class="collection-header"><h6>Category</h6></li>
                            <a href="<?php echo base_url('visit-articles') ?>" class="collection-item <?php echo $this->uri->segment(2) == ''?'active':''?>" ><div><span >All</span><span class="badge <?php echo $this->uri->segment(2) == ''?'white':''?>"><?php echo  allViewsCount();?></span></div></a>
                            <?php foreach ($category as $key => $value) { ?>
                            <a href="<?php echo base_url('visit-articles/').$value->id ?>" class="collection-item <?php echo $this->uri->segment(2) ==$value->id ?'active':''?>"><div><span ><?php echo $value->title ?></span><span class="badge <?php echo $this->uri->segment(2) == $value->id?'white':''?>"><?php //echo  $value->id;?><?php echo  viewsCount($value->id);?></span></div></a>
                                 <?php } ?>
                           
                    </ul>

                  </div>
               </div>
            </div>
         </div>
      </section>

     
      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
     
      <!-- data table -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
      <script>
        <?php $this->load->view('include/message.php'); ?>;
      </script>
      <script>
        $(document).ready( function () {
             // materializedcss js initialize
            $('select').formSelect();
            $('.modal').modal({onOpenStart: reset});
            $('.tooltipped').tooltip();

            function reset(){  
                $('#category_form')[0].reset();
                $('#ctid').val('')
            }
            // ajax request
            var dataTable = $('#dynamic').DataTable({
                
                  'dom': 'Bfrtip',
                  'buttons': [
                     'copy', 'csv', 'pdf'
                  ], 
                  
            })
          
            $('.delete-btn').click(function (e) { 
               if(confirm('Are you sure want to delete email id???')){
                  return true;
               }else{
                  return false;
               }
               
            });
        });
      </script>
      
</body>
</html>
