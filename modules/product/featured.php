<?php 
    $sqlFeatured = "SELECT * FROM product WHERE prd_featured = 1 LIMIT 6";
    $resultFeatured = mysqli_query($conn, $sqlFeatured);

?>

<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <div class="product-list row">
        <?php
            if(mysqli_num_rows($resultFeatured)) {
                while($prd_featured = mysqli_fetch_assoc($resultFeatured)) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $prd_featured['prd_id']; ?>"><img src="admin/images/<?php echo $prd_featured['prd_image']; ?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $prd_featured['prd_id']; ?>"><?php echo $prd_featured['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($prd_featured['prd_price'],0,",","."); ?>đ</span></p>
            </div>
        </div>
        <?php 
                }
            }
        
        ?>
    </div>
</div>