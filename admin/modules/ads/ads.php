
<?php
include_once "../config/connectDB.php";

$sql_ads = "SELECT * FROM ads";
$result = mysqli_query($conn, $sql_ads);
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Quản lý quản cáo</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý quảng cáo</h1>
		</div>
	</div><!--/.row-->
	
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
										<th>Nội dung</th>
										<th>Chi phí</th>
										<th>Trạng thái</th>
										<th>Hành động</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result)) {
									?>
									<tr> 
                                        <td style=""><?php echo $row['ads_id']; ?></td>
										<td style=""><?php echo $row['ads_name']; ?></td>
										<td style=""><?php echo $row['ads_mail']; ?></td>
										<td style=""><?php echo $row['ads_detali']; ?></td>
										<td style=""><?php echo number_format($row['price'],0,",","."); ?>đ</td>
										<td>
                                    <?php if($row['status'] == 0) { ?>
                                        <span class="label label-warning">Hidden</span>
                                    <?php } else { ?> 
                                        <span class="label label-danger">Show</span>
                                    <?php } ?>
                                   
                                    </td>
										<td class="form-group">
											<a onclick="return confirmDel();" href="modules/ads/del_ads.php?ads_id=<?php echo $row['ads_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
											<a href="modules/ads/approve_ads.php?ads_id=<?php echo $row['ads_id']; ?>" class="btn btn-success" > <i class="glyphicon glyphicon-ok"></i>Show</a>
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