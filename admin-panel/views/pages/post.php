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

    <link rel="stylesheet" href="<?php echo $this->config->item('web_url')?>kannada/admin-panel/assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
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
                                <a href="<?php echo base_url() ?>post/add" class="waves-effect waves-light btn brand white-text hoverable modal-trigger" id="addArticle"><i class="fas fa-plus left"></i> Add new</a>
                            </div>
                        </div>

                        <div class="row m0 mb10 boder-bottom c-tabs">
                            <div class="col l4 m4 s12 pl0">
                                <a href="<?php echo base_url() ?>post">
                                    <p class="black-text f-left m0"><i class="fas green-text fa-check-circle left " style="font-size:1.5rem"></i> Active Articles</p>
                                </a>
                            </div>
                            <div class="col l4 m4 s12">
                                <a href="<?php echo base_url() ?>post/scheduled-articles">
                                    <p class="black-text r-left m0"><i class="fas red-text fa-clock left " style="font-size:1.5rem"></i> Scheduled Articles</p>
                                </a>
                            </div>
                            <div class="col l4 m4 s12">
                                <a href="<?php echo base_url() ?>post/draft">
                                    <p class="black-text r-left m0"><i class="fas orange-text fa-save left " style="font-size:1.5rem"></i> Draft</p>
                                </a>
                            </div>
                        </div>
                        
                        <div class="shorting-table">
                            <div>
                                <div class="col l12 m12 s12">
                                    .
                                    <div class="">
                                        <table id="dynamic" class="striped">
                                            <thead>
                                                <tr>
                                                   <th width="190px">Action</th>
                                                   <!-- <th width="100px">Sl NO.</th> -->
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

   

    </div>
    <div class="preloader-box">
        <div>
            <div class="lds-dual-ring"></div>
        </div>
    </div>      

     
      
      <!-- Modal Structure -->
        <div id="modal1" class="modal big-modal-3 modal-fixed">
            <form  id="newsPost">
                <div class="modal-content">
                <a href="#!" class="close-btn modal-close waves-effect waves-red"><i class="fas fa-times"></i></a>

                    <div class="modal-container row">
                    <h5 class="m-title col s12" style="margin-top: 0;">Post Article</h5>
                        <div class="col s12 m8 ">
                                <div class="basic-detail card card-25">
                                    <div class="input-field col s12 m6">
                                        <input type="text" id="title" name="title" placeholder="." required class="validate"
                                            value="" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" autocomplete="off">
                                        <label for="title">Title <span class="red-text">*</span></label>
                                        <input type="hidden" id="ctid" name="ctid">
                                    </div>

                                    <div class="input-field col s12 m6">
                                        <input type="text" id="slug" name="slug" placeholder="" class="validate"
                                            value="">
                                        <label for="slug">Slug<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="clearfix"></div>
                                    
                                    <!-- <div class="input-field col s12 m6">

                                        <select required id="posted_by" name="posted_by">
                                            <option value="" disabled >Choose Author</option>
                                            <?php foreach ($author as $key => $value) {
                                                if($value->name == 'mahonnathi'){
                                                    echo '<option  value="'.$value->id.'">'.$value->name.'</option>';
                                                }
                                            }?>
                                            <?php foreach ($author as $key => $value) {
                                                if($value->name != 'mahonnathi'){
                                                    echo '<option  value="'.$value->id.'">'.$value->name.'</option>';
                                                }
                                            } ?>
                                            <option value="0" > none </option>
                                        </select>
                                        <label for="posted_by">Author</label>
                                    </div> -->

                                    <!-- <div class="input-field col s12 m6">
                                        <input type="text" id="date" name="date" placeholder=""
                                            class="validate datepicker" value="<?php echo date('D m Y') ?>">
                                        <label for="date">Date</label>
                                    </div>
 -->
                                    <div class="clearfix"></div>

                                    <!-- <div class="input-field col s12">
                                        <div class="">
                                            <label for="">Add Tags</label>
                                            <input name="tags" id="tags" class="tagsfield">
                                        </div>
                                    </div> -->

                                        <div class="col s12 p0">
                                            <div class="col s12">
                                                <h6 class="bold">Content</h6>
                                            </div>
                                            <div class="row m0">
                                                <div class="col s12 m12">
                                                    <textarea name="description" id="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <!-- <div class="col s12 m4 ">
                            <ul class="collapsible  popout">
                                <li class="imageli">
                                    <div class="collapsible-header"><i class="material-icons">add_photo_alternate</i>Featured Image</div>
                                    <div class="collapsible-body  draggable-list">
                                        <img src="" id="img-previwer" class="responsive-img">
                                        <div class="file-field draggable center">
                                            <div class="drag-place center">
                                                <i class="material-icons small"> cloud_upload </i>
                                                <p>Drag & Drop Image here</p>
                                                <p>Or</p>
                                            </div>
                                            <div class="btn-img">
                                                <span>Browse Image</span>
                                                <input type="file" id="img"  name="img" accept="image/*" >
                                            </div>
                                            <div class="file-path-wrapper ">
                                                <input class="file-path validate" name="filepath" type="hidden"
                                                    placeholder="Upload  files">
                                            </div>
                                        </div>      
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header"><i class="material-icons">category</i>Category</div>
                                    <div class="collapsible-body">
                                        <div class="colaps-box">
                                            <?php foreach ($category as $key => $value) {
                                                $checked = ($key == 0)? 'checked': '';
                                                echo '
                                                    <p>
                                                        <label>
                                                            <input data_val="'.$value->title.'"  value="'.$value->id.'" class="with-gap" class="main-categoris" name="category" type="radio" '.$checked.' />
                                                            <span>'.$value->title.'</span>
                                                        </label>
                                                    </p>
                                                    ';
                                            } ?>
                                        </div>
                                            

                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header"><i class="material-icons">format_indent_increase</i>Sub Category</div>
                                    <div class="collapsible-body">
                                        <div class="sub-cat">
                                            <p>Select main category</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header"><i class="material-icons">layers</i>Related Category</div>
                                    <div class="collapsible-body">
                                        <div class="colaps-box">
                                            <?php foreach ($category as $key => $value) { ?>
                                                <div class="related-main">
                                                        <p class="related-main-title">
                                                            <span><i class="material-icons">add</i></span>
                                                            <span><?php echo $value->title?></span>
                                                        </p>
                                                        <div class="realted-sub">
                                                        <?php foreach ($value->sub as $keys => $values) { ?>
                                                            <p>
                                                                <input id="rc<?php echo  $values->id ?>" name="related[]" data-value="<?php echo $value->id ?>" value="<?php echo  $values->id ?>" type="checkbox" class="filled-in related"  />
                                                                <label for="rc<?php echo  $values->id ?>"> <?php echo  $values->title ?> </label>
                                                            </p>
                                                        <?php }
                                                            if(empty($value->sub)){
                                                                echo '<p>Not have any Subcategory </p>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header"><i class="material-icons">schedule</i>Schedule Article Post</div>
                                    <div class="collapsible-body">
                                        <div class="input-box col s6"> 
                                            <input type="text" name="time" value="<?php echo date('h:i A') ?>" placeholder="select Time" class="timepicker">
                                        </div>
                                        <div class="input-box col s6"> 
                                            <input type="text" class="datepicker"  value="<?php echo date('M d, Y') ?>"  placeholder="Select date" name="scheduledate"> 
                                        </div>
                                        
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>Meta Detail</div>
                                    <div class="collapsible-body">
                                        <div class="input-box">
                                            <input type="text" id="ptitle" name="ptitle" placeholder="title" class="validate" value="">
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Keywords"  id="pkeywords" name="pkeywords">
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Meat Description" id="pdescription" name="pdescription">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="fab fa-facebook-f"></i>Facebook Meta Detail</div>
                                    <div class="collapsible-body">
                                        <div class="input-box">
                                            <input type="text" placeholder="ID" id="fid" name="fid">
                                        </div>

                                        <div class="input-box">
                                            <input type="text" placeholder="Title" id="ftitle" name="ftitle">
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Meat Description" id="fdescription" name="fdescription">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="fab fa-twitter"></i>Twitter Meta Detail</div>
                                    <div class="collapsible-body">
                                        <div class="input-box">
                                        <input type="text" id="ttitle" name="ttitle" class="validate" placeholder="Title" value="">
                                        </div>
                                        <div class="input-box">
                                            <textarea id="tdescription" placeholder="Description" name="tdescription" class="materialize-textarea"></textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> -->                     
                    </div>
                </div>
                <br>
                <div class="modal-footer mt10">
                <input type="hidden" name="btnType">
                <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" name="submit" type="submit" value="post">Post <i class="fas fa-paper-plane right"></i></button>
                <button class="btn waves-effect waves-light blue darken-4 hoverable btn-small" name="submit" type="submit" value="preview">Preview Article <i class="fas fa-eye right"></i></button>
                <!-- <button class="btn waves-effect waves-light orange accent-3 darken-4 hoverable btn-small" name="submit" type="submit" value="draft">Save to Draft <i class="fas fa-save right"></i></button> -->
            
            <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small btn">Close <i class="fas fa-times right"></i></a> 
                </div>
            </form>
        
        </div>
      
      <!-- 
        $('.modal').modal();
      -->                          


    <!-- end footer -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>

    <!-- ck editor -->
   <script src="<?php echo $this->config->item('web_url')?>kannada/admin-panel/assets/ckeditor/ckeditor.js"></script>

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
            $('#tags').tagsInput({ 'defaultText':'add a Tags', });
            $('.datepicker').datepicker();
            $('.timepicker').timepicker();

             $(document).on('click','#cke_81,#cke_80',function(){

                if ($("body").hasClass("cke_dialog_open")) {
                    $('#modal1').modal('close');
                }else{
                    $('#modal1').modal('open');
                }
            });

            $(document).on('click','.cke_dialog_ui_button_cancel,.cke_dialog_close_button',function(){

                if ($("body").hasClass("cke_dialog_open")) {
                    $('#modal1').modal('close');
                }else{
                    $('#modal1').modal('open');
                }
            });
            
            // related category rotate
            $('.related-main-title').click(function (e) { 
                e.preventDefault();
                var title = $(this);
                title.next('.realted-sub').slideToggle(500, function(){
                    if(title.next('.realted-sub').css('display') == 'block')
                    {
                        title.find('i').css({ 'transform': 'rotate(45deg)' })
                    }
                    if(title.next('.realted-sub').css('display') == 'none'){
                        title.find('i').css({ 'transform': 'rotate(0deg)' })
                    }
                });
                
            });

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

        });

        
    </script>


</body>

</html>

 