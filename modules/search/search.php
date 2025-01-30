<?php
$rowPerPage = 3;
$keyword = "";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
$arr_keyword = explode(" ", $keyword); //iphone xs => ['iphone', 'xs']
$str_keyword = '%' . implode("%", $arr_keyword) . '%'; //%iphone%xs%

$sqlSearch = "SELECT * FROM product WHERE prd_name LIKE '$str_keyword'";
$query = mysqli_query($conn, $sqlSearch);
$totalRecords = mysqli_num_rows($query); //số bản ghi lấy được.
//Tổng số trang
$totalPage = ceil($totalRecords / $rowPerPage);

//lấy trang hiện tại từ đường dẫn.
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if ($page < 1) {
    $page = 1;
}

if ($page > $totalPage) {
    $page = $totalPage;
}
// SELECT * FROM table_name LIMIT $start,$rowPerPage;
$start = ($page - 1) * $rowPerPage;
$sql_pagination = "SELECT * FROM product WHERE prd_name LIKE '$str_keyword' LIMIT $start,$rowPerPage";
$resultPagination = mysqli_query($conn, $sql_pagination);
?>

<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm: <span style="font-weight: bold;"><?php echo $keyword; ?></span></div>
    <div class="product-list row">
        <?php
        if (mysqli_num_rows($resultPagination)) {
            while ($prd = mysqli_fetch_assoc($resultPagination)) {
        ?>

                <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                    <div class="product-item card text-center">
                        <a href="index.php?page_layout=product&prd_id=<?php echo $prd['prd_id']; ?>">
                            <img src="admin/images/<?php echo $prd['prd_image']; ?>">
                        </a>
                        <h4>
                            <a href="index.php?page_layout=product&prd_id=<?php echo $prd['prd_id']; ?>">
                                <?php echo $prd['prd_name']; ?>
                            </a>
                        </h4>
                        <p>Giá Bán: <span><?php echo number_format($prd['prd_price'], 0, ',', '.'); ?>đ</span></p>
                    </div>
                </div>

        <?php
            }
        } else {
            echo "Không có sản phẩm nào được tìm thấy!";
        }
        ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <!-- Hiển thị nút trở về trang trước -->
        <?php if ($page > 1) { ?>
            <li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&page=<?php echo $page - 1; ?>">Trang trước</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a class="page-link" href="">Trang trước</a></li>
        <?php } ?>

        <!-- Page menu item -->
        <?php for ($i = 1; $i <= $totalPage; $i++) {
            if ($i > $page - 3 && $i < $page + 3) {
                if ($i == $page) {
        ?>
                    <li class="page-item active"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

        <?php
                }
            }
        }
        ?>

        <!-- Hiển thị nút next trang -->
        <?php if ($page < $totalPage) { ?>
            <li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&page=<?php echo $page + 1; ?>">Trang sau</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a class="page-link disabled" href="">Trang sau</a></li>
        <?php } ?>
    </ul>
</div>