<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller{
    public function add() {
        $product_id = $_GET['product_id'];

        $product_model = new Product();
        $product = $product_model->getById($product_id);
        $cart_item = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart_item;
        } else {
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                $_SESSION['cart'][$product_id] = $cart_item;
            }
        }
    }

    public function index() {
        if (isset($_POST['submit'])) {
            foreach ($_SESSION['cart'] AS $id => $cart){
                if($_POST[$id] < 0){
                    $_SESSION['error'] = 'Số lượng nhập vào phải lớn hơn 0';
                    header('Location: index.php?controller=cart');
                    exit();
                }
            }
            foreach ($_SESSION['cart'] AS $id => $cart) {

                $_SESSION['cart'][$id]['quantity'] = $_POST[$id];
            }

            $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
        }

        $this->page_title = 'Giỏ hàng của bạn';
        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main_show.php';
    }

    public function delete(){
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);

        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        $_SESSION['success'] = "Xóa sản phẩm $product_id thành công";
        header("Location: gio-hang-cua-ban.html");
        exit();
    }
}
