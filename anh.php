<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
	$pid=intval($_GET['pkgid']);
	$useremail=$_SESSION['login'];
	$fromdate=$_POST['fromdate'];
	$todate=$_POST['todate'];
	$comment=$_POST['comment'];
	$status=0;
	$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid',$pid,PDO::PARAM_STR);
	$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
	$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
	$query->bindParam(':todate',$todate,PDO::PARAM_STR);
	$query->bindParam(':comment',$comment,PDO::PARAM_STR);
	$query->bindParam(':status',$status,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		echo '<script>alert("Đã đặt thành công! . Cảm ơn bạn!")</script>';
	}
	else 
	{
		echo '<script>alert("Đã xảy ra lỗi. Vui lòng thử lại")</script>';
	}

}
?>
<!doctype html>
<html lang="vi" 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>My Travel - Chi Tiết Địa Điểm</title>
	<meta name="description" content="Traveller">
	<meta name="author" content="WebThemez">

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
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
	<header class="header">
		<?php if($_SESSION['login'])
		{?>
			<div class="top-header">
				<div class="container">
					<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
					
						<li class="prnt"><a href="profile.php">Thông Tin Của Tôi</a></li>
						<li class="prnt"><a href="change_password.php">Đổi Mật Khẩu</a></li>
						<li class="prnt"><a href="tour_history.php">Lịch Sử Đặt Tour</a></li>
					</ul>
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
						<li class="tol">Xin Chào :</li>        
						<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
						<li class="sigi"><a href="logout.php" >/ Đăng Xuất</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php 
		} else 
		{
			?>
			<div class="top-header">
				<div class="container">
					<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
						<li class="hm"><a href="admin/index.php">Admin Đăng Nhập</a></li>
					</ul>
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
 					<li class="tol">Email : nguyenvuduy@gmail.com</li>   
 					<li class="tol">Phone : 0949344976</li>        
 					<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >Đăng Ký</a></li> 
 					<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >&nbsp; Đăng Nhập</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php 
		}?>
		<div class="container">
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
					<a href="#" class="navbar-brand scroll-top logo"><b>Thừa Thiên Huế</b></a>
					<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!--/.navbar-header-->
				<div id="main-nav" class="collapse navbar-collapse adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
					<ul class="nav navbar-nav" id="mainNav">
						<li ><a href="index.php" class="scroll-link">Trang Chủ</a></li>
						<li><a href="index.php" class="scroll-link">Thông Tin </a></li>
						<li><a href="index.php" class="scroll-link">Địa Điểm</a></li>
						<li><a href="index.php" class="scroll-link">Hình Ảnh</a></li>
						<li><a href="index.php" class="scroll-link">Liên Hệ</a></li>
					</ul>
				</div>
				<!--/.navbar-collapse-->
			</nav>
			<!--/.navbar-->
		</div>
		<!--/.container-->
	</header>
	<!--/.header-->
	<div id="#top"></div>
	<section id="home">
		<div class="banner-container" style="height: 300px;">
			<!-- <img src="images/banner-bg.jpg" alt="banner" /> -->
			<div class="container banner-content">
				<div id="da-slider" class="da-slider">
					<div class="da-slide">
						<h2>Tour Packages</h2>
						<p>Get your plans right away.. enjoy!!!</p>
						<div class="da-img"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Contact -->
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
          <h3> <center> <b>Dưới đây là một số ảnh đẹp được chụp các khách du lịch:</b> </center></h3>&ensp;

         
          <img src="https://dulichkhampha24.com/wp-content/uploads/2020/02/vinh-lang-co-hue-c.jpg" height="650px" width="650px" alt=""> &nbsp;
          <h4> <center>Ảnh được chụp ở Vịnh Lăng Cô Huế </center> </h4>&emsp;

           <img src="https://statics.vinpearl.com/dia-diem-chup-anh-dep-o-hue-1_1633160533.jpg" height="100%" width="100%" alt=""> &nbsp;
          <h4> <center>Khám phá những điểm chụp ảnh đẹp ở Huế (Ảnh: Ngan Bella) </center> </h4>&emsp;
         <img src="https://statics.vinpearl.com/dia-diem-chup-anh-dep-o-hue-0_1633062870.jpg" height="100%" width="100%" alt=""> &nbsp;
          <h4> <center>Biển Thuận An xinh đẹp và yên bình (Ảnh: sưu tầm) </center> </h4>&emsp;


          <img src="https://statics.vinpearl.com/dia-diem-chup-anh-dep-o-hue-3_1633013641.jpg" height="100%" width="100%" alt=""> &nbsp;
          <h4> <center>Background siêu xịn tại Đại Nội Huế - địa điểm chụp ảnh đẹp ở thành phố Huế (Ảnh: sưu tầm) </center> </h4>&emsp;

          <img src="https://statics.vinpearl.com/dia-diem-chup-anh-dep-o-hue-08_1633161074.jpg" height="100%" width="100%" alt=""> &nbsp;
          <h4> <center>Hồ Thủy Tiên là một trong các hồ ở Huế có nét đẹp ma mị và kì bí (Ảnh: VnExpress) </center> </h4>&emsp;

          <img src="https://statics.vinpearl.com/dia-diem-chup-anh-dep-o-hue-09_1633161159.jpg" height="100%" width="100%" alt=""> &nbsp;
          <h4> <center>Khám phá những địa điểm chụp ảnh ở Huế đẹp không thể bỏ qua chùa Thiên Mụ (Ảnh: sưu tầm)  </center> </h4>&emsp;



          <img src="https://statics.vinpearl.com/dia-diem-chup-anh-dep-o-hue-6_1633013728.jpg" height="100%" width="100%" alt=""> &nbsp;
          <h4> <center>Trên đỉnh núi Bạch Mã Huế hùng vĩ (Ảnh: sưu tầm) </center> </h4>&emsp;


        </div>
      </div>
    </div>
  </div>
  
</section>

	
	<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>
	<?php include('includes/footer.php');?>
	<!-- signup -->
	<?php include('includes/signup.php');?>     
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php');?>     
	<!-- //signin -->
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
