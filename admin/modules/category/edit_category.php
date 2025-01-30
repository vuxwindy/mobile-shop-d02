<?php

if (isset($_GET['cat_id'])) {
    $cat_id = intval($_GET['cat_id']);

    // Lấy thông tin danh mục cần sửa
    $sql_select = "SELECT * FROM category WHERE cat_id = $cat_id";
    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        $category = mysqli_fetch_assoc($result);

        // Xử lý cập nhật danh mục khi nhấn nút 'Cập nhật'
        if (isset($_POST['sbm'])) {
            $cat_name = mysqli_real_escape_string($conn, trim($_POST['cat_name']));

            // Kiểm tra xem danh mục đã tồn tại chưa (trừ chính nó)
            $sql_check = "SELECT * FROM category WHERE cat_name = '$cat_name' AND cat_id != $cat_id";
            $check_result = mysqli_query($conn, $sql_check);

            if (mysqli_num_rows($check_result) > 0) {
                $error = "Danh mục đã tồn tại!";
            } else {
                // Cập nhật danh mục
                $sql_update = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = $cat_id";
                if (mysqli_query($conn, $sql_update)) {
                    header("Location: index.php?page=category");
                    exit;
                } else {
                    $error = "Có lỗi xảy ra khi cập nhật danh mục.";
                }
            }
        }
    } else {
        header("Location: index.php?page=category");
        exit;
    }
} else {
    header("Location: index.php?page=category");
    exit;
}
?>




<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="">Quản lý danh mục</a></li>
			<li class="active">Danh mục 1</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục:<?php echo htmlspecialchars($category['cat_name']); ?></h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-8">
						<?php if (isset($error)): ?>
							<div class="alert alert-danger"><?php echo $error; ?></div>
						<?php endif; ?>
						<form role="form" method="post">
						<div class="form-group">
							<label>Tên danh mục:</label>
							<input type="text" name="cat_name" required 
                                value="<?php echo htmlspecialchars($category['cat_name']); ?>" 
                                class="form-control" 
                                placeholder="Tên danh mục..."
                            >
						
						</div>
						<button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
						<button type="reset" class="btn btn-default">Làm mới</button>
					</div>
				</form>
				</div>
			</div>
		</div><!-- /.col-->
</div>	<!--/.main-->	