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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
    .dash-list a .list-dashboard {
        transition: 0.5s
    }
    .select-wrapper .caret {
        position: absolute;
        right: 0;
        top: -22px;
    }

    .dash-list a:hover .list-dashboard {
        transform: scale(1.1);
        background: #f3f3f3 !important
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
                                <p class="h5-para black-text m0">Posts</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="#modal1"
                                    class="waves-effect waves-light btn brand white-text hoverable modal-trigger"><i
                                        class="fas fa-plus left"></i> Add new</a>
                            </div>
                        </div>
                        <div class="shorting-table">
                            <div>
                                <div class="col l12 m12 s12">
                                    <div class="">
                                        <table id="dynamic" class="striped">
                                            <thead>
                                                <tr>
                                                   <th width="170px">Action</th>
                                                   <th width="100px">Sl NO.</th>
                                                   <th width="350px">Title</th>
                                                   <th width="150px">Category</th>
                                                   <th width="120px">Date</th>
                                                   <th width="120px">Posted By</th>
                                                   <th width="120px">Uploaded Date</th>
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

    <div id="modal1" class="modal big-modal-3 modal-fixed">
        <div class="modal-content">

            <form method="post" id="newsPost" enctype="multipart/form-data">
                <div class="row m0">
                   <a href="#!" class="close-btn modal-close waves-effect waves-red"><i class="fas fa-times"></i></a>
                   <h5 class="m-title col s12">New Posts</h5>
                    <div class="col l8">
                        <div class="row m0">

                            <div class="input-field col s12 m6">
                                <input type="text" id="title" name="title" placeholder="." required class="validate"
                                    value="">
                                <label for="title">Title <span class="red-text">*</span></label>
                                <input type="hidden" id="ctid" name="ctid">
                            </div>

                            <div class="input-field col s12 m6">
                                <select required name="category" id="category">
                                    <option value="" disabled >Choose Category</option>
                                    <?php foreach ($category as $key => $value) {
                                       echo '<option  value="'.$value->id.'">'.$value->title.'</option>';
                                    } ?>
                                </select>
                                <label for="category">Category</label>
                            </div>



                            <div class="input-field col s12 m6">

                                <select required id="posted_by" name="posted_by">
                                    <option value="" disabled >Choose Author</option>
                                    <?php foreach ($author as $key => $value) {
                                       echo '<option  value="'.$value->id.'">'.$value->name.'</option>';
                                    } ?>
                                    <option value="0" > none </option>
                                </select>
                                <label for="posted_by">Posted By</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input type="text" id="date" name="date" placeholder=""
                                    class="validate datepicker" value="">
                                <label for="date">Date</label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="input-field col s12 m6">
                                <input type="text" id="slug" name="slug" placeholder="" class="validate"
                                    value="">
                                <label for="slug">Slug<span class="red-text"> *</span></label>
                            </div>

                            <div class="file-field input-field col m6">
                                <div class="btn">
                                    <span>Featured Image</span>
                                    <input type="file" id="img"  name="img">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="filepath" type="text"
                                        placeholder="Upload  files">
                                </div>
                            </div>

                            <div class="input-field col s12">
                                <div class="">
                                    <label for="">Add Tags</label>
                                    <input name="tags" id="tags" class="tagsfield">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col m4">
                       <img src="" id="img-previwer" class="responsive-img">
                    </div>

                    <div class="col s12">
                        <div class="divider"></div>
                        <div class="col s12">
                            <h6 class="bold">Content</h6>
                        </div>
                        <div class="row m0">
                            <div class="col s12 m12">
                                <textarea name="description" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                     
    
                    <div class="col s12">
                        <div class="divider"></div>
                        <h6 class="col s12 bold">SEO</h6>
                        <div class="row m0">
                              <div class="col s12 m8">

                                <div class="row m0">
                                    <h6 class="seo-title">Page detail</h6>

                                    <div class="input-field col s12 l6">
                                        <input type="text" id="ptitle" name="ptitle" class="validate" value="">
                                        <label for="ptitle" class="active">Title </label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <textarea id="pkeywords" name="pkeywords" class="materialize-textarea" ></textarea>
                                        <label for="pkeywords" class="active">Keywords</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea id="pdescription" name="pdescription" class="materialize-textarea" ></textarea>
                                        <label for="pdescription" class="active">Meta Description</label>
                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="row m0">
                                    <h6 class="seo-title">Facebook OG</h6>

                                    <div class="input-field col s12 l6">
                                        <input type="text" id="fid" name="fid" class="validate" value="">
                                        <label for="fid" class="active">Id</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="text" id="ftitle" name="ftitle" class="validate" value="">
                                        <label for="ftitle" class="active">Title</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="text" id="fsite_name" name="fsite_name" class="validate" value="">
                                        <label for="fsite_name" class="active">Site Name</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="url" id="furl" name="furl" class="validate" value="">
                                        <label for="furl" class="active">Url</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="url" id="fimg_url" name="fimg_url" class="validate" value="">
                                        <label for="fimg_url" class="active">image url</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea id="fdescription" name="fdescription" class="materialize-textarea"></textarea>
                                        <label for="fdescription" class="active">Description</label>
                                    </div>
                                </div>

                                <div class="row m0">
                                    <h6 class="seo-title">Twitter</h6>

                                    <div class="input-field col s12 l6">
                                        <input type="text" id="tcard" name="tcard" class="validate" value="">
                                        <label for="tcard" class="active">Card</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="text" id="ttitle" name="ttitle" class="validate" value="">
                                        <label for="ttitle" class="active">Title</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="text" id="tsite_name" name="tsite_name" class="validate" value="">
                                        <label for="tsite_name" class="active">Site Name</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="url" id="turl" name="turl" class="validate" value="">
                                        <label for="turl" class="active">Url</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="url" id="timg_url" name="timg_url" class="validate" value="">
                                        <label for="timg_url" class="active">image url</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea id="tdescription" name="tdescription" class="materialize-textarea"></textarea>
                                        <label for="tdescription" class="active">Description</label>
                                    </div>
                                </div>
                                
                              </div>
                        </div>


                    </div>


                </div>

        </div>



        <div class="modal-footer">
            <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit <i class="fas fa-paper-plane right"></i> </button>
            <button type="reset" class="hide" value="Reset" id="reset-btn">Reset</button>
            <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small">Close <i class="fas fa-times right"></i></a> </div>
        </form>


    </div>

    </div>



    <!-- end footer -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>

    <!-- ck editor -->
    <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>

    <!-- data table -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/tag.js"></script>


    <script>
    $(document).ready(function() {
        // materializedcss js initialize
       
        
        
        $('select').formSelect();
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

        // ck editor
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

       // Reset the form  
        function clearform() {
            $('#newsPost')[0].reset();
            $('input[name=tags]').importTags('');
            $('#img-previwer').attr('src', '');
            $('#ctid').val('');
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
        // ajax request
        var dataTable = $('#dynamic').DataTable({
            'processing': true,
            'serverSide': true,
            'dom': 'Bfrtip',
            'buttons': [
                'copy', 'csv', 'pdf'
            ],
            'order': [],
            'ajax': {
                'url': "<?php echo base_url(). 'post/getData' ?>",
                'type': 'POST'
            },
            'columnDefs': [{
                "targets": [0],
                "orderable": false,
            }]
        })

        // delete data from database
        $(document).on('click', '.delete-btn', function() {
            var id = $(this).attr('id');
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>post/delete",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#' + id).closest('tr').remove();
                        M.toast({ html: data, classes: 'green' });
                    }
                });
            } else {
                return false;
            }
        })


        //  update data
        $(document).on('click', '.update-btn', function() {

            var id = $(this).attr('id');
            
            $('.m-title').text('Edit Post');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>post/single_data",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(res) {
                    

                    $('input[name=ctid]').val(res.id);
                    $('input[name=title]').val(res.title);
                    // $('input[name=posted_by]').val(res.posted_by);
                    $('input[name=date]').val(res.date);
                    $('input[name=slug]').val(res.slug);
                    $('input[name=tags]').importTags(res.tags);
                    $('#img-previwer').attr('src', '<?php echo $this->config->item('web_url') ?>'+res.image);
                    $('.file-path').val(res.image);
                    CKEDITOR.instances['description'].setData(res.content);
                    var textcat = $('select[name=category]').find('option');
                    
                    $.each(textcat, function (i, vl) { 
                        
                        if(res.category == vl.innerText){
                            $(this).attr("selected", "selected");
                        }
                    });

                    var postedby = $('select[name=posted_by]').find('option');
                    
                    $.each(postedby, function (i, vl) { 
                        if(res.posted_by == vl.innerText){
                            $(this).attr("selected", "selected");
                        }
                    });
                    
                   
                }
            });
        });

        // submit update category_form
        $(document).on('submit', '#newsPost', function(event) {
            event.preventDefault();
               
                $.ajax({
                    url: "<?php echo base_url() . 'post/add_post'?>",
                    method: 'POST',
                    dataType: "json",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,

                    success: function(data) {
                       if(data.status == true){
                        $('#newsPost')[0].reset();
                        var instances = M.Modal.init(document.querySelectorAll('.modal'));
                        instances[0].close();
                        M.toast({ html: data.msg, classes: 'green' });
                        $('body').css("overflow-y", "auto");
                        $('#img-previwer').attr('src', '');
                        dataTable.ajax.reload();
                       }else{
                        M.toast({
                            html: data.msg,
                            classes: 'red'
                        });
                       }
                        
                    }
                });
        });

    });
    </script>


</body>

</html>