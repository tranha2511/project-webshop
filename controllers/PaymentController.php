<?php
    require_once 'controllers/Controller.php';
    require_once 'models/Order.php';
    require_once 'models/OrderDetail.php';
    require_once 'libraries/PHPMailer/src/PHPMailer.php';
    require_once 'libraries/PHPMailer/src/SMTP.php';
    require_once 'libraries/PHPMailer/src/Exception.php';

    class PaymentController extends Controller{
        public function index(){
            if(isset($_POST['submit'])){
                $fullname = $_POST['fullname'];
                $address = $_POST['address'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $note = $_POST['note'];
                $method = $_POST['method']; //phương thức thanh toán

                if(empty($fullname)){
                    $this->error = 'Hãy nhập tên của bạn';
                }else if(empty($address)){
                    $this->errror ='Hãy nhập địa chỉ nhận hàng';
                }else if(empty($mobile)){
                    $this->error = 'Hãy nhập số điện thoại nhận hàng';
                }else if(empty($email)){
                    $this->error = 'Hãy nhập email của bạn';
                }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $this->error = 'Email sai định dạng';
                }

                if(empty($this->error)){

                    //Lưu thông tin thanh toán
                    $order_model = new Order();

                    $price_total = 0;
                    foreach($_SESSION['cart'] AS $cart){
                        $price_total += $cart['price'] * $cart['quantity'];
                    }
                    $params = [
                        'fullname' => $fullname,
                        'address' => $address,
                        'mobile' => $mobile,
                        'email' => $email,
                        'note' => $note,
                        'price_total' => $price_total,
                        'payment_status' => 0 //mặc định là chưa thanh toán
                    ];
                    $order_id = $order_model->insert($params);

                    //Lưu thông tin chi tiết đơn hàng
                    $order_detail_model = new OrderDetail();
                    foreach($_SESSION['cart'] AS $cart){
                        $params = [
                            'order_id' => $order_id,
                            'product_name' => $cart['name'],
                            'product_price' => $cart['price'],
                            'quantity' => $cart['quantity'],
                        ];
                        $is_insert = $order_detail_model->insertOrderDetail($params);
                    }

                    if($method == 0){
                        $_SESSION['infor'] = [
                            'price_total' => $price_total,
                            'fullname' => $fullname,
                            'email' => $email,
                            'mobile' => $mobile,
                        ];
                        header('Location: thanh-toan-online.html');
                        exit();
                    }else{
                        header('Location: thank-you.html');
                        exit();
                    }
                }
            }

            $this->page_title = 'Trang thanh toán';
            $this->content = $this->render('views/payments/index.php');
            require_once 'views/layouts/main_show.php';
        }

        public function online(){
            $this->page_title = 'Trang thanh toán online';
            $this->content = $this->render('libraries/nganluong/index.php');

            echo $this->content;
        }

        public function thank(){
            $this->page_title = 'Trang cảm ơn';
            $this->content = $this->render('views/payments/thank.php');

            require_once 'views/layouts/main_show.php';
        }
    }



?>