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
            <li class="bt <?php if($this->uri->segment(1) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url() ?>">ಮುಖಪುಟ</a></li>

                    <?php 
                    $vd = '';
                    $kn='';
                    if(!empty(categories())){
                        foreach(categories() as $key => $value) { 
                            if($value->title == 'Video'){$vd = '1'; }
                            if($value->menu == 1 && $value->title != 'Video'){
                                $rurl = $this->urls->urlFormat(base_url().$value->title)
                    ?>
                        <li class="bt <?php if($this->uri->segment(1) == $this->urls->urlFormat($value->title)){ echo 'active'; }else{ echo 'no'; } ?>"><a class="world" href="<?php echo $rurl ?>"><?php echo $value->kannada ?></a> </li>
                    <?php }

                    if($value->title == 'Video'){ 
                        $kn = $value->kannada;
                        $rurl1 = $this->urls->urlFormat(base_url().$value->title);
                    } } }
                    if (!empty($vd)) { ?>
                        <li><a class="world" href="<?php echo $rurl1 ?>"><?php echo $kn ?></a> </li>
                    <?php } ?> 
        </ul>
        <div class="slider-mm">
            <div class="nav-content nav-menu" id="myDIV">
                <ul class="tabs-transparent tabs-menu">
                    <li class="bt <?php if($this->uri->segment(1) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url() ?>">ಮುಖಪುಟ</a></li>

                    <?php 
                    $vd = '';
                    $kn='';
                    if(!empty(categories())){
                        foreach(categories() as $key => $value) { 
                            if($value->title == 'Video'){$vd = '1'; }
                            if($value->menu == 1 && $value->title != 'Video'){
                                $rurl = $this->urls->urlFormat(base_url().$value->title)
                    ?>
                        <li class="bt <?php if($this->uri->segment(1) == $this->urls->urlFormat($value->title)){ echo 'active'; }else{ echo 'no'; } ?>"><a class="world" href="<?php echo $rurl ?>"><?php echo $value->kannada ?></a> </li>
                    <?php }

                    if($value->title == 'Video'){ 
                        $kn = $value->kannada;
                        $rurl1 = $this->urls->urlFormat(base_url().$value->title);
                    } } }
                    if (!empty($vd)) { ?>
                        <li><a class="world" href="<?php echo $rurl1 ?>"><?php echo $kn ?></a> </li>
                    <?php } ?> 
                </ul>
            </div>
        </div>
    </header>