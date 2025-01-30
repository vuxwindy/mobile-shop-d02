<?php
// Kết nối cơ sở dữ liệu
 

if (isset($_POST['sbm'])) {
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']); // Lấy tên danh mục từ form
    
    // Kiểm tra danh mục đã tồn tại
    $check_sql = "SELECT * FROM category WHERE cat_name = '$cat_name'";
    $check_result = mysqli_query($conn, $check_sql);
    
    if (mysqli_num_rows($check_result) > 0) {
        $error = "Danh mục đã tồn tại!";
    } else {
        // Chèn danh mục mới vào bảng
        $insert_sql = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
        if (mysqli_query($conn, $insert_sql)) {
            $success = "Thêm danh mục mới thành công!";
        } else {
            $error = "Lỗi: Không thể thêm danh mục.";
        }
    }
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="index.php?page=category">Quản lý danh mục</a></li>
			<li class="active">Thêm danh mục</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thêm danh mục</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-8">
						   <!-- Hiển thị thông báo -->
						<?php if (isset($error)) { ?>
							<div class="alert alert-danger"><?php echo $error; ?></div>
						<?php } elseif (isset($success)) { ?>
							<div class="alert alert-success"><?php echo $success; ?></div>
						<?php } ?>

						   <!-- Form thêm danh mục -->
						<form role="form" method="post">
						<div class="form-group">
							<label>Tên danh mục:</label>
							<input required type="text" name="cat_name" class="form-control" placeholder="Tên danh mục...">
						</div>
						<button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
						<button type="reset" class="btn btn-default">Làm mới</button>
					</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
</div>	<!--/.main-->	
