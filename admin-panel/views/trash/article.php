<!DOCTYPE html>
<html>

   <head>
      <title>trash</title>
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
         [type="checkbox"]:not(:checked), [type="checkbox"]:checked { position: relative; opacity: 1; pointer-events: all; }

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
                             <p class="h5-para black-text m0">Trash (Article)</p>
                         </div>
                     </div>
                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="align-center">
                                          <th >
                                             <input type="checkbox" class="filled-in" id="allCheck" />
                                          </th>
                                          <th class="center">Action</th>
                                          <th class="center" width="75px">Sl NO.</th>
                                          <th width="250px">Title</th>
                                          <th class="center">Category</th>
                                          <th class="center">Date</th>
                                          <th class="center">Posted By</th>
                                          <th class="center">Uploaded date</th>
                                       </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php foreach($result as $k => $row){ 
                                           if($row->status != 3 && $row->status != 4 && $row->status != 1){
                                       ?>
                                            <tr>
                                               <td class="center">
                                                   <input type="checkbox" class="filled-in indual" name="deleteid[]" value="<?php echo $row->id ?>" />
                                               </td>
                                                <td class="center">
                                                   <?php if($row->status == 2):  ?>
                                                   <a href="<?php echo base_url('trash/article-restore/').$row->id ?>" class="blue hoverable action-btn update-btn ">Restore</a>
                                                   <?php elseif ($row->status == 0):?>
                                                      <a href="#!" class="red lighten-3 btn-small action-btn tooltipped action-btn update-btn" data-position="right" data-tooltip="you need restore <?php echo $row->category ?> category">Restore</a>
                                                   <?php endif; ?>
                                                </td>
                                                <td class="center"><?php echo $k + 1?></td>
                                                <td><?php echo $row->title ?></td>
                                                <td class="center"><?php echo $row->category ?></td>
                                                <td class="center"><?php echo $row->date ?></td>
                                                <td ><?php echo $row->posted_by ?></td>
                                                <td class="center"><?php echo $row->created_on ?></td>
                                            </tr>
                                        <?php } }?>
                                    </tbody>
                                    <tfoot>
                                       <tr>
                                          <td colspan="2"><a href="#!" class="delete-check"><i class="fas fa-trash-alt red-text"></i> Delete</a> </td>
                                          <td colspan="6"><a href="<?php echo base_url('trash/article/clear-all') ?>" class="clear-btn"><i class="fas fa-times red-text"></i> Clear all trash</a> </td>
                                       </tr>
                                    </tfoot>
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
                  "columnDefs": [
                     { "orderable": false, "targets": [0, 1] }
                  ]
                  
            });

            $('#allCheck').change(function (e) { 
               e.preventDefault();
               if($(this).prop("checked") == true){
                  $('.indual').prop( "checked", true );
               }
               else if($(this). prop("checked") == false){
                  $('.indual').prop( "checked", false );
               }
            });

            // delete cheked item
            $('.delete-check').click(function (e) { 
               e.preventDefault();
               if(confirm('Are you sure???')){
                  var selected = [];
                     $('.indual:checked').each(function() {
                        selected.push($(this).val());
                     });
                  $.ajax({
                        type: "post",
                        url: "<?php echo base_url('trash/article/delete') ?>",
                        data: {ids : selected},
                        dataType: "json",
                        success: function(response) {
                           location.reload(); 
                        },
                        
                  });
               }else{
                  return false;
               }
               
            });

            $('.clear-btn').click(function(e){ 
               if(confirm('Are you sure want to clear all trash data???')){
                  return true;
               }
               return false;
            });
          
        });
      </script>
      
</body>
</html>
