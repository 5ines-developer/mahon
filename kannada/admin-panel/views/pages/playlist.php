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
                                <p class="h5-para black-text m0">Playlist</p>
                            </div>
                            <div class="col 12 m6 right-align">
                            <?php  if ($this->session->userdata('Mht_type') ==='1') { ?>
                                <a href="#modal1"
                                    class="waves-effect waves-light btn brand white-text hoverable modal-trigger"><i
                                        class="fas fa-plus left"></i> Add new</a>
                                        <?php  }?>
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
                                                    <th width="250px">Title</th>
                                                    <th>Added Date</th>
                                                    <th>Action</th>
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
            <a href="#!" class="close-btn modal-close waves-effect waves-red"><i class="fas fa-times"></i></a>
            <form method="post" id="playlist_form">
                <div class="row">
                    <h6 class="m-title col s12">Add Playlist</h6>
                    <div class="col l8 m8">

                        <div class="card card-25 ">
                            <div class="row m0">

                                <div class="input-field col s12 l4 m4">
                                    <input type="text" id="title" name="title" placeholder="" class="validate" 
                                        required value="">
                                    <label for="title" class="active">Title <span class="red-text">*</span></label>
                                    <input type="hidden" id="ctid" name="ctid">
                                </div>
                                <div class="input-field col s12 l4 m4">
                                    <input type="text" id="pl_slug" name="pl_slug" placeholder="" class="validate" 
                                        required value="">
                                    <label for="pl_slug" class="active">Slug <span class="red-text">*</span></label>
                                 
                                </div>


                                <div class="col s12 l8 m8 ">
                                    <p><b>Select image</b></p>
                                </div>
                                <div class="gallery-add-container col s12 l8 m8" dataid='1'>
                                    <div class="row">
                                        <div class="col s12 m5 push-m7">
                                            <div class="preview center">
                                                <div class="valign-wrapper">
                                                    <img dataid="1"
                                                        src="<?php echo base_url() ?>assets/images/placeholder.png"
                                                        alt="" class="responsive-img" id="img-previwer">
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
                                                        <input type="file" id="img" dataid="1" name="img"
                                                            accept="image/*" required>
                                                    </div>
                                                    <div class="file-path-wrapper ">
                                                        <input class="file-path validate" name="filepath" type="hidden"
                                                            placeholder="Upload  files" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="input-field">
                                                <textarea id="textarea1" name="imagetitle"
                                                    class="materialize-textarea"></textarea>
                                                <label for="textarea1">Image Title</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                            </div>
                            <div class="modal-footer">
                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-small"
                                    type="submit">Submit
                                    <i class="fas fa-paper-plane right"></i>
                                </button>
                                <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small">Close <i
                                        class="fas fa-times right"></i></a>
                            </div>
                        </div>

                    </div>
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
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>

    <script>
    $(document).ready(function() {
        // materializedcss js initialize

        $('select').formSelect();
        $('.modal').modal({
            onOpenStart: reset
        });

        function reset() {
            $('#playlist_form')[0].reset();
            $('#ctid').val('')
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
                'url': "<?php echo base_url(). 'playlist/getData' ?>",
                'type': 'POST'
            },
            'columnDefs': [{
                "targets": [0, 3],
                "orderable": false,
            }]
        })

        // delete data from database
        $(document).on('click', '.delete-btn', function() {
            var id = $(this).attr('id');
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>playlist/delete",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#' + id).closest('tr').remove();
                        M.toast({
                            html: data,
                            classes: 'green'
                        });
                    }
                });
            } else {
                return false;
            }
        })

        //  update data
        $(document).on('click', '.update-btn', function() {
            var imgUrl = '<?php echo $this->config->item('web_url');?>';
            var id = $(this).attr('id');
            $('.m-title').text('Edit Playlist ');
            $('#img').prop('required',false);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>playlist/single_data",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    
                    $('#title').val(response.title);
                    $('#ctid').val(response.id);
                    $('#pl_slug').val(response.pl_slug);
                    $('#textarea1').val(response.alt);
                    $('#img-previwer').attr('src', imgUrl+response.playlist_img);
                    
                }
            });
        });

        // submit update playlist_form
        $(document).on('submit', '#playlist_form', function(event) {
            event.preventDefault();
            var title = $('#title').val();
            var id = $('#ctid').val();
            if (id != '') {
                var closestd = $('#' + id).closest('tr').find('td');
                $.ajax({
                    url: "<?php echo base_url() . 'playlist/update_playlist'?>",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#playlist_form')[0].reset();
                        M.toast({
                            html: data,
                            classes: 'green'
                        });
                        var instances = M.Modal.init(document.querySelectorAll('.modal'));
                        instances[0].close();
                        $('body').css("overflow-y", "auto");
                        //  closestd.eq(1).text(name)
                        dataTable.ajax.reload();
                    }
                });
            } else {

                $.ajax({
                    url: "<?php echo base_url() . 'playlist/add'?>",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        $('#playlist_form')[0].reset();
                        $('#img-previwer').attr('src', '');
                        M.toast({
                            html: data,
                            classes: 'green'
                        });
                        var instances = M.Modal.init(document.querySelectorAll('.modal'));
                        instances[0].close();
                        $('body').css("overflow-y", "auto");
                        dataTable.ajax.reload();
                    },
                    error: function(res) {
                        // console.log(res)
                        $('#playlist_form')[0].reset();
                        M.toast({
                            html: res.responseText,
                            classes: 'red'
                        });
                        var instances = M.Modal.init(document.querySelectorAll('.modal'));
                        instances[0].close();
                        $('body').css("overflow-y", "auto");
                    }

                });
            }
        });




 

        $(document).on('change', 'input[type=file]', function(e) {
            var id = $(this).attr('dataid');
            readURL(this, id);

        });

        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('img[dataid=' + id + ']').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    });
    </script>

</body>

</html>