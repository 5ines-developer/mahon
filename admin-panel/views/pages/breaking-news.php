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
                             <p class="h5-para black-text m0">Breaking News</p>
                         </div>
                         <div class="col 12 m6 right-align">
                             <a href="#modal1" class="waves-effect waves-light btn brand white-text hoverable modal-trigger"><i class="fas fa-plus left"></i> Add new</a>
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
                                          <th width="350px">Title</th>
                                          <th >Added Date</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
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

      <div id="modal1" class="modal small-modal-1">
         <div class="modal-content">
             
             <form  method="post"  id="breaking_form">
                 
                 <div class="row m0">
                    <h6 class="m-title col">Add Breaking News</h6>
                     <div class="input-field col s12">
                       <input type="text" id="title" name="title" placeholder="" class="validate" autofocus required value="">
                       <label for="title" class="active">Title <span class="red-text">*</span></label>
                       <input type="hidden" id="ctid" name="ctid">
                     </div>

                     <div class="input-field col s12">
                       <input type="url" id="breaking" name="breaking" placeholder="" class="validate"  required value="">
                       <label for="breaking" class="active">URL <span class="red-text">*</span></label>
                     </div>

                     <div class="col s12">
                        <p>
                           <label>
                           <input type="checkbox" class="filled-in" name="newtab" id="newtab" value="1"  />
                           <span>Open with new tab</span>
                           </label>
                        </p>
                     </div>
                 </div> 
                 <div class="modal-footer">
                     <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit
                         <i class="fas fa-paper-plane right"></i>
                     </button>
                  <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small">Close <i class="fas fa-times right"></i></a>
               </div>                                            
            </form>


         </div>
         
      </div>



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
        $(document).ready( function () {
             // materializedcss js initialize
            $('select').formSelect();
            $('.modal').modal({onOpenStart: reset});

            function reset(){  
                $('#breaking_form')[0].reset();
                $('#ctid').val('')
            }
            // ajax request
            var dataTable = $('#dynamic').DataTable({
                  'processing' : true,
                  'serverSide' : true,
                  'dom': 'Bfrtip',
                  'buttons': [
                     'copy', 'csv', 'pdf'
                  ], 
                  'order' : [],
                  'ajax':{
                     'url' : "<?php echo base_url(). 'breaking_news/getData' ?>",
                     'type' :'POST'
                  },
                  'columnDefs':[
                     {
                        "targets":[0, 3],
                        "orderable":false,
                     }
                  ]
            })
          
            // delete data from database
            $(document).on('click', '.delete-btn', function(){
               var id = $(this).attr('id');
               if(confirm("Are you sure you want to delete this?"))  
                { 
                    $.ajax({
                       type: "POST",
                       url: "<?php echo base_url(); ?>breaking_news/delete",
                       data: {id: id},
                       success: function (data) {
                           $('#'+id).closest('tr').remove();
                           M.toast({html: data, classes: 'green'});
                       }
                    });
                }
                else{
                  return false;    
                }
            })

            //  update data
            $(document).on('click', '.update-btn', function(){

               var id = $(this).attr('id');
               $('.m-title').text('Edit Breaking News');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>breaking_news/single_data",
                    data: {id : id},
                    dataType: "json",
                    success: function (response) {
                        $('#breaking').val(response.url);
                        $('#title').val(response.title);
                        $('#ctid').val(response.id);
                        if(response.newtab == 1 ){
                           $('#newtab').attr('checked', 'checked');
                        }else{
                           $('#newtab').removeAttr('checked');
                        }
                    }
                });
            });

            // submit update breaking_form
            $(document).on('submit', '#breaking_form', function(event){  
                event.preventDefault();  
                var name = $('#breaking').val();  
                var id = $('#ctid').val(); 
                if(id != ''){
                    var closestd =  $('#'+id).closest('tr').find('td');
                    $.ajax({  
                      url:"<?php echo base_url() . 'breaking_news/update_breaking'?>",  
                      method:'POST',  
                      data:new FormData(this),  
                      contentType:false,  
                      processData:false,  
                      success:function(data)  
                      {  
                         $('#breaking_form')[0].reset();  
                         M.toast({html: data, classes: 'green'});
                         var instances = M.Modal.init(document.querySelectorAll('.modal'));
                         instances[0].close();  
                         $('body').css("overflow-y" , "auto");
                        //  closestd.eq(1).text(name)
                        dataTable.ajax.reload();  
                      }  
                    }); 
                }else{
                    $.ajax({  
                      url:"<?php echo base_url() . 'breaking_news/add'?>",  
                      method:'POST',  
                      data:new FormData(this),  
                      contentType:false,  
                      processData:false,  
                      success:function(data)  
                      {  
                         $('#breaking_form')[0].reset();  
                         M.toast({html: data, classes: 'green'});
                         var instances = M.Modal.init(document.querySelectorAll('.modal'));
                         instances[0].close();  
                         $('body').css("overflow-y" , "auto");
                         dataTable.ajax.reload();  
                      },
                      error: function(res){
                        $('#breaking_form')[0].reset();  
                        M.toast({html: res.responseText, classes: 'red'});
                        var instances = M.Modal.init(document.querySelectorAll('.modal'));
                        instances[0].close();  
                        $('body').css("overflow-y" , "auto");
                      }
                      
                    }); 
                }                
            });  
        
        });
      </script>
      
</body>
</html>
