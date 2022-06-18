<div class="timeline-items container">
    <h2>Giỏ hàng của bạn</h2>
        <?php if (isset($_SESSION['cart'])): ?>
            <form action="" method="post">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th width="20%">Tên sản phẩm</th>
                        <th width="20%">Hình ảnh</th>
                        <th width="10%">Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th width="5%"></th>
                    </tr>
                    <?php
                    $total_cart = 0;
                    foreach ($_SESSION['cart'] AS $id => $cart): ?>
                        <tr>
                            <td>
                                <div class="content-product">
                                    <span class="content-product-a">
                                        <?php echo $cart['name']; ?>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <img class="product-avatar img-responsive"
                                    src="assets/img/uploads/products/<?php echo $cart['avatar'] ?>"
                                    width="150">
                            </td>
                            <td>
                                <!--  cần khéo léo đặt name cho input số lượng,
                                để khi xử lý submit form update lại giỏ hàng sẽ đơn giản hơn    -->
                                <input type="number" min="0"
                                    name="<?php echo $id; ?>"
                                    class="product-amount form-control"
                                    value="<?php echo $cart['quantity']; ?>">
                            </td>
                            <td>
                            <?php echo number_format($cart['price']) ?> vnđ
                            </td>
                            <td>
                            <?php
                            $total_item = $cart['price'] * $cart['quantity'];
                            $total_cart += $total_item;
                            echo number_format($total_item);
                            ?> vnđ
                            </td>
                            <td>
                                <a class="content-product-a"
                                href="xoa-san-pham/<?php echo $id; ?>.html">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="7" style="text-align: right; font-weight: bold">
                            Tổng giá trị đơn hàng:
                            <span class="product-price" style="font-weight: bold; font-size: 20px">
                    <?php echo number_format($total_cart); ?> vnđ
                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="product-payment">
                            <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-primary btn-click">
                            <a href="thanh-toan-don-hang.html" class="btn btn-success btn-click">Đến trang thanh toán</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($this->error)): ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $this->error;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>
            </form>
        <?php endif; ?>
</div>
<!--Timeline items end -->
