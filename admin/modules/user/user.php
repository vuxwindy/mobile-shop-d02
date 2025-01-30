<?php
include_once "../config/connectDB.php";

// Lấy dữ liệu từ bảng users
$sql_users = "SELECT * FROM user ORDER BY user_id ASC";
$result = mysqli_query($conn, $sql_users);


?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div><!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
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
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['user_full']; ?></td>
                                <td><?php echo $row['user_mail']; ?></td>
                            
                                <td>
                                    <?php if($row['user_level'] == 1) { ?>
                                        <span class="label label-warning">Admin</span>
                                    <?php } else { ?> 
                                        <span class="label label-danger">Member</span>
                                    <?php } ?>
                                   
                                    </td>
                                <td class="form-group">
                                    <a href="index.php?page=edit_user&user_id=<?php echo $row['user_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="modules/user/del_user.php?user_id=<?php echo $row['user_id']; ?>" onclick="return confirmDel();"  class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu</td></tr>"; }
                            ?>
                          
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div><!--/.row-->
</div> <!--/.main-->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<script>
    function confirmDel() {
        return confirm("Bạn có chắc chắn xóa?");
    }
</script>