<?php 
    $sqlMenu = "SELECT * FROM category ORDER BY cat_id";
    $result = mysqli_query($conn, $sqlMenu);
?>
<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
            <?php if(mysqli_num_rows($result) > 0)  {
                    while($cate = mysqli_fetch_assoc($result)) {
            ?>
                <li class="menu-item"><a href="index.php?page_layout=category&cat_id=<?php echo $cate['cat_id']; ?>"><?php echo $cate['cat_name']; ?></a></li>
            <?php 
                }
            } 
            ?>
        </ul>
    </div>
</nav>