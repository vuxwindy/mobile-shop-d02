<?php 
    if(isset($_GET['prd_id'])) {
        $prd_id = $_GET['prd_id'];
        $sql = "SELECT * FROM product WHERE prd_id=$prd_id";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
    }else{
        header("location: index.php");
    }
?>
<!--	List Product	-->
<div id="product">
<div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/images/<?php echo $product['prd_image']; ?>" width="200px" height="300px">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $product['prd_name']; ?></h1>
            <ul>
                <li><span>Bảo hành:</span> <?php echo $product['prd_warranty']; ?></li>
                <li><span>Đi kèm:</span> <?php echo $product['prd_accessories']; ?></li>
                <li><span>Tình trạng:</span> <?php echo $product['prd_new']; ?></li>
                <li><span>Khuyến Mại:</span> <?php echo $product['prd_promotion']; ?></li>
                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?php echo number_format($product['prd_price'],0,",","."); ?>đ</li>
                <li id="status">
                    <?php
                        if($product['prd_status'] == 1) {
                            echo '<span style="color: green;">Còn hàng</span>';
                        }else{
                            echo '<span style="color: red;">Hết hàng</span>';
                        }
                    ?>
                </li>
            </ul>
            <div id="add-cart"><a href="modules/cart/process-cart.php?action=add&prd_id=<?php echo $product['prd_id']; ?>">Mua ngay</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về <?php echo $product['prd_name']; ?></h3>
            <?php echo $product['prd_details']; ?>
        </div>
    </div>

    <!--	Comments List	-->
    <?php include_once "modules/comment/comment.php";?>
    <?php include_once "modules/comment/list_comment.php";?>
     
 
</div>
