<main role="main" id="landing-home">
    <section class="jumbotron text-center "  style="position:relative;">
		<div class="container jumbotron-content" style="z-index:999;">
			<h1 class="jumbotron-heading animated slideInUp text-dark"><b>Rekrutmen Pupuk Kujang Cikampek</b></h1>
			<p class="lead text-white animated slideInUp">Selamat datang di situs resmi rekrutmen karyawan kontrak <br/> PT Pupuk Kujang Cikampek</p>
			<p>
			<a href="<?php echo site_url();?>jobs" class="btn btn-success my-2 animated fadeInUp">See available job(s)</a>
			<a href="<?php echo site_url();?>register" class="btn btn-secondary my-2 animated fadeInUp">Create your account</a>
			</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="left:0px;bottom:-10px;position:absolute;z-index:99;width:100%" class="">
            <path fill="#ffffff" fill-opacity="1" d="M0,160L40,144C80,128,160,96,240,122.7C320,149,400,235,480,266.7C560,299,640,277,720,250.7C800,224,880,192,960,181.3C1040,171,1120,181,1200,176C1280,171,1360,149,1400,138.7L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </section>
   
    <section class="" id="about_us">
		<div class="container">
            <h3 class="heading text-center">Tentang Kami</h3>
            <div class="row" style="margin-top:30px;">
                <div class="col-sm-6 text-center" style="min-height:300px;display: inline-block;">
                    <img src="<?php echo site_url();?>/images/512-icon.png" class="" style="margin-right:20px;display: inline-block;" width="120" height="120" alt="" loading="lazy">
                    <img src="<?php echo site_url();?>/images/pi-logo.png" class="" style="margin-right:20px;display: inline-block;" width="180" height="100" alt="" loading="lazy"> <br/><br/>
                    <p class="lead">
                        <b> PT Pupuk Kujang Cikampek </b>
                        <br>  <?php echo @$settings->about_us;?>
                    </p>
                </div>
                <div class="col-sm-6">
                    <iframe style="width:100%;height:100%;" src="https://www.youtube.com/embed/<?php echo @$settings->youtube_code;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
			
		</div>
    </section>

    <?php if(@$settings->news == "1"): ?>
    <?php if($check_news > 0): ?>
    <section class="" id="news" style="margin-bottom:-30px; margin-top:60px;">
		<div class="container">
            <h3 class="heading text-center">Informasi Terbaru</h3>
            <div class="row" style="margin-top:30px;">
                <div class="col-sm-12" style="min-height:300px;">
                    <div id="accordion">
                         <?php 
                            foreach ($news as $row) {
                            $content = strlen(@$row->content) < 100 ? $row->content : @word_limiter(@$row->content, 10).'...'; 
                            echo '
                                <div class="col-sm-4" style="margin-bottom:20px;">
                                    <div class="card animated fadeIn " style="box-shadow: -2px 10px 42px -20px rgba(0,0,0,0.75);">
                                        <div class="card-body">
                                            <h5 class="card-title "  style="font-size:20px;">'.$row->title.' 
                                                <br/>
                                                <small style="font-size:13px;">
                                                    <i class="fa fa-user"></i> Ditulis oleh '.$row->created_by.' | <i class="fa fa-calendar"></i> '.@tgl_indo(@$row->date).'  
                                                </small>
                                            </h5>
                                            
                                            <p class="card-text" style="font-size:15px;">
                                                '.$content.'
                                            </p>
                                            <a href="'.site_url("/news/".$row->slug).'" class="btn btn-success btn-sm">Read more...</a>
                                        </div>
                                    </div>
                                </div>
                            ';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-sm-12 text-center" style="margin-top:-30px;">
                    <a href="<?php echo site_url('news');?>" class="btn btn-success"> Lihat berita selengkapnya </a>
                </div>
            </div>
		</div>
    </section>
    <?php endif;?>
    <?php endif;?>

    <?php if(@$settings->faq == "1"): ?>
    <section class="" id="faq" style="margin-bottom:-30px;">
		<div class="container">
            <h3 class="heading text-left">FAQ</h3>
            <div class="row" style="margin-top:30px;">
                <div class="col-sm-12" style="min-height:300px;">
                    <p class="lead text-left">
                        <b> General Info </b>
                    </p>
                    <div id="accordion">
                        <?php
                         $i=1;
                            foreach ($faq as $row) {
                                echo '
                                    <div class="card" style="margin-bottom:3px;">
                                        <div class="card-header">
                                            <a class="card-link text-success" data-toggle="collapse" href="#collapse'.$i.'">
                                            '.$row->faq_question.'
                                            </a>
                                        </div>
                                        <div id="collapse'.$i.'" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                            '.$row->faq_answer.'
                                            </div>
                                        </div>
                                    </div>
                                ';
                                $i++;
                            }
                        ?>
                    </div>
                </div>
            </div>
		</div>
    </section>
    <?php endif;?>
</main>