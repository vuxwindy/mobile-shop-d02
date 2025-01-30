
  <?php 
     
     // Thiết lập múi giờ Việt Nam
     date_default_timezone_set("Asia/Ho_Chi_Minh");
     
     // Xử lý khi người dùng gửi bình luận
     if (isset($_POST['sbm'])) {
         // Lấy dữ liệu từ form
         $name = mysqli_real_escape_string($conn, $_POST['comm_name']);
         $email = mysqli_real_escape_string($conn, $_POST['comm_mail']);
         $details = mysqli_real_escape_string($conn, $_POST['comm_details']);
         $product_id = $_GET['prd_id']; // ID sản phẩm từ URL
         $created_at = date("Y-m-d H:i:s"); // Lấy thời gian hiện tại
     
         // Truy vấn thêm bình luận vào bảng comments
         $sqlInsertComment = "INSERT INTO comment (comm_name, comm_mail, comm_details, prd_id, comm_date)
                              VALUES ('$name', '$email', '$details', $product_id, '$created_at')";
         
         // Thực thi truy vấn và kiểm tra kết quả
         if (mysqli_query($conn, $sqlInsertComment)) {
             echo "<div class='alert alert-success'>Bình luận đã được gửi thành công!</div>";
         } else {
             echo "<div class='alert alert-danger'>Gửi bình luận thất bại: " . mysqli_error($conn) . "</div>";
         }
     }
     ?>

 
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
