<?php 
    $sqlLasted = "SELECT * FROM product ORDER BY prd_id DESC LIMIT 6";
    $resultLasted = mysqli_query($conn, $sqlLasted);

?>
<div class="products">
    <h3>Sản phẩm mới</h3>
    <div class="product-list row">
            <?php
            if(mysqli_num_rows($resultLasted)) {
                while($prd_lasted = mysqli_fetch_assoc($resultLasted)) {
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $prd_lasted['prd_id']; ?>"><img src="admin/images/<?php echo $prd_lasted['prd_image']; ?>"></a>
                    <h4><a href="index.php?page_layout=product&prd_id=<?php echo $prd_lasted['prd_id']; ?>"><?php echo $prd_lasted['prd_name']; ?></a></h4>
                    <p>Giá Bán: <span><?php echo number_format($prd_lasted['prd_price'],0,",","."); ?>đ</span></p>
                </div>
            </div>
            <?php 
                    }
                }
            
            ?>
    </div>
</div>