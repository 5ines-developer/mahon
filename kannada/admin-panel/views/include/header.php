<div class="navbar-fixed">
      <nav class="white">
         <div class="nav-wrapper container-wrap">
            <a href="<?php echo base_url() ?>" class="brand-logo">
            <img src="<?php echo base_url()?>assets/img/logo.png"  class="responsive-img" alt="logo">
            </a>
            <ul>
               <li style="position: relative; left: 481px;"><center><span class="am-kn-text">kannada - Admin Panel</span></center>
               </li> 
            </ul>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="fas fa-bars black-text"></i>
            </a>
            <ul class="right hide-on-med-and-down">
               <!-- <li><i class="far fa-flag font-col dropdown-trigger hide-ref2" data-target='dropdown4'></i><i class="fas fa-circle yellow-text point"></i></li> -->
               <!-- <ul id='dropdown4' class='dropdown-content'>
                  <li ><a href="#!">One</a></li>
                  <li><a href="#!">Two</a></li>
               </ul> -->
               <!-- <li>
                  <i class="far fa-bell font-col dropdown-trigger hide-ref" data-target='dropdown3'></i><i class="fas fa-circle red-text point1"></i>
               </li> -->
               <ul id='dropdown3' class='dropdown-content'>
                  <li><a href="#!" class="black-text">test</a></li>
               </ul>
               <li class="dropdown-trigger hide-ref1" data-target='dropdown2'>
                  <img src="<?php echo base_url()?>assets/img/user.png" class="responsive-img droup-img "  alt="">
                  <i class="fas fa-caret-down font-col1" ></i>
               </li>
               <!-- Dropdown Structure -->
               <ul id='dropdown2' class='dropdown-content'>
                  <li ><a href="<?php echo  base_url() ?>profile">Profile </a></li>
                  <li ><a href="<?php echo  base_url() ?>change-password">Change Password</a></li>
                  <li><a href="<?php echo base_url() ?>logout">Logout</a></li>
               </ul>
            </ul>
         </div>
      </nav>
   </div>

