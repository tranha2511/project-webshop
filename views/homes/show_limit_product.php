<?php 
    require_once 'helpers/Helper.php';
?>
<div class="block-title">
    <h2 class="h2-title">SẢN PHẨM</h2>
</div>
        <div class="block-search">
            <form class="form-search">
                <input type="text" name="title" placeholder="Tìm kiếm..." class="search" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>">
                <input type="hidden" name="controller" value="product"/>
                <input type="hidden" name="action" value="show_product"/>
                <button type="submit" class="fa-solid fa-magnifying-glass btn-search"></button>
            </form>
        </div>
            <div class="block-filter-price">
                <div class="filter-price">
                    <p class="filter-price-p">Giá: </p>
                    <select id="filter-price-select" name="price" onchange="javascript:handleSelect(this)">
                        <option value="tat-ca-san-pham.html">Mặc định</option>
                        <option value="san-pham-duoi-2-trieu.html">Dưới 2 triệu</option>
                        <option value="san-pham-tu-2-4-trieu.html">Từ 2-4 triệu</option>
                        <option value="san-pham-tren-4-trieu.html">Trên 4 triệu</option>
                    </select> 
                </div>      
            </div>
    <div class="block-product">
            <?php foreach ($products AS $product):
                $slug = Helper::getSlug($product['title']);
                $product_link = "san-pham/$slug/" . $product['id'] . ".html";
                $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
            ?>
                <div class="product-child">
                    <div class="item">
                        <div class="product-img">
                            <figure class="f-product">
                                <a href="<?php echo $product_link; ?>">
                                    <img class="img-item" src="assets/img/uploads/products/<?php echo $product['avatar'] ?>"
                                alt="<?php echo $product['title'] ?>"/>
                                </a>
                            </figure>
                        </div>
                        <div class="product-infor">
                            <span class="brand"><?php echo $product['category_name'] ?></span></span>
                                <h3 class="product-name">
                                    <a href="<?php echo $product_link; ?>" class="product-name-a" title=""><?php echo $product['title'] ?> </a>
                                </h3>
                            <div class="price-box">
                                <span class="price"><?php echo number_format($product['price']) ?>₫</span>
                            </div>
                            <div class="plus-item">
                                <span class="add-to-cart" data-id="<?php echo $product['id'] ?>">
                                    <a href="<?php echo $product_cart_add ?>" class="plus-add-icon"><i class ="fa-solid fa-cart-plus cart-plus cart-plus"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="view-more" style="margin-top: 30px">
            <a href="tat-ca-san-pham.html">Xem thêm</a>
        </div>
        <script type="text/javascript"> 
        function handleSelect(elm) 
        { 
        window.location = elm.value; 
        } 
        </script>