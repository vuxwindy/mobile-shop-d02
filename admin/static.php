
<?php
// Kết nối cơ sở dữ liệu
include_once "../config/connectDB.php";

// Truy vấn số liệu
$sqlProducts = "SELECT COUNT(*) AS total_products FROM product";
$resultProducts = mysqli_query($conn, $sqlProducts);
$totalProducts = mysqli_fetch_assoc($resultProducts)['total_products'];

//truy vấn số liệu bình luận
$sqlComments = "SELECT COUNT(*) AS total_comments FROM comment";
$resultComments = mysqli_query($conn, $sqlComments);
$totalComments = mysqli_fetch_assoc($resultComments)['total_comments'];

$sqlMembers = "SELECT COUNT(*) AS total_members FROM user";
$resultMembers = mysqli_query($conn, $sqlMembers);
$totalMembers = mysqli_fetch_assoc($resultMembers)['total_members'];
//truy vấn số liệu ads  
// $sqlAds = "SELECT SUM(views) AS total_ads FROM ads";
// $resultAds = mysqli_query($conn, $sqlAds);
// $totalAds = mysqli_fetch_assoc($resultAds)['total_ads'];
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Trang chủ quản trị</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ quản trị</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget panelStatic">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $totalProducts; ?></div>
							<div class="text-muted">Sản Phẩm</div>
						</div>
					
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget panelStatic">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $totalComments; ?></div>
							<div class="text-muted">Bình Luận</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget panelStatic">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $totalMembers; ?></div>
							<div class="text-muted">Thành Viên</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget panelStatic">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">99999k</div>
							<div class="text-muted">Quảng Cáo</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	