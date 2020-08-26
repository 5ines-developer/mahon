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
                        <div class="card main-bar">
                            <div class="card-content">
                                <form action="<?php echo base_url('subadmin/edit') ?>"  method="post"  id="author_form" enctype="multipart/form-data">
                                    <div class="row m0">
                                        <h6 class="m-title col s12">Update Subadmin</h6><br>
                                        <div class="input-field col s12 m6">
                                            <input type="text" id="name" name="name" class="validate" required value="<?php echo (!empty($result->name))?$result->name:'---'; ?>">
                                            <label for="name">Name <span class="red-text">*</span></label>
                                            <input type="hidden" id="id" name="id" value="<?php echo (!empty($result->id))?$result->id:'---'; ?>">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="email" id="email" name="email" class="validate"  required value="<?php echo (!empty($result->email))?$result->email:'---'; ?>">
                                            <label for="email">Email <span class="red-text">*</span></label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="number" id="phone" name="phone" class="validate"  required maxlength="10" value="<?php echo (!empty($result->phone))?$result->phone:'---'; ?>">
                                            <label for="phone">Phone <span class="red-text">*</span></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit <i class="fas fa-paper-plane right"></i> </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
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
        <?php $this->load->view('include/message'); ?>
    </script>
</body>
</html>
