<?php 
    
    if(isset($_GET['prd_id'])) {
        $prd_id = $_GET['prd_id'];
        $sqlComment = "SELECT * FROM comment WHERE prd_id=$prd_id";
        $resultComment = mysqli_query($conn, $sqlComment);
    }
?>
<div id="comments-list" class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?php
            if(mysqli_num_rows($resultComment) > 0) {
                while ($productComment = mysqli_fetch_assoc($resultComment)) {
        ?>
            <div class="comment-item">
                <ul>
                    <li><b><?php echo $productComment['comm_name']; ?></b></li>
                    <li><?php echo date("d-m-Y H:i:s",strtotime($productComment['comm_date'])); ?></li>
                    <li>
                        <p><?php echo $productComment['comm_details']; ?></p>
                    </li>
                </ul>
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>