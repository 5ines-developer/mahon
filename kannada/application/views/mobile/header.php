<header id="myHeader">
        <nav class="nav-mahonathi">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo black-text"><img src="<?php echo base_url()?>assets1/img/logo.png" class="img-logo" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
                <div class="searchbar">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate input-search">
                    <i class="fas fa-search btn-search bs"></i>
                    <i class="fas fa-times btn-search-close bc"></i>
                </div>
                <!-- .searchbar -->
            </div>
        </nav>
        </nav>
        <ul class="sidenav nn-list" id="mobile-demo">
            <li><a href="">Today Fetured</a></li>
            <li><a href="">Short Movies</a></li>
            <li><a href="">Popular</a></li>
            <li><a href="<?php echo base_url('video')?>">Videos</a></li>
        </ul>
        <div class="slider-mm">
            <div class="nav-content nav-menu" id="myDIV">
                <ul class="tabs-transparent tabs-menu">
                    <li class="bt <?php if($this->uri->segment(1) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url() ?>">ಮುಖಪುಟ</a></li>

                    <?php 
                    if(!empty(categories())){
                        foreach(categories() as $key => $value) { 
                            if($value->menu == 1){
                                $cat = $this->urls->checkCat($value->title);
                                $rurl = $this->urls->urlFormat(base_url().$cat)
                    ?>
                        <li class="bt <?php if($this->uri->segment(1) == $this->urls->urlFormat($value->title)){ echo 'active'; }else{ echo 'no'; } ?>"><a class="world" href="<?php echo $rurl ?>"><?php echo $value->title ?></a> </li>
                    <?php } } }?>
                </ul>
            </div>
        </div>
    </header>