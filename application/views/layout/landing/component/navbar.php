<header style="padding-bottom:100px;">
    <div  class="navbar navbar-expand-lg navbar-light bg-light fixed-top  " style=" box-shadow: 0px 8px 10px -1px rgba(0,0,0,0.42);">
        <div class="container d-flex justify-content-between animated slideInDown" style="position:relative;">
            <a href="<?php echo site_url();?>landing" class="navbar-brand d-flex align-items-center">
                <img src="<?php echo site_url();?>/assets/landing/img/icon.png" style="margin-right:20px;" width="50" height="50" alt="" loading="lazy">
                <strong class="title" style="font-size:15px;"> PT Pupuk Kujang Cikampek</strong>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav" style="margin-top:10px;">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url();?>landing#landing-home"> Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url();?>landing#about_us"> Tentang Kami</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url();?>jobs"> Job Vacancies</a>
                    </li>
                    <?php if(@$settings->faq == "1"): ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo site_url();?>landing#faq"> FAQ</a>
                        </li>
                    <?php endif;?>
                    <?php if(@$settings->news == "1"): ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo site_url();?>news"> News</a>
                        </li>
                    <?php endif;?>
                    <li class="nav-item navbar-mobile">
                         <a href="<?php echo site_url();?>auth" class="btn btn-sm  btn-outline-success my-2 my-sm-0" >  <i class="fa fa-user" ></i> Sign in</a>
                    </li>
                </ul>
                <div class="navbar-right">
                    <?php if(check_session('user')){ ?>
                    <div class="dropdown">
                        <button class="btn   btn-outline-success my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa fa-user" ></i> <?php $name = explode(" ", current_ses('name'));$name = $name[0].' '.@$name[1]; echo $name ;?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"  style="font-size:13px;" href="<?php echo site_url('account');?>">Perbarui Data Diri</a>
                            <a class="dropdown-item" style="font-size:13px;" href="<?php echo site_url('account/change_password');?>">Ubah Password </a>
                            <a class="dropdown-item"  style="font-size:13px;" href="<?php echo site_url('auth/logout');?>">Logout</a>
                        </div>
                    </div>
                    <?php }else{ ?>
                        <a href="<?php echo site_url();?>auth" class="btn btn-sm  btn-outline-success my-2 my-sm-0" >  <i class="fa fa-user" ></i> Sign in</a>
                        <a href="<?php echo site_url();?>register" class="btn  btn-sm btn-outline-success my-2 my-sm-0" > <i class="fa fa-user-plus" ></i> Sign Up</a>
                    <?php } ?>
                </div>
                
            </div>
        </div>
    </div>
</header>