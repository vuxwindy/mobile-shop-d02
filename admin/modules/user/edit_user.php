<?php
include_once "../config/connectDB.php";
// Kiểm tra xem có user_id trong URL không
if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);

// Truy vấn thông tin người dùng để hiển thị
    $sql_user = "SELECT * FROM user WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql_user);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Người dùng không tồn tại!";
		exit;
    }
}

// Kiểm tra nếu form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_full = mysqli_real_escape_string($conn, $_POST['user_full']);
    $user_mail = mysqli_real_escape_string($conn, $_POST['user_mail']);
    $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
    $user_re_pass = mysqli_real_escape_string($conn, $_POST['user_re_pass']);
    $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);

 // Kiểm tra mật khẩu nhập lại
 if ($user_pass != $user_re_pass) {
	echo "<script>alert('Mật khẩu không khớp!');</script>";
} else {
	// Hash mật khẩu (tùy chọn, để bảo mật hơn)
	$hashed_pass = password_hash($user_pass, PASSWORD_DEFAULT);

	// Cập nhật thông tin người dùng
	$sql_update = "UPDATE user 
				   SET user_full = '$user_full', 
					   user_mail = '$user_mail', 
					   user_pass = '$hashed_pass', 
					   user_level = '$user_level' 
					   WHERE user_id = $user_id";

        if (mysqli_query($conn, $sql_update)) {
            echo "<script>alert('Cập nhật thành công!'); window.location.href = 'index.php?page=user';</script>";
        } else {
            echo "Cập nhật thất bại: " . mysqli_error($conn);
        }
    }
}
?>







<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="">Quản lý thành viên</a></li>
			<li class="active">Nguyễn Văn A</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thành viên: Nguyễn Văn A</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" method="post">
							<div class="form-group">
								<label>Họ & Tên</label>
								<input type="text" name="user_full" required class="form-control" value="<?php echo $row['user_full']; ?>" placeholder="">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="user_mail" required value="<?php echo $row['user_mail']; ?>" class="form-control" >
							</div>                       
							<div class="form-group">
								<label>Mật khẩu</label>
								<input type="password" name="user_pass" required  class="form-control">
							</div>
							<div class="form-group">
								<label>Nhập lại mật khẩu</label>
								<input type="password" name="user_re_pass" required  class="form-control">
							</div>
							<div class="form-group">
								<label>Quyền</label>
								<select name="user_level" class="form-control">
									<option value="Admin" <?php echo ($row['user_level'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                					<option value="Member" <?php echo ($row['user_level'] == 'Member') ? 'selected' : ''; ?>>Member</option>
       							</select>
							</div>
							<button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
							<button type="reset" class="btn btn-default">Làm mới</button>
						</div>
					</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	
</div>	<!--/.main-->	