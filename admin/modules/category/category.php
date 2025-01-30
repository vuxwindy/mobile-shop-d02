<?php
include_once "../config/connectDB.php";

// Lấy dữ liệu từ bảng users
$sql_category = "SELECT * FROM category ORDER BY cat_id ASC";
$result = mysqli_query($conn, $sql_category);


?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Quản lý danh mục</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div><!--/.row-->
	<div id="toolbar" class="btn-group">
		<a href="index.php?page=add_category" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> Thêm danh mục
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
										<th>Tên danh mục</th>
										<th>Hành động</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if (mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
								?>
 
									<tr>
										<td style=""> <?php echo $row['cat_id']; ?> </td>
										<td style=""> <?php echo $row['cat_name']; ?> </td>
										<td class="form-group">
											<a href="index.php?page=edit_category&cat_id=<?php echo $row['cat_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
											<a onclick="return confirmDel();" href="modules/category/del_category.php?cat_id=<?php echo $row['cat_id']; ?>" 
											class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
												
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