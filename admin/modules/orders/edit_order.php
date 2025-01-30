<?php
include_once "../config/connectDB.php";

// Truy vấn thông tin đơn hàng
$order_id = $_GET['order_id']; // Lấy order_id từ URL
$sqlOrder = "SELECT * FROM orders WHERE order_id = $order_id";
$resultOrder = mysqli_query($conn, $sqlOrder);
$order = mysqli_fetch_assoc($resultOrder);

// Truy vấn danh sách sản phẩm trong đơn hàng qua orderDetail
$sqlProducts = "SELECT p.prd_id AS id, p.prd_name AS name, p.prd_image AS img, od.prd_price AS price, od.prd_quantity AS qty
    FROM order_detail od
    INNER JOIN product p ON od.prd_id = p.prd_id
    WHERE od.order_id = $order_id
";
$resultProducts = mysqli_query($conn, $sqlProducts);

// Xử lý cập nhật thông tin đơn hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cập nhật thông tin khách hàng
    $cus_name = $_POST['cus_name'];
    $cus_address = $_POST['cus_address'];
    $cus_mail = $_POST['cus_mail'];
    $cus_phone = $_POST['cus_phone'];

    $sqlUpdateOrder = "UPDATE orders 
        SET cus_name = '$cus_name', cus_address = '$cus_address', cus_mail = '$cus_mail', cus_phone = '$cus_phone'
        WHERE order_id = $order_id
    ";
    mysqli_query($conn, $sqlUpdateOrder);

    // Cập nhật thông tin sản phẩm
    foreach ($_POST['product'] as $prd_id => $product) {
        $price = $product['price'];
        $qty = $product['qty'];
        $sqlUpdateProduct = "UPDATE order_detail 
            SET prd_price = $price, prd_quantity = $qty
            WHERE prd_id = $prd_id AND order_id = $order_id
        ";
        mysqli_query($conn, $sqlUpdateProduct);
    }

    // Chuyển hướng lại trang để tránh nộp lại form
    header("Location: index.php?page=order");
    exit;
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="index.php?page=order">Quản lý đơn hàng</a></li>
            <li class="active">Chỉnh sửa</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa đơn hàng</h1>
        </div>
    </div><!--/.row-->

    <!-- Form chỉnh sửa -->
    <form method="POST">
        <!-- Thông tin khách hàng -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Thông tin khách hàng</h4>
                </div>
                <?php if ($order): ?>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Tên khách hàng:</strong>
                            <input type="text" class="form-control" name="cus_name" value="<?= $order['cus_name'] ?>" required>
                        </li>
                        <li class="list-group-item">
                            <strong>Địa chỉ:</strong>
                            <input type="text" class="form-control" name="cus_address" value="<?= $order['cus_address'] ?>" required>
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong>
                            <input type="email" class="form-control" name="cus_mail" value="<?= $order['cus_mail'] ?>" required>
                        </li>
                        <li class="list-group-item">
                            <strong>Điện thoại:</strong>
                            <input type="text" class="form-control" name="cus_phone" value="<?= $order['cus_phone'] ?>" required>
                        </li>
                    </ul>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Không tìm thấy thông tin đơn hàng!</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($resultProducts) > 0): ?>
                                <?php while ($product = mysqli_fetch_assoc($resultProducts)): ?>
                                    <tr>
                                        <td><?= $product['id'] ?></td>
                                        <td><?= $product['name'] ?></td>
                                        <td><img width="130" height="180" src="images/<?= $product['img'] ?>" /></td>
                                        <td>
                                            <input type="number" class="form-control" name="products[<?= $product['id'] ?>][price]" value="<?= $product['price'] ?>" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="products[<?= $product['id'] ?>][qty]" value="<?= $product['qty'] ?>" required>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center">Không có dữ liệu</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Nút lưu -->
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
            <a href="index.php?page=order" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
