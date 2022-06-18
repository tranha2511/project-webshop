<?php
    require_once 'helpers/Helper.php';
?>
<div class="top-main">
    <div class="block-title">
        <h2 class="h2-title">BỘ SƯU TẬP MỚI</h2>
    </div>
    <div class="block-colection">
        <?php foreach ($new_products AS $product):
            $slug = Helper::getSlug($product['title']);
            $product_link = "san-pham/$slug/" . $product['id'] . ".html";
            $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
        ?>
            <section class="colection">
                    <figure class="f-clt">
                        <a href="<?php echo $product_link; ?>">
                        <img class="img-clt" src="assets/img/uploads/products/<?php echo $product['avatar'] ?>"
                                alt="<?php echo $product['title'] ?>"/>
                        </a>
                    </figure>
            </section>       
        <?php endforeach; ?>       
    </div>
        <div class="view-more">
            <a href="tat-ca-san-pham.html">Xem thêm</a>
        </div>
        <hr>
</div>
