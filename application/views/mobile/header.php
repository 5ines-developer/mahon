<header id="myHeader">
        <nav class="nav-mahonathi">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo black-text"><img src="<?php echo base_url()?>assets1/img/logo.png" class="img-logo" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
                <div class="searchbar">

                    <form class="" id="search-form" role="search" method="post">
                    <input type="text" required="" id="search" name="search" placeholder="Search here" autofocus onfocus="convertToSlug(this.value)" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" onchange="convertToSlug(this.value)" value="<?php echo (!empty($mtitle)? $mtitle : '') ?>" class="validate input-search">
                    <!-- <button type="submit" id="search-submit" class="btn-search bs"><i class="fa fa-search"></i></button> -->
                     <button type="submit" value="" id="search-submit" class="btn-search bs btn-rem"><i class="fas fa-search"></i></button>
                     <i class="fas fa-times btn-search-close bc"></i>
                    </form>
                   
                </div>
                <!-- .searchbar -->
            </div>
        </nav>
        <ul class="sidenav nn-list" id="mobile-demo">
            <li class="bt"><a href="<?php echo base_url('kannada') ?>">ಕನ್ನಡ</a></li>
            <li class="bt <?php if($this->uri->segment(1) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url() ?>">Home</a></li>

                    <?php
                                $vd = ''; 
                                $kn='';
                                if(!empty(categories())){
                                    foreach(categories() as $key => $value) { 
                                        if($value->title == 'Video'){$vd = '1'; }
                                        if($value->menu == 1 && $value->title != 'Video'){
                                            $rurl = $this->urls->urlFormat(base_url().$value->title)
                                ?>
                                    <li><a class="world" href="<?php echo $rurl ?>"><?php echo $value->title ?></a> </li>
                                <?php } 
                                if($value->title == 'Video'){ 
                                    $rurl1 = $this->urls->urlFormat(base_url().$value->title);
                                    $kn = $value->title;
                                } 
                            } }
                            if (!empty($vd)) { ?>
                                <li><a class="world" href="<?php echo $rurl1 ?>"><?php echo $kn ?></a> </li>
                            <?php } ?> 
        </ul>
        <div class="slider-mm">
            <div class="nav-content nav-menu" id="myDIV">
                <ul class="tabs-transparent tabs-menu">
                    <li class="bt <?php if($this->uri->segment(1) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url() ?>">Home</a></li>

                    <?php
                                $vd = ''; 
                                $kn='';
                                if(!empty(categories())){
                                    foreach(categories() as $key => $value) { 
                                        if($value->title == 'Video'){$vd = '1'; }
                                        if($value->menu == 1 && $value->title != 'Video'){
                                            $rurl = $this->urls->urlFormat(base_url().$value->title)
                                ?>
                                    <li class="bt <?php if($this->uri->segment(1) == $this->urls->urlFormat($value->title)){ echo 'active'; }else{ echo 'no'; } ?>"><a class="world" href="<?php echo $rurl ?>"><?php echo $value->title ?></a> </li>
                                <?php } 
                                if($value->title == 'Video'){ 
                                    $rurl1 = $this->urls->urlFormat(base_url().$value->title);
                                    $kn = $value->title;
                                } 
                            } }
                            if (!empty($vd)) { ?>
                                <li><a class="world" href="<?php echo $rurl1 ?>"><?php echo $kn ?></a> </li>
                            <?php } ?> 
                </ul>
            </div>
        </div>
    </header>
    <script>
            function convertToSlug(str) {
                str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
                
                str = str.replace(/^\s+|\s+$/gm,'');
                
                str = str.replace(/\s+/g, '-'); 
                document.getElementById("search-form").action  = '<?php echo base_url("topic/") ?>'+str;
                //return str;
            }
        </script>