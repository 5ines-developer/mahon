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
                                <p class="h5-para black-text m0">Playlist Posts</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <button class="waves-effect waves-light btn brand white-text hoverable modal-trigger" onclick="history.back()"><i class="fas fa-backward left"></i>Back</button>
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
                                                  
                                                   <th width="350px">Title</th>
                                                   <th width="150px">Category</th>
                                                   <th width="150px">Playlist</th>
                                                   <th width="150px">Tags</th>
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
                                    
                                   
                                    <div class="clearfix"></div>

                                  

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
                                         
                    </div>
                </div>
                <br>
                <div class="modal-footer mt10">
                <input type="hidden" name="btnType">
                <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" name="submit" type="submit" value="post">Post <i class="fas fa-paper-plane right"></i></button>
                <button class="btn waves-effect waves-light blue darken-4 hoverable btn-small" name="submit" type="submit" value="preview">Preview Article <i class="fas fa-eye right"></i></button>
               
            
            <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small btn">Close <i class="fas fa-times right"></i></a> 
                </div>
            </form>
        
        </div>
      
                             


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
                'order': [ 3, "asc" ],
                'ajax': {
                    'url': "<?php echo base_url(). 'playlist/getPlaylistData/'.$playlist_id ?>",
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

 