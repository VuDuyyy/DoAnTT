<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!doctype html>
<html lang="en-gb" class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <title>My Travel - Thừa Thiên Huế</title>
  <meta name="description" content="Traveller">
  <meta name="author" content="WebThemez">

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!--  <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/da-slider.css" />
  <!-- Owl Carousel Assets -->
  <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css" />
  <!-- Font Awesome -->
  <!--animate-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
  <link href="font/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
 <?php include('includes/header.php'); ?>
 <!--/.header-->
 <div id="#top"></div>
 <section id="home">
  <div class="banner-container">
         <img src="images/vd.jpg" width="900" height="800" alt="" />
    <div class="container banner-content">
      <div id="da-slider" class="da-slider">
        <div class="da-slide">
          <h2>Travel Plans</h2>
          <p>Get your plans right away.. enjoy!!!</p>
          <a href="#" class="da-link">Read more</a>
          <div class="da-img"></div>
        </div>
        <div class="da-slide">
          <h2>Amazing Tours</h2>
          <p>Travel you remember for life long!!</p>
          <a href="#" class="da-link">Read more</a>
          <div class="da-img"></div>
        </div>
        <div class="da-slide">
          <h2>Best Travel Travel</h2>
          <p>Get best deals at our place</p>
          <a href="#" class="da-link">Read more</a>
          <div class="da-img"></div>
        </div> 
      </div>
    </div>
  </div>
</section>
<section id="introText">

  <div class="container">

    <div class="text-center adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown; margin-top: -500px"">
   <font size ="+3" >   <h1> <b>  <i>  <font color="black">  Chào Mừng Bạn Đến Với Thừa Thiên Huế <br> Hãy Cùng Nhau Khám Phá Vùng Đất Tuyệt Vời Này  </font>  </i> </b> </h1> </font>
   
              
         <li> <h1>   <a href="dia_diem.php"> </a>  </h1> </li>    
              
            


      <p> </p>
    </div>
  </div>
</section>
<!--About-->
<section id="aboutUs" class="secPad">
  <div class="container">

    <div class="heading text-center adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <!-- Heading -->
      <h2>THÔNG TIN</h2>
      <p>Huế là vùng đất có lịch sử văn hóa lâu đời, có nhiều địa điểm du lịch Huế hấp dẫn, nhiều danh lam thắng cảnh, di tích lịch sử đẹp và ấn tượng, vùng đất cố đô chính là điểm đến lý tưởng cho các tín đồ thích du lịch khám phá.</p>
    </div>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://static1.cafeland.vn/cafelandnew/hinh-anh/2021/10/20/158/huecautrangtien.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Thừa Thiên Huế là một trong 5 tỉnh, thành phố thuộc Vùng kinh tế trọng điểm miền Trung, có diện tích hơn 5.000km2, dân số gần 1,2 triệu người. Tỉnh có thành phố Huế - Cố đô của Việt Nam, là đô thị loại I, thành phố di sản văn hóa thế giới, thành phố Festival và theo quy hoạch là 1 trong 5 đô thị cấp quốc gia, khu vực và quốc tế; là trung tâm văn hóa, du lịch; trung tâm y tế chuyên sâu; trung tâm đào tạo đa ngành, đa lĩnh vực của miền Trung và cả nước. Thừa Thiên Huế còn là nơi hội tụ đầy đủ các tiềm năng, thế mạnh để phát triển nhanh hơn trong thời kỳ công nghiệp hóa, hiện đại hóa; là một cực tăng trưởng của Vùng kinh tế trọng điểm miền Trung và cả nước, là trọng điểm về quốc phòng, an ninh của quốc gia. </p> 
      </div>
    </div>
  </div>   
</section>


<!--Package-->
<section id="packages" class="secPad">
  <div class="container">
    <div class="heading text-center">
      <!-- Heading -->
      <h2>Các Địa Điểm</h2>
      <p>Thừa Thiên Huế có rất nhiều địa điểm đẹp. Có khoản hơn 20 địa điểm du lịch đẹp say đấm lòng người</p>
    </div>
    <div class="">
      <h3>Danh Sách Địa Điểm Hot</h3>

      <?php $sql = "SELECT * from tbltourpackages order by rand() ";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $cnt=1;
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        { 
          ?>


          <div class="rom-btm">

            <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
              <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
            </div>
            <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
              <h4>Tên Địa Điểm: <?php echo htmlentities($result->PackageName);?></h4>
             <p><b>            Đặc Điểm Nổi Bật:</b> <?php echo htmlentities($result->PackageType);?></p>              <p><b>Địa chỉ  :</b> <?php echo htmlentities($result->PackageLocation);?></p>
              <p><b>              </b> <?php echo htmlentities($result->PackageFetures);?></p>
            </div>
            <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
              <h5>     Giá Tiền:   <?php echo htmlentities($result->PackagePrice);?> đ</h5>
              <a href="package_details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Chi Tiết</a>
            </div>
           

            <div class="clearfix"></div>
          

          </div>
          <?php 
        }
      } ?>
    </div>
    <div class="clearfix"></div>   
  </div>
</section>
<!--Quote-->
<section id="quote" class="bg-parlex">
  <div class="parlex-back">
    <div class="container secPad text-center">
      <h2>"Nếu bạn muốn đi xa và nhanh hơn, hãy đi thật nhẹ nhàng. Bỏ hết tất cả ganh tị, ghen ghét, cố chấp, ích kỷ và sợ hãi."
      </h2><h3></h3>
    </div>
    <!--/.container-->
  </div>
</section>
<!--Portfolio-->
<section id="portfolio" class="page-section section appear clearfix secPad">
  <div class="container">
    <div class="heading text-center">
      <!-- Heading -->
      <h2>HÌNH ẢNH</h2>
      <p>Nét đẹp của thành phố Thừa Thiên Huế qua những bức ảnh đẹp đến say đấm lòng người!</p>
    </div>
    <div class="row">            
      <div class="col-md-12">
        <div class="row">
          <div class="portfolio-items clearfix papper " id="3" >
            <article class="col-sm-4  isotopeItem webdesign">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Medias/Nam2017/T10/Khamphahue_Dam-Chuon_venice-cua-xu-Hue-1.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Medias/Nam2017/T10/Khamphahue_Dam-Chuon_venice-cua-xu-Hue-1.jpg" class="fancybox">                                                
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/vanhoa/disan/vatthe/2017/phu-de/kph_phu-de-xu-hue_phu-tuylyvuong-2.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/vanhoa/disan/vatthe/2017/phu-de/kph_phu-de-xu-hue_phu-tuylyvuong-2.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>


            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/teddexter/kph-anh-an-tuong-ve-hue-nam-1966-cua-ted-dexter.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/teddexter/kph-anh-an-tuong-ve-hue-nam-1966-cua-ted-dexter.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem print">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/huehuyenao/kph-huehuyenao.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/huehuyenao/kph-huehuyenao.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/anhdepvn/kph_anh-dep-3-mien-dat-nuoc-viet-nam_khuc%20song%20que%20-%20nguyen%20van%20dung%20hue.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/anhdepvn/kph_anh-dep-3-mien-dat-nuoc-viet-nam_khuc%20song%20que%20-%20nguyen%20van%20dung%20hue.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem webdesign">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/vanhoa/cunghaivan%20(12).jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/vanhoa/cunghaivan%20(12).jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem print">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/635032748383727500.thumb.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/635032748383727500.thumb.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/teddexter/kph-anh-an-tuong-ve-hue-nam-1966-cua-ted-dexter.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Media/T7/upload/vhdl/dulich/anhdephue/teddexter/kph-anh-an-tuong-ve-hue-nam-1966-cua-ted-dexter.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem print">
              <div class="portfolio-item">
                <img src="https://khamphahue.com.vn/Portals/0/Medias/Nam2017/T10/KPH_QuanTheDiTichCoDoHue_DaiNoiVeDem_Dai-Noi-Hue_du-lich-Hue.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="https://khamphahue.com.vn/Portals/0/Medias/Nam2017/T10/KPH_QuanTheDiTichCoDoHue_DaiNoiVeDem_Dai-Noi-Hue_du-lich-Hue.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Contact -->
<section id="contactUs" class="page-section secPad">
  <div class="container">
    <div class="row">
      <div class="heading text-center">
        <!-- Heading -->
        <h2>LIÊN HỆ</h2>
        <p>Được phục cho bạn là niềm vinh hạnh của chúng tôi. Nếu có bất kì vấn đề thắc mắt hay những khiến nại cần được giải quyết xin hãy lòng liên hệ với chúng tôi, Chúng tôi giải quyết cho bạn ngay tức thì. Xin cảm ơn!</p>
      </div>
    </div>
    <div class="row mrgn30">
      <div class="col-sm-12 col-md-8">
        <!--LƯU Ý: Cập nhật Id email của bạn trong tệp "contact_me.php" để nhận email từ biểu mẫu liên hệ của bạn-->
        <form name="sentMessage" id="contactForm"  validate>
         
          <div class="control-group">
            <div class="controls">
              <input type="text" class="form-control" 
              placeholder="Full Name" id="name" required
              data-validation-required-message="Please enter your name" />
              <p class="help-block"></p>
            </div>
          </div> 	
          <div class="control-group" style="margin-bottom: 8px;">
            <div class="controls">
              <input type="email" class="form-control" placeholder="Email" 
              id="email" required
              data-validation-required-message="Please enter your email" />
            </div>
          </div> 	

          <div class="control-group" style="margin-bottom: 8px;">
            <div class="controls">
              <textarea rows="10" cols="100" class="form-control" 
              placeholder="Message" id="message" required
              data-validation-required-message="Please enter your message" minlength="5" 
              data-validation-minlength-message="Min 5 characters" 
              maxlength="999" style="resize:none"></textarea>
            </div>
          </div> 		 
          <div id="success"> </div> <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary pull-right">Gửi</button><br />
          <h4>Address:</h4>
        <address>
          CÔNG TY KĨ THUẬT TIÊN PHONG<br>
          Số 10, Phường Phú Thứ<br>
          
          Quận Cái Răng, Cần Thơ<br>
        </address>
        <h4>Phone: 0916416409</h4>
        <address>
          <br>
        </address>
        </form>
      </div> 

      <!-- signup -->
      <?php include('includes/signup.php');?>     
      <!-- //signu -->
      <!-- signin -->
      <?php include('includes/signin.php');?>     
      <!-- //signin -->
      <div class="col-sm-12 col-md-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d489997.3836673101!2d107.32370814178361!3d16.3686351916486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31419c87726490f7%3A0xab1c0fcaf7cb84b5!2zVGjhu6thIFRoacOqbiBIdeG6vywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1654784703678!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <h4>   </h4>
        <address>
         <br>
          
           <br>
        </address>
        <h4>    </h4>
        <address>
         <br>
        </address>
      </div>
    </div>
  </div>
  <!--/.container-->
</section>
<?php include('includes/footer.php'); ?>

<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>
<script src="js/modernizr-latest.js"></script>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.isotope.min.js" type="text/javascript"></script>
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script>
<script src="js/jquery.cslider.js" type="text/javascript"></script>
<script src="contact/contact_me.js"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>
