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
          <a href="#" class="navbar-brand scroll-top logo"><b>Traveller</b></a>
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

  <!--Package-->
  <section id="packages" class="secPad">
  <div class="container">
    <div class="heading text-center">
      <!-- Heading -->
      <h2>Các Địa Điểm</h2>
      <p>Thừa Thiên Huế có rất nhiều địa điểm đẹp. Có khoản hơn 30 địa điểm du lịch đẹp say đấm lòng người</p>
    </div>
    <div class="">
      <h3>Danh Sách</h3>
          
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
             <p><b>            Đặc Điểm Nổi Bật:</b> <?php echo htmlentities($result->PackageType);?></p>
              <p><b>Địa chỉ  :</b> <?php echo htmlentities($result->PackageLocation);?></p>
              <p><b>              </b> <?php echo htmlentities($result->PackageFetures);?></p>
            </div>
            <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
              <h5>   Giá Tiền     <?php echo htmlentities($result->PackagePrice);?> đ</h5>
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
