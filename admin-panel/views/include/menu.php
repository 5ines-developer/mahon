<?php   $this->ci =& get_instance(); ?>
<div class="col l3 m12 s12">

    <div class="side-bar white z-depth-1">
        <ul class="li-list ">
            <li class="<?php echo $this->uri->segment(1) == 'dashboard'?'active':''?>"> <a href="<?php echo base_url('dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a> </li>

            <li class="divider" tabindex="-1"></li>

            <li class="<?php echo $this->uri->segment(1) == 'post'?'active':''?>"> <a href="<?php echo base_url('post') ?>"><i class="far fa-newspaper li-icon"></i>Articles Post</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'breaking-news'?'active':''?>"> <a href="<?php echo base_url('breaking-news') ?>"><i class="fab fa-audible li-icon"></i>Breaking News</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'banner'?'active':''?>"> <a href="<?php echo base_url('banner') ?>"><i class="fas fa-image li-icon"></i>Banner</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'todays-featured'?'active':''?>"> <a href="<?php echo base_url('todays-featured') ?>"><i class="fas fa-newspaper li-icon"></i>Today's Featured</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'trending'?'active':''?>"> <a href="<?php echo base_url('trending') ?>"><i class="fas fa-fire li-icon"></i>Trending Article</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'popular-article'?'active':''?>"> <a href="<?php echo base_url('popular-article') ?>"><i class="fas fa-bolt li-icon"></i>Popular Article</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'temple-visit'?'active':''?>"> <a href="<?php echo base_url('temple-visit') ?>"><i class="fas fa-gopuram li-icon"></i>Temple To Visit</a></li>

            <li class="divider" tabindex="-1"></li>
                <li class="<?php echo $this->uri->segment(1) == 'video-article'?'active':''?>"> <a href="<?php echo base_url('video-article') ?>"><i class="fas fa-video li-icon"></i>Video Article</a></li>
                <li class="<?php echo $this->uri->segment(1) == 'photos'?'active':''?>"> <a href="<?php echo base_url('photos') ?>"><i class="far fa-images li-icon"></i>Photo Article</a></li>
                <li class="<?php echo $this->uri->segment(1) == 'events'?'active':''?>"> <a href="<?php echo base_url('events') ?>"><i class="far fa-calendar-alt li-icon"></i>Happening's</a></li>
                <li class="<?php echo $this->uri->segment(1) == 'twitter'?'active':''?>"> <a href="<?php echo base_url('twitter') ?>"><i class="fab fa-twitter li-icon"></i>Twitter Post</a></li>
            <li class="divider" tabindex="-1"></li>

            <li class="droup-link <?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a class="droup-link-item" data-target="#category-droup"><i class="fas fa-boxes li-icon"></i>Category</a>
                <ul class="droupmenu" id="category-droup">
                    <li class="<?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a href="<?php echo base_url('category') ?>">Main Category</a></li>
                    <li class="<?php echo $this->uri->segment(2) == 'sub-category'?'active':'' ?>"><a href="<?php echo base_url('category/sub-category') ?>">Sub Category</a></li>
                </ul>
            </li>
            <li class="<?php echo $this->uri->segment(1) == 'author'?'active':''?>"> <a href="<?php echo base_url('author') ?>"><i class="fas fa-user-tie li-icon"></i>Author</a></li>

            <li class="divider" tabindex="-1"></li>

            <li class="droup-link <?php echo $this->uri->segment(1) == 'trash'?'active':'' ?>"><a class="droup-link-item" data-target="#trash-dropdown"><i class="fas fa-trash li-icon"></i>Trash</a>
                <ul class="droupmenu" id="trash-dropdown">
                    <li class="<?php echo $this->uri->segment(2) == 'trash/category'?'active':'' ?>"><a href="<?php echo base_url('trash/category') ?>">Category</a></li>
                    <li class="<?php echo $this->uri->segment(2) == 'trash/article'?'active':'' ?>"><a href="<?php echo base_url('trash/article') ?>">Articles</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>