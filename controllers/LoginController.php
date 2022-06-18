<?php
    require_once 'helpers/Helper.php';
    require_once 'models/User.php';

    class LoginController{
        public $content;

        public $error;

        public function render($file, $variables = []){
            extract($variables);
            ob_start();

            require_once $file;

            $render_view = ob_get_clean();

            return $render_view;
        }

        public function login(){
            if(isset($_SESSION['user'])){
                header('Location: danh-muc-san-pham.html');
                exit();
            }
            
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                if(empty($username)){
                    $this->error = 'Tài khoản không được để trống';
                }else if(empty($password)){
                    $this->error = 'Hãy nhập mật khẩu';
                }
                $user_model = new User();
                if(empty($this->error)){
                    $user = $user_model->getUser($username);
                    if(empty($user)){
                        $this->error = 'Tài khoản không tồn tại';
                    }else{
                        $is_same_password = password_verify($password, $user['password']);
                        if($is_same_password){
                            $_SESSION['success'] = 'Đăng nhập thành công';

                            $_SESSION['user'] = $user;
                            header('Location: danh-sach-san-pham.html');
                            exit();
                        }else{
                            $this->error = 'Sai tài khoản hoặc mật khẩu';
                        }
                    }
                }
            }

            $this->page_title = 'Đăng nhập';
            $this->content = $this->render('views/users/login.php');
            require_once 'views/layouts/main_login.php';
        }

        public function register(){

            if (isset($_POST['submit'])) {
            $user_model = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $user = $user_model->getUserByUsername($username);
            //check validate
            if (empty($username) || empty($password) || empty($password_confirm)) {
                $this->error = 'Hãy nhập tài khoản và mật khẩu';
            } else if ($password != $password_confirm) {
                $this->error = 'Mật khẩu nhập lại chưa đúng';
            } else if (!empty($user)) {
                $this->error = 'Tài khoản này đã tồn tại';
            }
            //xử lý lưu dữ liệu khi không có lỗi
            if (empty($this->error)) {
                $password_encrypt =
                password_hash($password, PASSWORD_BCRYPT);
                $user_model->username = $username;
                $user_model->password = $password_encrypt;
                $is_insert = $user_model->register();
                if ($is_insert) {
                $_SESSION['success'] = 'Đăng ký thành công';
                header('Location: dang-nhap.html');
                exit();
                }
            }
            }

            $this->page_title = 'Đăng ký';
            $this->content = $this->render('views/users/register.php');
            require_once 'views/layouts/main_login.php';
        }

        public function resetPassword() {
            if (isset($_POST['submit'])) {
                $email = $_POST['username'];
                if (empty($this->error)) {
                    $user_model = new User();
                    $user = $user_model->getUser($email);
                    if (empty($user)) {
                        $this->error = 'Không tồn tại user nào gắn với email này';
                    } else {
                        $reset_password_token = md5($email); //
                        $is_update = $user_model->updateResetPasswordToken($user['id'], $reset_password_token);
                        if ($is_update) {

                            $url_reset_password = "http://localhost/PHP0721E_HDT/project/backend/index.php?controller=login&action=checkLinkReset&hash=$reset_password_token";

                            $subject = 'Thông báo từ TrnHa Store - Thiết lập lại mật khẩu';
                            $to = $email;
                            $body = "Bạn hãy click vào <a href='$url_reset_password'>đây</a> để thiết lập lại mật khẩu nhé!";
                            Helper::sendMail($subject, $to, $body);
                            $_SESSION['success'] = 'Vui lòng kiểm tra email để thiết lập lại mật khẩu';
                            header('Location: index.php?controller=login&action=resetPassword');
                            exit();
                        }
                    }
                }
            }
      
            $this->page_title = 'Quên mật khẩu';
            $this->content = $this->render('views/users/reset_password.php');
            require_once 'views/layouts/main_login.php';
        }

        public function checkLinkReset(){
            if(isset($_POST['submit'])){
                $hash = $_GET['hash'];
                if(empty($hash)){
                    $_SESSION['error'] = 'Mã hash không hợp lệ';
                    header('Location: index.php?controller=login&action=login');
                    exit();
                }

                $user_model = new User();
                $user = $user_model->getUserResetPasswordToken($hash);
                if(empty($user)){
                    $this->error ='Không tìm thấy user nào ứng với mã hash này';
                }else{
                    $password = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];
                    // Validate:
                    if ($password != $password_confirm) {
                        $this->error = 'Mật khẩu chưa trùng nhau';
                    }
                    if (empty($this->error)) {
                        $password_hash = password_hash($password, PASSWORD_BCRYPT);
                        $is_update = $user_model->updatePasswordReset($user['id'], $password_hash);
                        if ($is_update) {
                            $_SESSION['success'] = 'Đổi mật khẩu thành công';
                            header('Location: index.php?controller=login&action=login');
                            exit();
                        }
                        $this->error = 'Không thể đổi mật khẩu vì có lỗi gì đó';
                    }
                }
            }

            $this->page_title = 'Quên mật khẩu';
            $this->content = $this->render('views/users/check_link_reset.php');
            require_once 'views/layouts/main_login.php';
        }

    }
?>