<?php
// session_start();
if (!defined("ISLOGGED")) {
	header("location: index.php");
}
$sql_users = "SELECT * FROM user ORDER BY user_id ASC";
$result = mysqli_query($conn, $sql_users);
$row = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Mobile Shop - Administrator</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/static.css" rel="stylesheet">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>



</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Mobile</span>Shop</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/admin/modules/hồ sơ/ho_so.php?user_id=<?php echo $row['user_id']; ?>"><svg class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use>
									</svg> Hồ sơ</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use>
									</svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>
	<!--sidebar-->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>

		<?php
		$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
		?>
		<ul class="nav menu">
			<li class="<?= $page == 'dashboard' ? 'active' : '' ?>">
				<a href="index.php"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a>
			</li>
			<li class="<?= $page == 'user' ? 'active' : '' ?>">
				<a href="index.php?page=user"><svg class="glyph stroked male user">
						<use xlink:href="#stroked-male-user" />
					</svg> Quản lý thành viên</a>
			</li>
			<li class="<?= $page == 'category' ? 'active' : '' ?>">
				<a href="index.php?page=category"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> Quản lý danh mục</a>
			</li>
			<li class="<?= $page == 'product' ? 'active' : '' ?>">
				<a href="index.php?page=product"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
					</svg> Quản lý sản phẩm</a>
			</li>
			<li class="<?= $page == 'order' ? 'active' : '' ?>">
				<a href="index.php?page=order"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
					</svg> Quản lý đơn hàng</a>
			</li>
			<li class="<?= $page == 'comment' ? 'active' : '' ?>">
				<a href="index.php?page=comment"><svg class="glyph stroked two messages">
						<use xlink:href="#stroked-two-messages" />
					</svg> Quản lý bình luận</a>
			</li>
			
			<li class="<?= $page == 'ads' ? 'active' : '' ?>">
				<a href="index.php?page=ads"><svg class="glyph stroked chain">
						<use xlink:href="#stroked-chain" />
					</svg> Quản lý quảng cáo</a>
			</li>
			<li class="<?= $page == 'dark_bright' ? 'active' : '' ?>">
				<a href="index.php?page=dark_bright"><svg class="glyph stroked gear">
						<use xlink:href="#stroked-gear" />
					</svg> Cấu hình</a>
			</li>
		 
		</ul>

	</div>
	<!--/.sidebar-->

	<!-- Main Content -->
	<?php
	// switch-case

	if (isset($_GET['page'])) {
		switch ($_GET['page']) {
				// category module
			case 'add_category':
				require_once "modules/category/add_category.php";
				break;
			case 'edit_category':
				require_once "modules/category/edit_category.php";
				break;
			case 'category':
				require_once "modules/category/category.php";
				break;
				// product module
			case 'product':
				require_once "modules/product/product.php";
				break;
			case 'add_product':
				require_once "modules/product/add_product.php";
				break;
			case 'edit_product':
				require_once "modules/product/edit_product.php";
				break;
				// user module
			case 'user':
				require_once "modules/user/user.php";
				break;
			case 'add_user':
				require_once "modules/user/add_user.php";
				break;
			case 'edit_user':
				require_once "modules/user/edit_user.php";
				break;
				//order module
			case 'order':
				require_once "modules/orders/order.php";
				break;
			case 'order_processed':
				require_once "modules/orders/processed_order.php";
				break;
			case 'order_detail':
				require_once "modules/orders/order_detail.php";
				break;
			case 'edit_order':
				require_once "modules/orders/edit_order.php";
				break;
				//setting
			case 'dark_bright':
				require_once "modules/settings/dark_bright.php";
				break;
				//ads
			case 'ads':
				require_once "modules/ads/ads.php";
				break;
			//comments
			case 'comments':
				require_once "modules/comments/comment.php";
				break;
		}
	} else {
		require_once "static.php";
	}
	?>
	<!-- ./Main Content -->
</body>
<script src="/admin/js/dark-light.js"></script>
    

</html>