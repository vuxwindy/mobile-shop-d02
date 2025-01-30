
<?php
include_once "../config/connectDB.php";

// Truy vấn thông tin đơn hàng
$order_id = $_GET['order_id']; // Lấy order_id từ URL, mặc định là 1
$sqlOrder = "SELECT * FROM orders WHERE order_id = $order_id";
$resultOrder = mysqli_query($conn, $sqlOrder);
$order = mysqli_fetch_assoc($resultOrder);

// Truy vấn danh sách sản phẩm trong đơn hàng qua orderDetail

$sqlProducts = "SELECT p.prd_id AS id, p.prd_name AS name, p.prd_image AS img, od.prd_price AS price, od.prd_quantity AS qty
    FROM order_detail od
    INNER JOIN product p ON od.prd_id = p.prd_id
    WHERE od.order_id = $order_id ";
$resultProducts = mysqli_query($conn, $sqlProducts);

?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="index.php?page=order">Quản lý đơn hàng</a></li>
			<li class="active">Chi tiết</li>
    	</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Chi tiết đơn hàng</h1>
		</div>
	</div><!--/.row-->
	 
        <div class=" col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Thông tin khách hàng</h4>
                </div>
                <?php if ($order): ?>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"> <strong>Tên khách hàng:</strong> <?php echo $order['cus_name'] ?> </li>
                        <li class="list-group-item"> <strong>Địa chỉ:</strong> <?php echo $order['cus_address'] ?></li>
                        <li class="list-group-item"> <strong>Email:</strong> <?php echo $order['cus_mail'] ?></li>
                        <li class="list-group-item"> <strong>Điện thoại:</strong> <?php echo $order['cus_phone'] ?></li>
                    </ul>
                </div>
                <?php else: ?>
                    <div class="alert alert-danger">Không tìm thấy thông tin đơn hàng!</div>
                <?php endif; ?>
            </div>
        </div>
    

		<div class="col-md-12">
            <div class="panel panel-default">
                    <div class="panel-body">
                        <table  data-toolbar="#toolbar"data-toggle="table">
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($resultProducts) > 0){ 
                                    while ($product = mysqli_fetch_assoc($resultProducts)){ ?>
                                <tr>
                                    <td style=""><?php echo $product['id'];  ?></td>
                                    <td style=""><?php echo $product['name'];  ?></td>
                                    <td style="text-align: center"><img width="130" height="180" src="images/<?php echo $product['img'];  ?>" /></td>
                                    <td style=""><?php echo $product['price'];  ?></td>
                                    <td><?php echo $product['qty'];  ?></td>
                                </tr>
                                
                                <?php
										}} else {
										echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu</td></tr>"; }
									?>
                                       
                            </tbody>
                        </table>
                    </div>
            </div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>	
