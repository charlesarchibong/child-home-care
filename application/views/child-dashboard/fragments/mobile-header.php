 <!-- HEADER MOBILE-->
 <header class="header-mobile d-block d-lg-none">
     <div class="header-mobile__bar">
         <div class="container-fluid">
             <div class="header-mobile-inner">
                 <a class="logo" href="index.html">
                     <img class="logo-image" src="<?= base_url('assets/dashboard/images/icon/logo.png'); ?>" alt="Logo" />
                 </a>
                 <button class="hamburger hamburger--slider" type="button">
                     <span class="hamburger-box">
                         <span class="hamburger-inner"></span>
                     </span>
                 </button>
             </div>
         </div>
     </div>
     <nav class="navbar-mobile">
         <div class="container-fluid">
             <ul class="navbar-mobile__list list-unstyled">
                 <li class="<?= $this->uri->segment(2) == 'home' ? 'active' : '' ?>">
                     <a href="<?= base_url(); ?>">
                         <i class="fas fa-home"></i>Home
                     </a>
                 </li>
                 <li class="<?= $this->uri->segment(2) == 'record' ? 'active' : '' ?>">
                     <a href="#">
                         <i class="fas fa-eye"></i>View Your Record
                     </a>
                 </li>
             </ul>
         </div>
     </nav>
 </header>
 <!-- END HEADER MOBILE-->