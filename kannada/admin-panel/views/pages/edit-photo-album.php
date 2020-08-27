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
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
      <style> .cont { position: absolute; right: 2px; background: #fff; padding: 1px 8px; bottom: 39px; border-radius: 2px; box-shadow: 0px 0px 4px; font-size: 11px; } </style>
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
                           <div class="card-heading">
                                <div class="row ">
                                    <div class="col 12 m6">
                                        <p class="h5-para black-text m0">Edit Photo Album</p>
                                    </div>
                                    <div class="col 12 m6 right-align">
                                        <!-- <a href="#modal1" class="waves-effect waves-light btn brand white-text hoverable modal-trigger" id="addArticle"><i class="fas fa-plus left"></i> Add new</a> -->
                                    </div>
                                </div>
                                <form  action="<?php echo base_url() ?>photos/addAlbum" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                    <a href="#!" class="close-btn modal-close waves-effect waves-red"><i class="fas fa-times"></i></a>

                                        <div class="modal-container row">
                                    
                                            <div class="col s12 ">
                                                <!-- basic detail -->
                                                    <div class="basic-detail card card-25">
                                                        <div class="input-field col s12 m6">
                                                            <input type="text" id="title" name="title" placeholder="." required class="validate"
                                                                value="<?php echo $album->title;?>" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)">
                                                            <label for="title">Gallery Title <span class="red-text">*</span></label>
                                                            <input type="hidden" id="ctid" name="ctid">
                                                        </div>
                                                        <div class="input-field col s12 m6">
                                                            <input type="text" id="slug" name="slug" placeholder="" class="validate"
                                                                value="<?php echo $album->slug;?>">
                                                            <label for="slug">Slug<span class="red-text"> *</span></label>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                        
                                                        <div class="input-field col s12 m6">

                                                            <select required id="posted_by" name="posted_by">
                                                                <option value="" disabled >Choose Author</option>
                                                                <option selected value="<?php echo $album->author;?>"><?php echo $album->name;?></option>
                                                                <option value="0"> none </option>
                                                            </select>
                                                            <label for="posted_by">Author</label>
                                                        </div>

                                                        <div class="input-field col s12 m6">
                                                            <input type="text" id="date" name="date" placeholder=""
                                                                class="validate datepicker" value="<?php echo $album->date ?>">
                                                            <label for="date">Date</label>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        <div class="input-field col s12 " style="margin-top:0px">
                                                            <div class="">
                                                                <label for="">Add Tags</label>
                                                                <input name="tags" id="tags" class="tagsfield" value="<?php echo $album->tags ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col s12">
                                                            <p><b>Featured image</b></p>
                                                        </div>       
                                                        <div class="gallery-add-container col s12" dataid='1'>
                                                            <div class="row">
                                                                <div class="col s12 m5 push-m7">
                                                                    <div class="preview center">
                                                                        <div class="valign-wrapper">
                                                                            <img dataid="1" src="<?php echo $album->f_image ?>" alt="" class="responsive-img">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col s12 m7 pull-m5">
                                                                    <h5>1/<span class="total-item">1</span></h5>
                                                                    <div class="image-selection">
                                                                        <div class="file-field draggable center">
                                                                            <div class="drag-place center">
                                                                                <i class="material-icons small"> cloud_upload </i>
                                                                                <p>Drag &amp; Drop Image here</p>
                                                                                <p>Or</p>
                                                                            </div>
                                                                            <div class="btn-img">
                                                                                <span>Browse Image</span>
                                                                                <input type="file" id="img" dataid="1" name="img" accept="image/*">
                                                                            </div>
                                                                            <div class="file-path-wrapper ">
                                                                                <input class="file-path validate" name="filepath" type="hidden" placeholder="Upload  files">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row m0">
                                                            <div class="col s12">
                                                            <p><b>Album Images</b></p>
                                                        </div>
                                                                <div class="file-field input-field col s12 l12">
                                                                    <div class="input-images"></div>
                                                                    <span class="helper-text" data-error="wrong" data-success="right"><b>Note</b>: Please select only image file (eg:
                                                                        .jpg, .png, .jpeg, .gif etc.) <br> <span class="bold">Max file
                                                                            size:</span> 2MB <span class="red-text">*</span></span>
                                                                </div>
                                                        </div>
                                                        
                                                    </div>
                                                <!-- Endbasic detail -->
                                            </div>
                                            

                                                            
                                        </div>
                                    </div>
                                    <br>
                                    <input type="hidden" name="album_id" value="<?php echo $album->id  ?>">
                                    <div class="modal-footer mt10">
                                    <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" name="submit" type="submit" value="post">Post <i class="fas fa-paper-plane right"></i></button>
                                    <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small btn">Close <i class="fas fa-times right"></i></a> 
                                    </div>
                                </form>
                           </div>
                           
                        </div>
                    </div>
                    <br>
                    <div class="card m0">
                    
                        <div class="card-body" style="padding:20px">
                        <p>Album Images</p>
                            <ul>
                                <?php
                                foreach ($allalbum as $key => $value) {  ?>
                                        <li class="tumb-item">
                                            <div class="tumb-img">
                                                <img src="<?php echo (!empty($value->image))?$value->image:''; ?>" alt="">
                                            </div>
                                            <div class="tumb-action">
                                                <a href="<?php echo base_url('photos/deleteAlbum/').$value->id ?>" class="delete-btn"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        </li>
                                <?php } ?>
                            </ul>
                            
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
      <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
      <script src="<?php echo base_url() ?>assets/js/tag.js"></script>
      <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
      <script>
          <?php $this->load->view('include/message.php'); ?>;
          $(document).ready(function () {
            $('.input-images').imageUploader();
              
            $('select').formSelect();
            $('.collapsible').collapsible({accordion: false});
            $("select[required]").css({
                display: "inline",
                height: 0,
                padding: 0,
                width: 0
            });
            $('.multiple-select').formSelect({
                isMultiple: true
            });
            $('.modal').modal({onCloseEnd : clearform});
            $('#tags').tagsInput({ 'defaultText':'add a Tags', });
            $('.datepicker').datepicker();
            $('.timepicker').timepicker();

            function clearform() {
                $('#addArticle').removeAttr('data-draft');
                $('#newsPost')[0].reset();
                $('input[name=tags]').importTags('');
                $('#img-previwer').attr('src', '');
                $('#ctid').val('');
                $('button[value=post]').html('Post <i class="fas fa-paper-plane right"></i>');
                CKEDITOR.instances['description'].setData('');
                var postedby = $('select[name=posted_by]').find('option');
                $.each(postedby, function (i, vl) { 
                    $(this).attr("selected", false);
                });

                var textcat = $('select[name=category]').find('option');
                $.each(textcat, function (i, vl) { 
                    $(this).attr("selected", false);
                }); 
            }

           
           

           

            $(document).on('change', 'input[type=file]', function (e) { 
                var id = $(this).attr('dataid');
                readURL(this, id);
                
            });

            function readURL(input, id) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('img[dataid='+id+']').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
            }

            function setVales(text = null, setTo = null){
                if(text.length > 350) text = text.substring(0,350);
               $.each(setTo, function (index, value) { 
                    $('#'+value).val(text);
               });
            }
            
            // Set metas
            $('#title').keyup(function (e) { 
                var text = $(this).val();
                var setTo = ['ptitle', 'ftitle', 'ttitle'];
                setVales(text, setTo);
            });

            

          });

        function convertToSlug(str) {
        
            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.‘’<>?\s]/g, ' ').toLowerCase();
            
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');
            
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');	
            document.getElementById("slug").value = str;
            //return str;
        }

     
      </script>
      <script>
        $(".delete-btn").on('click', function(event) {

if (confirm("Are you sure you want to delete this item?") == true) {
   event.preventDefault();
       
         var tr = $(this).closest("li")
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
          
            success: function(data) {
                
                 if(data==true){
                  tr.remove();
                  M.toast({
                    html: 'Image deleted succesfully',
                    classes: 'green',
                    displayLength: 5000
                });
               
                 }else{
                  M.toast({
                    html: 'Some error occured',
                    classes: 'red',
                    displayLength: 5000
                });
                 }
                
            }
        });

      } else{
         return false;
      }
      
    });
      </script>
   
</body>
</html>
