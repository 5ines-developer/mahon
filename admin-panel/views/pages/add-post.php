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
                
                
                <div class="col m12 s12 l12">
                    
                    <div class="card main-bar">
                    <div class="card-content">


                        <form  id="newsPost">
                            <div class="modal-content">
                                <a href="#!" class="close-btn modal-close waves-effect waves-red"><i class="fas fa-times"></i></a>
                                <div class="modal-container row">
                                    <h5 class="m-title col s12" style="margin-top: 0;">Post Article</h5>
                                    <div class="col s12 m8 ">
                                        <!-- basic detail -->
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
                                            
                                            <div class="input-field col s12 m6">
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
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="date" name="date" placeholder=""
                                                class="validate datepicker" value="<?php echo date('D m Y') ?>">
                                                <label for="date">Date</label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="input-field col s12">
                                                <div class="">
                                                    <label for="">Add Tags</label>
                                                    <input name="tags" id="tags" class="tagsfield">
                                                </div>
                                            </div>
                                            <div class="col s12 p0">
                                                <!-- <div class="divider"></div> -->
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
                                        <!-- Endbasic detail -->
                                    </div>
                                    <div class="col s12 m4 ">
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
                                                    <div class="collapsible-header"><i
                                                            class="material-icons">playlist_play</i>Playlist</div>
                                                    <div class="collapsible-body">
                                                        <div class="colaps-box">
                                                        <p>
                                                        <label>
                                                        <input  value=" "   class="with-gap" class="main-categoris" name="playlist_id" type="radio" checked />
                                                            <span>None</span>
                                                        </label>
                                                    </p>
                                                            <?php foreach ($playlist as $key => $value) {
                                               
                                                echo '
                                                    <p>
                                                        <label>
                                                            <input data_val="'.$value->title.'"  value="'.$value->id.'" class="with-gap" class="main-categoris" name="playlist_id" type="radio"  />
                                                            <span>'.$value->title.'</span>
                                                        </label>
                                                    </p>
                                                    ';
                                            } ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <li>
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
                                                    <!-- <div class="input-box">
                                                        <input type="text" id="tcard" name="tcard" class="validate" value="" placeholder="Card">
                                                    </div> -->
                                                    <div class="input-box">
                                                        <input type="text" id="ttitle" name="ttitle" class="validate" placeholder="Title" value="">
                                                    </div>
                                                   
                                                    <div class="input-box">
                                                        <textarea id="tdescription" placeholder="Description" name="tdescription" class="materialize-textarea"></textarea>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer mt10">
                                <input type="hidden" name="btnType">
                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" name="submit" type="submit" value="post">Post <i class="fas fa-paper-plane right"></i></button>
                                <button class="btn waves-effect waves-light blue darken-4 hoverable btn-small" name="submit" type="submit" value="preview">Preview Article <i class="fas fa-eye right"></i></button>
                                <a href="<?php echo base_url('post') ?>" class="modal-close waves-effect waves-red hoverable red btn-small btn">Close <i class="fas fa-times right"></i></a>
                            </div>
                        </form>
                        
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
            $('.modal').modal({onCloseEnd : clearform});
            $('#tags').tagsInput({ 'defaultText':'add a Tags', });
            $('.datepicker').datepicker();
            $('.timepicker').timepicker();

            // ck editor
            var editor = CKEDITOR.replace( 'description',{
                extraPlugins: 'wysiwygarea',
                extraPlugins: 'embed',
                extraPlugins: 'youtube',
                enterMode : CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P,  
                filebrowserBrowseUrl: '<?php echo $this->config->item('web_url')?>kannada/admin-panel/assets/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '<?php echo $this->config->item('web_url')?>kannada/admin-panel/assets/ckfinder/ckfinder.html?type=Images',
                filebrowserUploadUrl: '<?php echo $this->config->item('web_url')?>kannada/admin-panel/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '<?php echo $this->config->item('web_url')?>kannada/admin-panel/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
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

            //  Image preview
            $('#img').change(function (e) { 
                readURL(this);
                $('.imageli').css('border', 'transparent');
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

           

            //  update data
            $(document).on('click', '.update-btn', function() {

                var id = $(this).attr('id');
                
                $('.m-title').text('Edit Post');
                $('button[value=post]').html('Update <i class="fas fa-paper-plane right"></i>');
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
                        $('input[name=date]').val(res.date);
                        $('input[name=slug]').val(res.slug);
                        $('input[name=tags]').importTags(res.tags);
                        $('#img-previwer').attr('src', '<?php echo $this->config->item('web_url') ?>'+res.image);
                        $('.file-path').val(res.image);

                        $('input[name=fdescription]').val(res.fbdes);
                        $('input[name=fid]').val(res.fbid);
                        // $('input[name=fimg_url]').val(res.fbimg);
                        // $('input[name=fsite_name]').val(res.fbsite);
                        $('input[name=ftitle]').val(res.fbtitle);
                        // $('input[name=furl]').val(res.fburl);

                        // $('input[name=tcard]').val(res.tw_card);
                        $('input[name=tdescription]').val(res.tw_descr);
                        M.textareaAutoResize($('input[name=tdescription]'));
                        // $('input[name=timg_url]').val(res.tw_img_url);
                        // $('input[name=tsite_name]').val(res.tw_site_name);
                        $('input[name=ttitle]').val(res.tw_title);
                        // $('input[name=turl]').val(res.tw_url);

                        $('input[name=pdescription]').val(res.page_descr);
                        $('input[name=pkeywords]').val(res.page_keyword);
                        $('input[name=ptitle]').val(res.page_title);
                        $('input[name=time]').val(res.time);
                        $('input[name=scheduledate]').val(res.scheduled);

                        CKEDITOR.instances['description'].setData(res.content);
                        
                        var textcat = $('input[name=category]');
                        $(textcat).removeAttr('checked');
                        $.each(textcat, function (i, vl) { 
                            if(res.category == vl.attributes.data_val.value){
                                $(vl).attr('checked', 'checked');
                                $(this).show(mainCategorySub);
                            }
                        });
                        console.log(res);
                        
                        setTimeout(() => {
                            var subcat = $('.nasubcategory[name=scategory]');
                            $.each(subcat, function (ids, vls) {
                                if(res.scategory == vls.value){
                                    $(vls).attr('checked', 'checked');
                                }
                            });
                        }, 1000);
                        


                        var postedby = $('select[name=posted_by]').find('option');
                        $.each(postedby, function (i, vl) { 
                            if(res.posted_by == vl.innerText){
                                $(this).attr("selected", "selected", );

                            }
                        });
                        
                    
                    }
                });
            });

            // submit update category_form
            $(document).on('click', 'button[name=submit]', function(event){
                $('input[name=btnType]').val($(this).val())
            });
            $(document).on('submit', '#newsPost', function(event) {
                event.preventDefault();
                                
                var validate = validationForm();
                if(validate == true){
                    
                    $('.preloader-box').addClass('active');
                    var form = $(this)[0];
                    var formData = new FormData(form);
                    formData.append('daraftid', $('#addArticle').attr('data-draft'));
                    $.ajax({
                        url: "<?php echo base_url() . 'post/add_post'?>",
                        method: 'POST',
                        dataType: "json",
                        data: formData,
                        contentType: false,
                        processData: false,

                        success: function(data) {
                        if(data.status == true){
                            // check if preview
                            if($('input[name=btnType]').val() == 'preview'){
                                $('input[name=ctid]').val(data.postid);
                                window.open('<?php echo $this->config->item('web_url') ?>preview/' + data.postid, '_blank');
                            }else{
                                $('#newsPost')[0].reset();
                                var instances = M.Modal.init(document.querySelectorAll('.modal'));
                                instances[0].close();
                                M.toast({ html: data.msg, classes: 'green' });
                                $('body').css("overflow-y", "auto");
                                $('#img-previwer').attr('src', '');
                                clearform(); 
                                window.location.href = "<?php echo base_url('post') ?>";
                            }
                        }else{
                            M.toast({
                                html: data.msg,
                                classes: 'red'
                            });
                        }
                        $('.preloader-box').removeClass('active');
                        }
                    });
                }
                  
            });

            function validationForm() { 
                var image = $('input[name=filepath]').val();
                if(image){
                    $('.imageli').css('border', 'transparent');
                    return true;
                }else{
                    $('.imageli').css('border', '1px solid red');
                    return false;
                }
            }

            // sub category
            function mainCategorySub() { 
                
                var category = $('input[name=category]:checked').val()
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>post/choose_sub_category",
                    data: {id: category},
                    dataType: "json",
                    success: function (response) {
                        var subCategory = $('.sub-cat');
                        subCategory.empty();
                        if(response.length == 0 || category == ''){
                            subCategory.append('<p>Not any have Subcategory</p>');
                        }else{
                            response.forEach(element => {
                                subCategory.append('<p> <label>  <input value="'+ element.id +'" class="with-gap nasubcategory" name="scategory" type="radio"> <span>'+element.title+'</span> </label> </p>');
                            });
                        }
                    }
                });
            }
            $('input[name=category]').change(mainCategorySub);
            $(document).ready(mainCategorySub);
           
            $(document).on('change', '.main-cat-select', function(event) {
                event.preventDefault();
                if ($(this).is(':checked')) { 
                    var main = $(this).val();
                    $('.related[data-value='+main+']').attr('checked', 'checked');
                }else{
                    var main = $(this).val();
                    $('.related[data-value='+main+']').removeAttr('checked');
                }
            });
            
            // auto draft   
            $('#addArticle').click(function() {
                var key = Math.ceil(Math.random() * 10000);
               $(this).attr('data-draft', key);
            });

            // test ionterval
            function saveToDraft() {
                $('input[name=ctid]').val();
                $('input[name=title]').val();
                $('input[name=date]').val();
                $('input[name=slug]').val();
                $('input[name=tags]').val();
                // $('#img-previwer').attr('src', '<?php echo $this->config->item('web_url') ?>'+res.image);
                $('.file-path').val();

                $('input[name=fdescription]').val();
                $('input[name=fid]').val();
                // $('input[name=fimg_url]').val();
                // $('input[name=fsite_name]').val();
                $('input[name=ftitle]').val();
                // $('input[name=furl]').val();

                // $('input[name=tcard]').val();
                $('input[name=tdescription]').val();
               
                // $('input[name=timg_url]').val();
                // $('input[name=tsite_name]').val();
                $('input[name=ttitle]').val();
                // $('input[name=turl]').val();

                $('input[name=pdescription]').val();
                $('input[name=pkeywords]').val();
                $('input[name=ptitle]').val();
                $('input[name=time]').val();
                $('input[name=scheduledate]').val();

            }

           
            // set interval
            setInterval(function() {
                // if($('.modal').hasClass('open') == true &&  $('#addArticle').attr('data-draft')){
                    var form = $("#newsPost")[0];
                    var formData = new FormData(form);
                    formData.append('daraftid', $('#addArticle').attr('data-draft'));
                    $.ajax({
                        url : "<?php echo base_url() ?>post/save_draft",
                        type: "POST",
                        data : formData,
                        processData: false,
                        contentType: false,
                    });
                // }
            }, 5000);

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

            editor.on( 'change', function( evt ) {
                var text =  $(evt.editor.getData()).text().trim();
                var setTo = ['pdescription', 'fdescription', 'tdescription'];
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


</body>

</html>

 