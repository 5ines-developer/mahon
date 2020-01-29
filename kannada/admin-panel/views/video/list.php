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
                                <div class="row m0">
                                    <div class="col 12 m6">
                                        <p class="h5-para black-text m0">Video Articles</p>
                                    </div>
                                    <div class="col 12 m6 right-align">
                                        <a href="#modal1" class="waves-effect waves-light btn brand white-text hoverable modal-trigger" id="addArticle"><i class="fas fa-plus left"></i> Add new</a>
                                    </div>

                                    <div class="col s12 ml-0 p0">
                                        <ul class="small-nav">
                                            <li ><a class="<?php echo(!empty($this->uri->segment(2))?'' : 'active') ?>" href="<?php echo base_url('video-article') ?>">Short Movies</a></li>
                                            <li><a  class="<?php echo(empty($this->uri->segment(2))?'' : 'active') ?>" href="<?php echo base_url('video-article/featured-videos') ?>">Featured Videos</a></li>
                                        </ul>
                                        
                                        
                                    </div>
                                </div>
                                <div class="divider"></div>
                           </div>
                            <div class="card-body">
                                <ul>
                                    <?php 
                                    if(!empty($video)):
                                        
                                    foreach ($video as $key => $value) {  ?>
                                            <li class="tumb-item">
                                                <div class="tumb-img">
                                                    <img src="<?php echo $value->tumb ?>" alt="">
                                                </div>
                                                <div class="tumb-action">
                                                    <a href=""><i class="fas fa-pencil-alt"></i></a>
                                                    <a class="delete-btn" href="<?php echo base_url('video-article/delete/').$value->id ?>"><i class="far fa-trash-alt"></i></a>
                                                    <a target="_blank" href="<?php echo strtolower($this->config->item('web_url').'videos/'.$value->category.'/'.$value->slug) ?>"><i class="fas fa-play"></i></a>
                                                </div>
                                                <div class="tumb-caption">
                                                    <p class="truncate"><?php echo $value->title ?></p>
                                                </div>
                                            </li>
                                    <?php } else: ?>
                                       <div class="center">
                                        <img src="<?php echo base_url() ?>assets/img/notfound.png" style="max-height:350px" alt="" class="responsive-img">
                                        <h4 class="m0">No Result Found!</h4>
                                       </div>
                                    <?php endif ?>
                                </ul>
                                 
                            </div>
                        </div>
                    </div>
                    

               </div>
            </div>
         </div>
      </section>

       <!-- Modal Structure -->
       <div id="modal1" class="modal big-modal-3 modal-fixed">
            <form  action="<?php echo base_url() ?>video-article-insert" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                <a href="#!" class="close-btn modal-close waves-effect waves-red"><i class="fas fa-times"></i></a>

                    <div class="modal-container row">
                    <h5 class="m-title col s12" style="margin-top: 0;">Post Video Article</h5>
                        <div class="col s12 m8 ">
                            <!-- basic detail -->
                                <div class="basic-detail card card-25">
                                    <div class="input-field col s12">
                                        <p class="mt-0">Select Video From</p>
                                        <ul class="select-radio-list m0">
                                            <li>
                                                <label>
                                                    <input class="with-gap" value="youtube" name="social" type="radio"  checked/>
                                                    <span>Youtube</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label>
                                                    <input class="with-gap" value="vimeo" name="social" type="radio"  />
                                                    <span>Vimeo</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input class="with-gap tmb" name="social"  value="facebook" type="radio"  />
                                                    <span>Facebook</span>
                                                </label>
                                            </li>

                                            <!-- <li>
                                                <label>
                                                    <input class="with-gap tmb" name="social" value="twitter" type="radio"  />
                                                    <span>Twitter</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label>
                                                    <input class="with-gap tmb" name="social" value="instagram" type="radio"  />
                                                    <span>Instagram</span>
                                                </label>
                                            </li> -->

                                           
                                        </ul>

                                    </div>

                                    <div class="input-field col s12 m0">
                                        <p>Select Video Type</p>
                                        <ul class="select-radio-list">
                                            <li>
                                                <label>
                                                    <input class="with-gap" value="short" name="vtype" type="radio"  checked/>
                                                    <span>Short Movie</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label>
                                                    <input class="with-gap" value="featured" name="vtype" type="radio"  />
                                                    <span>Featured Video </span>
                                                </label>
                                            </li>
                                           
                                        </ul>

                                    </div>

                                     <div class="input-field col s12 m12">
                                        <input type="url" id="url" name="url" placeholder="." required class="validate" >
                                        <label for="title">URL <span class="red-text">*</span></label>
                                    </div>

                                        <div class="is-image clearafter col s12">
                                            <div class="file-field draggable center col s12 m6">
                                                <div class="drag-place center">
                                                    <i class="material-icons small"> cloud_upload </i>
                                                    <p>Drag &amp; Drop Image here </p>
                                                    <p>Or</p>
                                                </div>
                                                <div class="btn-img">
                                                    <span>Browse Image</span>
                                                    <input type="file" id="img" name="img"  accept="image/*">
                                                </div>
                                                <div class="file-path-wrapper ">
                                                    <input class="file-path validate" name="filepath" type="hidden" placeholder="Upload  files">
                                                </div>
                                            </div>
                                            <div class="col s12 s6">
                                            
                                            </div>
                                        </div>

                                       <br />


                                    <div class="input-field col s12 m6">
                                        <input type="text" id="title" name="title" placeholder="." required class="validate"
                                            value="">
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
                                            <option value="0" > none </option>
                                            <?php foreach ($author as $key => $value) {
                                            echo '<option  value="'.$value->id.'">'.$value->name.'</option>';
                                            } ?>
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
                                            <input type="text" id="ptitle" name="ptitle" placeholder="title" class="validate" value="" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)">
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

                                        
                                        <!-- <div class="input-box">
                                            <input type="text" placeholder="Site name" id="fsite_name" name="fsite_name">
                                        </div>

                                        <div class="input-box">
                                            <input type="url" placeholder="Site Url" id="furl" name="furl">
                                        </div>

                                        <div class="input-box">
                                            <input type="url" placeholder="Image Url" id="fimg_url" name="fimg_url">
                                        </div> -->

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

                                        <!-- <div class="input-box">
                                        <input type="text" id="tsite_name" placeholder="Site Name" name="tsite_name" class="validate" value="">
                                        </div>

                                        <div class="input-box">
                                            <input type="url" id="turl" name="turl" placeholder="Site Url" class="validate" value="">
                                        </div>

                                        <div class="input-box">
                                            <input type="url" id="timg_url" name="timg_url" placeholder="Image url" class="validate" value="">
                                        </div> -->

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
                <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" name="submit" type="submit" value="post">Post <i class="fas fa-paper-plane right"></i></button>
            <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small btn">Close <i class="fas fa-times right"></i></a> 
                </div>
            </form>
        
        </div>

      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
      <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
      <script src="<?php echo base_url() ?>assets/js/tag.js"></script>
    <script>
        <?php $this->load->view('include/message.php'); ?>;
        $(document).ready( function () {
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
            var editor = CKEDITOR.replace( 'description');
            
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
            
            
            // Reset the form  
            function clearform() {
                $('#addArticle').removeAttr('data-draft');
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

            $('input[name=social]').change(function(){
                if($(this).hasClass('tmb')){
                    $('.is-image').fadeIn(500);
                    $('#img').attr('required', 'required')
                }else{
                    $('.is-image').fadeOut(500);
                    $('#img').removeAttr('required');
                }
            });

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

            // dete conformaton
            $('.delete-btn').click(function (e) { 
                if (confirm("Are you sure?")) {
                    return true
                }
                return false;
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
