<?php
include_once "../config/connectDB.php";

$sql_orders = "SELECT * FROM orders WHERE status = 1";
$result = mysqli_query($conn, $sql_orders);


?>




<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Quản lý đơn hàng</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý đơn hàng</h1>
		</div>
	</div><!--/.row-->
	<div id="toolbar" class="btn-group">
		<a href="index.php?page=order_processed" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> Đơn đã hoàn thành
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
				<div class="panel panel-default">
						<div class="panel-body">
							<table 
								data-toolbar="#toolbar"
								data-toggle="table"
								data-search="true"
								data-pagination="true">
								<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên khách hàng</th>
										<th>Email</th>
										<th>Số điện thoại</th>
										<th>Địa chỉ</th>
										<th>Tổng tiền</th>
										<th>Hành động</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result)) {
									?>
									<tr> 
										<td style=""><?php echo $row['order_id']; ?></td>
										<td style=""><?php echo $row['cus_name']; ?></td>
										<td style=""><?php echo $row['cus_mail']; ?></td>
										<td style=""><?php echo $row['cus_phone']; ?></td>
										<td style=""><?php echo $row['cus_address']; ?></td>
<<<<<<< HEAD
										<td style=""><?php echo $row['total_price']; ?></td>
=======
										<td style=""><<?php echo number_format($row['total_price'],0,",","."); ?>đ</td>
>>>>>>> a7fd777 (Mô tả ngắn về thay đổi)
										<td class="form-group">
											<a href="index.php?page=order_detail&order_id=<?php echo $row['order_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
											<a href="index.php?page=edit_order&order_id= <?php echo $row['order_id'];?> " class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
											<a onclick="return confirmDel();" href="modules/orders/del_order.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
<<<<<<< HEAD
											<a href="modules/orders/approve_order.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-success" > <i class="glyphicon glyphicon-ok"></i> Duyệt</a>
=======
											<a href="index.php?page=approve_order&order_id=<?php echo $row['order_id']; ?>" class="btn btn-success" > <i class="glyphicon glyphicon-ok"></i> Duyệt</a>
>>>>>>> a7fd777 (Mô tả ngắn về thay đổi)
										</td>
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
<script>
    function confirmDel() {
        return confirm("Bạn có chắc chắn xóa?");
    }
</script>