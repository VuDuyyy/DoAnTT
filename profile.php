<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
}
else{
  if(isset($_POST['submit6']))
  {
    $name=$_POST['name'];
    $mobileno=$_POST['mobileno'];
    $email=$_SESSION['login'];

    $sql="update tblusers set FullName=:name,MobileNumber=:mobileno where EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->execute();
    $msg=" Đã Cập Nhật Thông Tin Người Dùng";
  }

  ?>
  <!doctype html>
  <html lang="vi" class="no-js">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>My Travel - Thừa Thiên Huế</title>
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
    <style>
      .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      }
      .succWrap{
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      }
    </style>
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
            <li><a href="index.php" class="scroll-link">Thông Tin</a></li>
            <li><a href="index.php" class="scroll-link">Địa Điểm</a></li>
            <li><a href="index.php" class="scroll-link">Hình Ảnh </a></li>
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
            <div>&nbsp;</div>
            <div class="">
              <h2>Thừa Thiên Huế</h2>
              <p>Nơi mang vẻ đẹp của thiên nhiên bạc ngàn!!!</p>
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
          <h2>Thông Tin Của Khách Hàng</h2>
          <p></p>
        </div>
        <div class="privacy">
          <div class="container">
            <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Thông Tin Người Dùng</h3>
            <form name="chngpwd" method="post">
              <?php 
              if($error)
              {
                ?>
                <div class="errorWrap">
                  <strong>Lỗi</strong>:<?php echo htmlentities($error); ?> 
                </div>
                <?php
              } else 
              if($msg)
              {
                ?>
                <div class="succWrap">
                  <strong>Thành Công</strong>:<?php echo htmlentities($msg); ?> 
                </div>
                <?php 
              }?>

              <?php 
              $useremail=$_SESSION['login'];
              $sql = "SELECT * from tblusers where EmailId=:useremail";
              $query = $dbh -> prepare($sql);
              $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              {
                foreach($results as $result)
                { 
                  ?>
                  <p style="width: 350px;">

                    <b>Name</b>  <input type="text" name="name" value="<?php echo htmlentities($result->FullName);?>" class="form-control" id="name" required="">
                  </p> 

                  <p style="width: 350px;">
                    <b>Mobile Number</b>
                    <input type="text" class="form-control" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" id="mobileno"  required="">
                  </p>

                  <p style="width: 350px;">
                    <b>Email Id</b>
                    <input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->EmailId);?>" id="email" >
                  </p>
                  <p style="width: 350px;">
                    <b>Last Updation Date : </b>
                    <?php echo htmlentities($result->UpdationDate);?>
                  </p>

                  <p style="width: 350px;"> 
                    <b>Lần Cập Nhật Cuối :</b>
                    <?php echo htmlentities($result->RegDate);?>
                  </p>
                  <?php 
                }
              } ?>
              <p style="width: 350px;">
                <button type="submit" name="submit6" class="btn-primary btn">Cập Nhật</button>
              </p>
            </form>
          </div>
        </div> 
      </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <!-- signup -->
    <?php include('includes/signup.php');?>     
    <!-- //signu -->
    <!-- signin -->
    <?php include('includes/signin.php');?>     
    <!-- //signin -->
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
  <?php 
} ?>
