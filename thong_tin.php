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

  <!--Package-->
  <section id="aboutUs" class="secPad">
  <div class="container">

    <div class="heading text-center adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <!-- Heading -->
      <h2>THÔNG TIN</h2>
      <p>Huế là vùng đất có lịch sử văn hóa lâu đời, có nhiều địa điểm du lịch Huế hấp dẫn, nhiều danh lam thắng cảnh, di tích lịch sử đẹp và ấn tượng, vùng đất cố đô chính là điểm đến lý tưởng cho các tín đồ thích du lịch khám phá.</p>
    </div>
    <h1> Đại Hội Huế</h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://dacotours.com/wp-content/uploads/2019/10/dai-noi-hue.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Đại Nội Huế hay còn được mọi người gọi là Hoàng Thành Huế,Nằm ở bên trong Kinh Thành Huế thuộc vòng thành thứ hai. Di tích này có rất nhiều ý nghĩa quan trọng như là việc bảo vệ cung điện, Tử Cấm Thành mà giờ đây nơi này còn trở thành một trong những đến hấp dẫn bật nhất tại Huế. Mặc dù các triều đại của thời vua chúa triều Nguyễn đã suy tàn đi nữa những giữa chốn thâm cung của những đời vua đã từng cai trị nơi đây vẫn còn chứa nhiều bí ẩn.<br>
Khi người ta nói đến Huế để hỏi về một địa điểm tham quan hấp dẫn và nổi tiếng bật nhất mà không nhắc đến cái tên Đại Nội Huế là một thiếu xót nghiêm trọng. Ở nơi đây không chỉ là nơi chứa ẩn những bí ẩn về chốn thâm cung của các vị vua triều Nguyễn mà còn là nơi hội tụ vẻ đẹp về văn hóa, kiến trúc của thành phố Huế. Vào năm 1993 Đại Nội Huế đã được công nhận là Di sản văn hóa thế giới nằm trong cụm Quần thể Di tích cố đô Huế. Dựa vào lịch sử Việt Nam thời cận đại thì Đại Nội Huế được cho là công Trình có quy mô đô sộ bật nhất , được tham gia thi công với lực lượng xây dựng của hàng ngàn vạn lượt người với vật liệu xây dựng có thể ước tính đến hàng triệu mét khối đất đá cùng với rất nhiều công việc cần phải làm như đào hào,lấp sông,dời mộ,đắp thành,di dân. Sau một quá trình kéo dài gần như suốt 30 năm , dưới thời trị vị của 2 đời vua là vua Minh Mạng và vua Gia Long<a href="https://docs.google.com/document/d/13WS9g-2Zkw6O02yLeFRMpfqITr-bSpqs/edit">(...xem thêm)</a>
 </p> 
      </div>



      </div>
    <h1> Biển Thuận An </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://www.baohaiquanvietnam.vn/storage/posts/thuan%20an.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Bãi biển Thuận An Huế nổi tiếng với vẻ đẹp hoang sơ, trữ tình thu hút rất nhiều du khách đến tham quan. Bạn đang lên kế hoạch cho một chuyến đi đến Bãi biển Thuận An? Trong bài viết sau đây kinh nghiệm được trao đổi và góp ý. Những thông tin chi tiết sẽ giúp bạn lên kế hoạch cho chuyến đi hoàn hảo!. Bãi biển Thuận An cách Huế bao xa?Câu trả lời là không xa lắm, biển chỉ cách trung tâm thành phố 15 km tức là khoảng 20 phút đi xe. Là một trong những bãi biển đẹp nhất ở Huế, biển Thuận An thu hút du khách bởi vẻ đẹp hoang sơ với những bãi cát trải dài. địa điểm du lịch lý tưởng để tận hưởng không gian trong lành và yên bình của biển. Theo kinh nghiệm du lịch Huế của mình thì bạn cần đến biển Thuận An từ đây. từ tháng 4 đến tháng 9 hàng năm.Lúc này biển mát lạnh, thích hợp để du khách tắm mát, thả mình trong làn nước mát lạnh và dạo bước trên bãi cát mịn giữa trời xanh, mây trắng và nắng vàng, vô cùng thơ mộng ở Thuận An. Bãi biển Thuận An Thuận An Huế có rất nhiều khách sạn và hệ thống nhà nghỉ ở đây cũng vô cùng đa dạng để du khách đặt phòng lưu trú, tuy nhiên khách sạn du lịch đẳng cấp phải kể đến khách sạn Vinpearl Huế.Trung tâm thành phố 5 sao gồm 33 tầng và hệ thống hơn 200 phòng nghỉ đầy đủ tiện nghi, nhiều dịch vụ phức hợp (gym, hồ bơi, nhà hàng, bar, ...) <a href="https://docs.google.com/document/d/1H6HsmzSskVViWbiMov_15hvfT4H-emVJ/edit">(...xem thêm)</a>
 </p> 
      </div>
      &emsp;
      </div>
    <h1>Cầu Tràng Tiền </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://tour.dulichvietnam.com.vn/uploads/image/du-lich-hue/ve-dep-cau-trang-tien.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Khi nhắc đến những cây câu nổi tiếng ở Huế thì chúng ta sẽ nghĩ ngay đến cầu Tràng Tiền. Bởi vì Cầu Tràng Tiền Huế được xem như là biểu tượng của cố đô, mang đậm một dấu ấn lịch sử qua bao thăng trầm thời kì của đất nước. Không những thế đây là điểm du lịch hấp dẫn thu hút mọi du khách khi đến Huế cũng bởi vẻ đẹp duyên dáng và thơ mộng bắc qua dòng sông Hương trôi lững lờ trong xanh.Cầu Tràng Tiền Huế có vị trí nằm ngay trung tâm thành phố và còn hay được gọi là cầu Trường Tiền hay cầu Thành Thái. Cầu được nối liền tử ổ bên bờ sông Hương và nối với đầu phía bắc thuộc phường Phú Hòa, ở đầu phía nam thuộc phường Phú Hợi.Có thể nói đaay là cây cầu đầu tiên ở Đông Dương được xây dựng thiết kế theo kỹ thuật và vật liệu nhập từ ở phương Tây về đây. Cầu được xây dựng bằng các vật liệu như thép với tổng chiều dài khoản 402,60 mét, bao gồm có tất cả 6 nhịp dầm thép có dạng vành lượng, khẩu độ cầu mỗi nhịp là 67 mét.<a href="https://docs.google.com/document/d/1H6HsmzSskVViWbiMov_15hvfT4H-emVJ/edit">(...xem thêm)</a>

 </p> 
      </div>      </div>
    <h1> Chợ Đông Ba
 </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="http://khamphahue.com.vn/Portals/0/Medias/Nam2018/T9/Khamphahue_Chodongba.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>hợ Đông Ba Huế là một trong những  chợ truyền thống ở Huế mà du khách nào đến đây cũng phải ghé qua ít nhất một lần. Khu chợ này có gì đặc biệt và bạn có thể ăn gì và mua  gì ở đây? Bạn nhất định phải ghé thăm chợ Đông Ba Huế. Đây là điều mà  nhiều người đã xem xét trước đây. Đây không chỉ là một khu chợ bán đồ dùng và hàng tạp hóa.thú vị để bạn khám phá và mua quà  cho gia đình và bạn bè. Hãy cùng giữ bí mật để trải nghiệm trọn vẹn phiên chợ này nhé! Chợ Đông Ba Huế là khu chợ truyền thống nổi tiếng nhất vùng đất Cố đô, có giá trị. Chợ này ban đầu có tên là Quy Gia Thị để đánh dấu sự trở lại của vua  Nguyễn khi trở lại Phú Xuân. Cái tên Chợ Đông Ba Huế nổi lên 1887 dưới triều vua Đồng Khánh. Hiện nay, chợ Đông Ba Huế tọa lạc tại số 2 Trần Hưng Đạo, Phú Hòa, thành phố Huế, ngay giữa cầu Gia Hội và cầu Trường Tiền. Ngay trung tâm thành  phố Huế, nên bạn sẽ không khó để  tìm thấy khu chợ này, từ chỗ ở của mình, bạn chỉ cần bắt taxi hoặc  đi xe máy đến đường Trần Hưng Đạo,  cạnh Hương Cảng.<a href="https://docs.google.com/document/d/116MLGx-U7n2h8BD49B1rCQX3V0rEeF2D/edit">(...xem thêm)</a>
 </p>       </div>
            </div>
    <h1> Đầm Lập An
 </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://phuot3mien.com/wp-content/uploads/2021/06/dam-lap-an.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Được mệnh danh là “Tuyệt tình cốc” độc đáo của Huế, đầm Lập An Huế với phong cảnh ngoạn mục cũng là một trong những điểm đến hấp dẫn của du khách trong và ngoài nước khi đến với mảnh đất Cố đô. Đầm Lập An là một điểm tham quan du lịch trên quốc lộ 1A đoạn qua thị trấn Lăng Cô, huyện Phú Lộc, tỉnh Thừa Thiên - Huế. Đây cũng là một trong đầm nước lợ lớn nhất ở Huế, với diện tích khoảng 800 ha. Do có vị trí địa lý nằm ở ngã tư Huế và Đà Nẵng, cách xa thành phố nên khung cảnh nơi đây mang đậm nét hoang sơ, kỳ bí và mê hoặc những du khách đam mê khám phá. .Khi du khách đang thắc mắc "Đầm Lập An cách Huế bao xa?" Theo Google Maps, khoảng cách ước tính là 40 dặm và mất khoảng 1 giờ 20 phút để di chuyển theo Quốc lộ 1A.<a href="https://docs.google.com/document/d/1l8144OPOZ_NRIyqXSNW4z-83D8v0M2JZ/edit">(...xem thêm)</a>
 </p> 
      </div>
            </div>
    <h1>Điện Hòn Chén
 </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://huesmiletravel.com.vn/wp-content/uploads/2019/07/dien-hon-chen.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Một trong các di sản ở Huế mỗi khi chúng ta nhắc đến là Điện Hòn Chén,một di sản Chăm có phần linh thiêng ở tròng lòng thành phố Huế. Có thể nói đây là chốn linh thiêng có vị trí quan trọng trong đời sống tinh thần của người dân xứ Huế. Ngoài ra là ngôi điện duy nhất ở đây có được sự kết hợp bởi nghi thức cung đình và tín ngưỡng dân gian một cách hài hòa, vô cùng đặc sắc. Điện Hòn Chén có vị trí tọa lạc ở trên núi Ngọc Trản, thuộc của làng Ngọc Hồ,  thị xã Hương Trà ở Thừa Thiên Huế. Và đây cũng là ngôi điện có vị trí rất quan trọng trong đời sống tâm linh của mõi con người dân xứ Huế và còn là điện thờ duy nhất ở Huế có được sự kết hợp ăn ý bởi nghi thức cung đình cùng với tín ngưỡng văn hóa, dân gian tại nơi đây.<a href="https://docs.google.com/document/d/14nYNoojSv8QelT4h_yfMTFJ7Sism8P7S/edit">(...xem thêm)</a>
 </p> 
      </div>
            </div>
    <h1>Đồi Vọng Cảnh Huế </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://huesmiletravel.com.vn/images/doi-vong-canh-hue.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Hôm nay chúng ta cùng nhau tìm hiểu một trong những địa điểm du lịch nổi tiếng ở thành phố Huế đó là Đồi Vọng Cảnh Huế. Có thể nói nơi đây là một trong các địa danh nhất định bạn phải ghé thăm khi đặt chân tới mảnh đất này. Tại nơi đây có vẻ đẹp hoàn hảo giữa giữa mây trời non sông , cây cối và núi rừng xanh biếc. Không những vậy Đồi Vọng Cảnh Còn Được mệnh danh là một nơi có thể ngắm hoàng hôn đẹp nhất tại Huế. Có thể bạn có suy nghĩ rằng các địa điểm du lịch nổi tiếng như Sông Hương,Chùa Thiên Mụ hay cầu Tràng Tiền mỗi nhắc đến các điểm du lịch nổi tiếng ở Huế nhưng không, Đồi Vọng Cảnh là một cái tên đặc biệt trong số đó, rằng người ta thường hay nói có một địa danh được ví như “ đôi mắt thần của Cố Đô” không sai đó chính là Đồi Vọng Cảnh Huế. Nơi đây đẹp cứ ngỡi như là một bức tranh, có vị trí tại số 102, đường Huyền Trân Công Chúa, Xã Thủy Biều khoản 7km về hướng trung tâm theo hướng nam.Thật sự thì diện tích của Đồi Vọng Cảnh Huế không quá rộng lớn nhưng độ cao thì làm cho dân phượt phải kinh sợ. Tất cả nằm ở tầm vừa đủ nhưng lại khiến cho phải người phải u mê.  Lý do chỉ có một là bởi vì cảnh đẹp thơ mộng, trữ tình nơi đây. Ngoài ra còn điểm nhấn đặc biệt là dòng sông Hương nằm e ấp dưới chân đồi.<a href="https://docs.google.com/document/d/1JmlPhPA9vBWQp4nF8tLKaEiqCT2Rj3a1/edit">(...xem thêm)</a>
 </p> 
      </div>
            </div>
    <h1> Hồ Thủy Tiên Huế </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://statics.vinpearl.com/ho-thuy-tien-hue-3_1624524725.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Vẻ đẹp kỳ bí, ma mị mà báo Mỹ phải nhắc đến chính là Đồi Thiên An  Hồ Thuỷ Tiên. Công viên Hồ Thủy Tiên Huế sau bao năm bị bỏ hoang nhưng lại trở thành một trong cái địa điểm du lịch khá nổi tiếng của vùng đất cố đô. Trong vài năm trở lại gần đây thì Hồ Thủy Tiên ở Huế chính lại là điểm đến được nhiều du khách ghé thăm, chụp hình check in,...tại vì khi sau khi nhiều lần xuất hiện trên các trang báo trong và ngoài nước nên công viên Hồ Thủy Tiên Huế đã lọt vào top những khu hồ nước bỏ hoang mang đầy vẻ ma mị, kỳ bí nổi tiếng trên khắp thế giới. Ở nơi đây là cũng một trong những điểm đến lý thú của cố đô Huế, thu hút được nhiều du khách thích mạo hiểm.<a href="https://docs.google.com/document/d/1eA2ukeaKI_7lx3IQMvdGg2oWX0wAo5k2/edit">(...xem thêm)</a>

 </p> 
      </div>
            </div>
    <h1> Hồ Truồi </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://statics.vinpearl.com/ho-truoi-6_1633433859.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Nép mình dưới chân núi Bạch Mã hùng vĩ, hồ Truồi quanh năm  mây trắng bao phủ, trong khi làn nước xanh ngọc bích  từ dãy Trường Sơn tuôn ra. Đây là  điểm dừng chân lý tưởng  cho những người yêu thiên nhiên, thích khám phá và sành sỏi. Thiên nhiên. Nếu bạn muốn tìm một nơi yên tĩnh không xô bồ, bon chen. Bên cạnh những  điểm du lịch  nổi tiếng của Huế như Đại Nội, chùa Thiên Mụ, đồi Vọng Cảnh… thì hồ Truồi cũng  là một trong những địa điểm không thể bỏ qua. để xem phong cảnh. Đến đây, du khách như được hòa mình vào thiên nhiên,  đắm mình trong không gian tĩnh lặng và được ngắm nhìn sắc xanh “Tuyệt tình cốc”.<a href="https://docs.google.com/document/d/1V3QVGWLqjMIiSTEBS4b5GtHbLV1ehBlw/edit">(...xem thêm)</a>
 </p> 
      </div>
            </div>
    <h1> Núi Bạch Mã Huế </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://statics.vinpearl.com/vuon-quoc-gia-bach-ma-hue_1645360112.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Núi Bạch Mã Huế một trong những địa điểm khám phá thích hợp dành cho những ai có tình yêu thiên nhiên, núi rừng và ưa thích cảm giác chinh phục. Chúng ta cùng nhau tham khảo những kinh nghiệm du lịch khi đi núi Bạch Mã Huế chi tiết và hữu ích nào. Nơi đây là điểm nghỉ mát nổi tiếng từ khắp trong và ngoài nước, bởi nơi đây có nhiều con suối trong lành mát mẻ và những ngọn thác ngoạn mục khiến nhiều du khách phải suy tư trước vẻ đẹp này. Bất cứ ai cũng mong được một lần đến đây để ngắm nhìn vẻ đẹp lung linh của thành phố Huế cùng đèo Hải Vân,...bo tròn trong tầm mắt.<a href="https://docs.google.com/document/d/1jCfnRp2AjvY091PyUQ6qbA_g9Q_Ype2-/edit">(...xem thêm)</a>

 </p> 
      </div>
            </div>
    <h1>Núi Ngự Bình Huế </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://www.chudu24.com/wp-content/uploads/2016/12/Nui-ngu-binh1.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Núi Ngự Bình nằm ở đâu? Có lẽ đây là câu hỏi được rất nhiều du khách tò mò khi đặt chân đến xứ Huế. Điểm du lịch này được tọa lạc tại xã An Cựu của thành phố Huế, Thừa Thiên Huế. Một trong các ưu điểm nổi bật của núi Ngự Bình chính là chỉ cách trung tâm thành phố khoảng 4km, dễ dàng thuận tiện cho việc di chuyển và tham quan của du khách. Núi này có chiều cao lên tới 105m khi so với mực nước biển. Ngọn núi cũng được gắn liền với đời sống thường ngày của người dân xứ Huế bao đời nay.  Hình thang là hình khi miêu tả ngọn núi này, ở trên đỉnh khá là bằng phẳng gần như như một chiếc bình phong. Nơi đây cũng là điểm check-in tuyệt đẹp với các du khách khi đến với địa phương này. Đối với người dân địa phương tại nơi đây, núi Ngự Bình Huế mang một ý nghĩa rất đặc trưng về phía cảnh phong thủy. Nhiều Người quan niệm rằng những làn gió mát dịu từ ngọn núi này đem đến cho người dân địa phương những điều may mắn và bình an trong cuộc sống. Cũng chính vì vậy, núi Ngự Bình Huế đã là một trong những điểm du lịch gắn liền với lịch sử của mảnh đất cố đô này. <a href="https://docs.google.com/document/d/1vOydEi3N4eBf1JQ4vHhqlqotIHHhOD07/edit">(...xem thêm)</a>
 </p> 
      </div>
            </div>
    <h1>Sông Hương </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="http://khamphahue.com.vn/Portals/0/Medias/Nam2021/T11/Khamphahue-Song-Huong-nhin-tu-tren-cao.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>
Hôm nay chúng ta sẽ nói về một trong địa điểm du lịch nổi tiếng của thành phố Huế chính là sông Hương huế. Dòng sông này miền theo niềm tự hào của người dân Huế , thời tiết khí hậu ở nơi đây vô cùng ôn hòa khiến cho chúng ta phải đến để trải nghiệm nơi đây một lần trong đời, sông được trải dài từ vườn Vĩ Dạ cùng với những thảm cỏ xanh biếc, nó đi qua ngôi chàu Thiên mụ đem theo những nét cổ uy nghiêm,còn được rẻ nhánh qua con sông Bạch Yến như một dải lụa mềm mại trước gió mây trời bao la. Chứa trong mình sự thơ mộng làm thêm phần tô điểm cho vùng đất Huế thơ mộng này.<a href="https://docs.google.com/document/d/1iIEr7rADODIW-Ng3PLrziMLcBYgFYtfw/edit">(...xem thêm)</a>

 </p> 
      </div>      </div>
    <h1> Thiền viện Trúc Lâm Bạch Mã </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://luhanhvietnam.com.vn/du-lich/vnt_upload/news/10_2019/chiem-nguong-thien-vien-truc-lam-bach-ma-hue1.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Thiền viện Trúc Lâm Bạch có vị trí nằm giữa lòng hồ Truồi thuộc xã Lộc Hòa, huyện Phú Lộc, tỉnh Thừa Thiên Huế. Ở đây không chỉ là một Thiền viện thuộc phái Thiền Trúc Lâm Yên Tử ở  miền trung đây còn là môt danh lam thắng cảnh nổi tiếng của tỉnh Thừa Thiên Huế. Thiền viện Trúc Lâm Bạch Mã ở huế được sáng lập bởi tôn sư Thượng thanh Hạ Tử còn là người đầu tiên gây dựng lên thiền viện Trúc Lâm Bạch Mã, đây cũng là ngôi thiền viện đầu tiên ở miền Trung có gốc gác từ thiền phái Trúc Lâm Yên Từ. Chúng ta có thể đi đến gặp câu Truồi khi đi từ thành phố Huế về phía Nam vào khoản 30km. Con đường dẫn vào Đập Truồi ở bên phải, đi theo dòng sông qua một khúc quanh ta bắt gặp vùng đất khô cằn thiếu sức sống, thưa thớt dân cư, khi đi vào một đoạn nữa ta sẽ gặp được một bãi đất hoang tàn nhìn không có sự sống nào cả, cảnh vật vô cùng âm u.<a href="https://docs.google.com/document/d/1zegWESwfhCCEnDjswi-VJAfYSXitrRvf/edit">(...xem thêm)</a>

 </p> 
      </div>
            </div>
    <h1> Vịnh Lăng Cô Huế
 </h1>
    <div class="row adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-4">
        <img src="https://viettravelo.com/wp-content/uploads/2018/07/langcothodiadulich-1024x577.jpg" alt="" class="img-responsive img-thumbnail">
      </div>
      <div class="col-md-8">
        <p>Hôm nay chúng ta sẽ nói về Vịnh Lăng Cô Huế, nơi đây được mệnh danh là một trong những vịnh biển đẹp nhất hành tinh. Cùng với sự nổi tiếng về cảnh sắc thiên nhiên tuyệt mỹ có cả sông, núi, biển và đầm phá say đắm lòng người. Ngay cho đến tận bây giờ,tại vịnh Lăng Cô Huế vẫn còn ẩn chứa nhiều điều thú vị, đang chờ đợi các du khách thập phương đến tham quan và khám phá. Vịnh Lăng Cô Huế là một trong những địa điểm du lịch lý tưởng dành cho những du khách yêu thích vẻ đẹp lãng mạn bởi sự bình yên của những bãi cát trắng mịn trải dài bên biển nước mênh mông, trong xanh và mát lành khiến chúng ta bị mê hoặc. Còn nếu bạn cũng nằm trong số đó thì còn gì nữa hãy bỏ túi ngay những thông tin hữu ích về du lịch Lăng Cô để sẵn sàng cho một chuyến du lịch đến vùng đất hoàn mỹ này nhé!<a href="https://docs.google.com/document/d/1NoSOLBKIlgBD-i4kKP6G-j92XvVnHRIS/edit">(...xem thêm)</a>
 </p> 
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
