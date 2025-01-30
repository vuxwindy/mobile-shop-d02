
<?php
// Kết nối CSDL
// include_once "../../config/connectDB.php";

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sbm'])) {
    $user_full = mysqli_real_escape_string($conn, $_POST['user_full']);
    $user_mail = mysqli_real_escape_string($conn, $_POST['user_mail']);
    $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
    $user_re_pass = mysqli_real_escape_string($conn, $_POST['user_re_pass']);
    $user_level = mysqli_real_escape_string($conn, $_POST['user_level']);

    // Kiểm tra xem mật khẩu nhập lại có khớp không
    if ($user_pass != $user_re_pass) {
        echo "<script>alert('Mật khẩu không khớp!');</script>";
    } else {
        // Hash mật khẩu (tùy chọn)
        $hashed_pass = password_hash($user_pass, PASSWORD_DEFAULT);

        // Kiểm tra email đã tồn tại chưa
        $sql_check_email = "SELECT * FROM user WHERE user_mail = '$user_mail'";
        $result_check = mysqli_query($conn, $sql_check_email);

        if (mysqli_num_rows($result_check) > 0) {
            echo "<script>alert('Email này đã tồn tại!');</script>";
        } else {
            // Thêm người dùng mới
            $sql_insert = "INSERT INTO user (user_full, user_mail, user_pass, user_level)
                           VALUES ('$user_full', '$user_mail', '$hashed_pass', 
                           " . ($user_level == 1 ? "'Admin'" : "'Member'") . ")";

            if (mysqli_query($conn, $sql_insert)) {
                echo "<script>alert('Thêm mới thành công!'); 
				window.location.href = 'index.php?page=user';</script>";
            } else {
                echo "Thêm mới thất bại: " . mysqli_error($conn);
            }
        }
    }
}
?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="index.php?page=user">Quản lý thành viên</a></li>
			<li class="active">Thêm thành viên</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thêm thành viên</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="post">
							<div class="form-group">
								<label>Họ & Tên</label>
								<input name="user_full" required class="form-control" placeholder="">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input name="user_mail" required type="text" class="form-control">
							</div>                       
							<div class="form-group">
								<label>Mật khẩu</label>
								<input name="user_pass" required type="password"  class="form-control">
							</div>
							<div class="form-group">
								<label>Nhập lại mật khẩu</label>
								<input name="user_re_pass" required type="password"  class="form-control">
							</div>
							<div class="form-group">
								<label>Quyền</label>
								<select name="user_level" class="form-control">
									<option value=1>Admin</option>
									<option value=2>Member</option>
								</select>
							</div>
							<button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
							<button type="reset" class="btn btn-default">Làm mới</button>
						</div>
					</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	
</div>	<!--/.main-->	

