 <header class="header">
 	<?php if($_SESSION['login'])
 	{?>
 		<div class="top-header">
 			<div class="container">
 				<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
 					<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
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
 					<li ><a href="#home" class="scroll-link">Trang Chủ</a></li>
 					<li><a href="thong_tin.php" class="scroll-link">Thông Tin</a></li>
 					<li><a href="dia_diem.php" class="scroll-link">Địa Điểm</a></li>
 					<li><a href="anh.php" class="scroll-link">Hình Ảnh</a></li>
 					<li><a href="lien_he.php" class="scroll-link">Liên Hệ</a></li>
 				</ul>
 			</div>
 			<!--/.navbar-collapse-->
 		</nav>
 		<!--/.navbar-->
 	</div>
 	<!--/.container-->
 </header>