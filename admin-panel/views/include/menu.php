<?php   $this->ci =& get_instance(); ?>
<div class="col l3 m12 s12">

    <div class="side-bar white z-depth-1">
        <ul class="li-list ">
            <li class="<?php echo $this->uri->segment(1) == 'dashboard'?'active':''?>"> <a href="<?php echo base_url('dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a> </li>
            <li class="<?php echo $this->uri->segment(1) == 'post'?'active':''?>"> <a href="<?php echo base_url('post') ?>"><i class="far fa-newspaper li-icon"></i>Posts</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'banner'?'active':''?>"> <a href="<?php echo base_url('banner') ?>"><i class="far fa-images li-icon"></i>Banner</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'todays-featured'?'active':''?>"> <a href="<?php echo base_url('todays-featured') ?>"><i class="fas fa-newspaper li-icon"></i>Today's Featured</a></li>
            <li class="<?php echo $this->uri->segment(1) == 'breaking-news'?'active':''?>"> <a href="<?php echo base_url('breaking-news') ?>"><i class="fab fa-audible li-icon"></i>Breaking News</a></li>
            <li class="divider" tabindex="-1"></li>
            <li class="droup-link <?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a class="droup-link-item" data-target="#category-droup"><i class="fas fa-boxes li-icon"></i>Category</a>
                <ul class="droupmenu" id="category-droup">
                    <li class="<?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a href="<?php echo base_url('category') ?>">Main Category</a></li>
                    <li class="<?php echo $this->uri->segment(2) == 'sub-category'?'active':'' ?>"><a href="<?php echo base_url('category/sub-category') ?>">Sub Category</a></li>
                </ul>
            </li>
            <li class="<?php echo $this->uri->segment(1) == 'author'?'active':''?>"> <a href="<?php echo base_url('author') ?>"><i class="fas fa-user-tie li-icon"></i>Author</a></li>


        </ul>
    </div>
</div>