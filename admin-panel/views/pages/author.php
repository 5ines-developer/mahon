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
                             <p class="h5-para black-text m0">Author</p>
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
                                          <th width="100px">Profile</th>
                                          <th width="250px">Name</th>
                                          <th >Email</th>
                                          <th >Phone</th>
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

      <div id="modal1" class="modal ">
         <div class="modal-content">
             
             <form  method="post"  id="author_form" enctype="multipart/form-data">
                 
                 <div class="row m0">
                    <h6 class="m-title col s12">Add Author</h6>
                     <div class="input-field col s12 m6">
                       <input type="text" id="name" name="name" placeholder="" class="validate" autofocus required value="">
                       <label for="name" class="active">Name <span class="red-text">*</span></label>
                       <input type="hidden" id="ctid" name="ctid">
                     </div>

                     <div class="input-field col s12 m6">
                       <input type="email" id="email" name="email" placeholder="" class="validate"  required value="">
                       <label for="email" class="active">Email <span class="red-text">*</span></label>
                     </div>

                     <div class="input-field col s12 m6">
                       <input type="number" id="phone" name="phone" placeholder="" class="validate"  required value="">
                       <label for="phone" class="active">Phone <span class="red-text">*</span></label>
                     </div>

                     

                     <div class="file-field input-field col s12 m6">
                        <div class="btn">
                           <span>Profile pic</span>
                           <input type="file" name="img">
                        </div>
                        <div class="file-path-wrapper">
                           <input class="file-path validate" name="filepath" type="text" placeholder="For good view use rectangle image">
                        </div>
                     </div>

                     <div class="input-field col s12">
                        <textarea id="about" placeholder="."  name="about" class="materialize-textarea" data-length="120"></textarea>
                        <label class="active" for="about">About author</label>
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
                $('#author_form')[0].reset();
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
                     'url' : "<?php echo base_url(). 'author/getData' ?>",
                     'type' :'POST'
                  },
                  'columnDefs':[
                     {
                        "targets":[0,5],
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
                       url: "<?php echo base_url(); ?>author/delete",
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
               $('.m-title').text('Edit Category');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>author/single_data",
                    data: {id : id},
                    dataType: "json",
                    success: function (response) {
                        $('#name').val(response.name);
                        $('#ctid').val(response.id);
                        $('#email').val(response.email);
                        $('#phone').val(response.phone);
                        $('#about').val(response.abt);
                        $('.file-path').val(response.profile);

                    }
                });
            });

            // submit update author_form
            $(document).on('submit', '#author_form', function(event){  
                event.preventDefault();  
                
                var id = $('#ctid').val(); 
                if(id != ''){
                    var closestd =  $('#'+id).closest('tr').find('td');
                    $.ajax({  
                      url:"<?php echo base_url() . 'author/add_author'?>",  
                      method:'POST',  
                      data:new FormData(this),  
                      contentType:false,  
                      processData:false,  
                      success:function(data)  
                      {  
                         $('#author_form')[0].reset();  
                         M.toast({html: data, classes: 'green'});
                         var instances = M.Modal.init(document.querySelectorAll('.modal'));
                         instances[0].close();  
                         $('body').css("overflow-y" , "auto");
                         dataTable.ajax.reload(); 
                      }  
                    }); 
                }else{
                    $.ajax({  
                      url:"<?php echo base_url() . 'author/add_author'?>",  
                      method:'POST',  
                      data:new FormData(this),  
                      contentType:false,  
                      processData:false,  
                      success:function(data)  
                      {  
                         $('#author_form')[0].reset();  
                         M.toast({html: data, classes: 'green'});
                         var instances = M.Modal.init(document.querySelectorAll('.modal'));
                         instances[0].close();  
                         $('body').css("overflow-y" , "auto");
                         dataTable.ajax.reload();  
                      },
                      error: function(res){
                        $('#author_form')[0].reset();  
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
