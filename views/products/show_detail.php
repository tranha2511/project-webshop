<?php 
    require_once 'helpers/Helper.php';
?>
<div class="detail-product">
                <?php $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html"; ?>
            <div class="detail-product-left">
                <div class="detail-img">
                    <a href="#" class="detail-img-a">
                            <img src="assets/img/uploads/products/<?php echo $product['avatar'] ?>"/>
                    </a>
                </div>
            </div>
            <div class="detail-product-right">
                <h2 class="detail-title-product"><?php echo $product['title'] ?></h2>
                <p class="detail-brand"><?php echo $product['category_name']?></p>
                <div class="detail-price">
                    <span class="right-text"></span><span class="detail-price-span"><?php echo number_format($product['price']) ?></</span>
                </div>
                <div class="detail-amount">
                    <span class="right-text">Kho: </span><span class="detail-amount-span"><?php echo number_format($product['amount']) ?></span>
                </div>  
                <div class="detail-des">
                    <span class="detail-des-span"><?php echo $product['description'] ?></span>
                </div>
                <div class="seo-title">
                    <span><?php echo $product['seo_title'] ?></span>
                </div>
                <div class="seo-keywords">
                    <span><?php echo $product['seo_keywords'] ?></span>
                </div>
                <div class="seo-des">
                    <span><?php echo $product['seo_description'] ?></span>
                </div>
                <div class="buy-add">
                    <div class="detail-buy">
                        <span data-id="<?php echo $product['id'] ?>" class="add-to-cart">
                            <a href="<?php echo $product_cart_add ?>" class="detail-buy-a" onclick="return confirm('Đã thêm vào giỏ hàng!')">Thêm vào giỏ hàng</a>
                        </span>
                    </div>
                </div>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
