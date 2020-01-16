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
                    <div class="card m0">
                        <div class="card-content">
                            <form action="<?php echo base_url('post/edit/').$post->id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col l9">
                                        <div class="row m0">

                                            <div class="input-field col s12 m6">
                                                <input type="text" id="title" name="title" placeholder="" required
                                                    class="validate" value="<?php echo $post->title ?>" value="">
                                                <label for="title">Title <span class="red-text">*</span></label>
                                                <input type="hidden" id="ctid" name="ctid" value="<?php echo $post->id ?>">
                                            </div>

                                            <div class="input-field col s12 m6">
                                                <select required name="category" id="category">
                                                    <option value="" disabled>Choose Category</option>
                                                    <?php foreach ($category as $key => $value) {
                                                        $select = '';
                                                        if($value->title == $post->category){
                                                            $select = "slected";
                                                        }  
                                                        echo '<option '.$select.' value="'.$value->id.'">'.$value->title.'</option>';
                                                    } ?>
                                                </select>
                                                <label for="category">Category</label>
                                            </div>

                                            <div class="input-field col s12 m6">
                                                <input type="text" id="posted_by" name="posted_by" placeholder=""
                                                    class="validate" value="<?php echo $post->posted_by ?>">
                                                <label for="posted_by">Posted By</label>
                                            </div>

                                            <div class="input-field col s12 m6">
                                                <input type="text" id="date" name="date" placeholder=""
                                                    class="validate datepicker" value="<?php echo $post->date ?>">
                                                <label for="date">Date</label>
                                            </div>

                                            <div class="input-field col s12 m6">
                                                <input type="text" id="slug" name="slug" placeholder="" class="validate"
                                                value="<?php echo $post->slug ?>">
                                                <label for="slug">Slug<span class="red-text"> *</span></label>
                                            </div>

                                            <div class="file-field input-field col m6">
                                                <div class="btn">
                                                    <span>Featured Image</span>
                                                    <input type="file" id="img" name="img" value="">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" name="filepath" type="text"
                                                        placeholder="Upload  files" value="<?php echo $post->image ?>">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <div class="">
                                                    <label for="">Add Tags</label>
                                                    <input name="tags" id="tags" class="tagsfield" value="<?php echo $post->slug ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col m3">
                                        <img src="<?php echo $this->config->item('web_url').$post->image ?>" id="img-previwer" class="responsive-img">
                                    </div>

                                    <div class="col s12">
                                        <div class="divider"></div>
                                        <div class="col s12">
                                            <h6 class="bold">Content</h6>
                                        </div>
                                        <div class="row m0">
                                            <div class="col s12 m12">
                                                <textarea name="description" rows="30" id="description">
                                                    <?php echo $post->content ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <br>
                                        <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit <i class="fas fa-paper-plane right"></i> </button>
                                    </div>
                            </form>
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
    <script src="<?php echo base_url() ?>assets/js/tag.js"></script>
    <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
    <script>
    $(document).ready(function() {
        $('select').formSelect();
        $('#tags').tagsInput({ 'defaultText':'add a Tags', });
        CKEDITOR.replace( 'description');

         //  Image preview
         $('#img').change(function (e) { 
            readURL(this);
        });

         function readURL(input) {
            if (input.files && input.files[0]) {
               var reader = new FileReader();
               
               reader.onload = function(e) {
                  $('#img-previwer').attr('src', e.target.result);
               }
               
               reader.readAsDataURL(input.files[0]);
            }
         }
    });
    </script>
    <?php
   if($this->session->flashdata('success')){
   echo ' <script> M.toast({html: "'.$this->session->flashdata('success').'",  classes: "green"}) </script>';
   }elseif($this->session->flashdata('error')){
      echo ' <script> M.toast({html: "'.$this->session->flashdata('error').'",  classes: "red"}) </script>';
   }

?>
</body>

</html>