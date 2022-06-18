<?php
    require_once 'Controller.php';
    require_once 'models/User.php';
    require_once 'models/Pagination.php';
    require_once 'models/Category.php';

    class UserController extends Controller{
        public function create() {
            $user_model = new User();
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];

                if (empty($username)) {
                    $this->error = 'Username không được để trống';
                } else if (empty($password)) {
                    $this->error = 'Password không được để trống';
                } else if (empty($password_confirm)) {
                    $this->error = 'Password confirm không được để trống';
                } else if ($password != $password_confirm) {
                    $this->error = 'Password confirm chưa đúng';
                } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->error = 'Email không đúng định dạng';
                } else if ($_FILES['avatar']['error'] == 0) {
                    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                    if (!in_array($extension, $allow_extensions)) {
                        $this->error = 'Phải upload avatar dạng ảnh';
                    }
                }
    
                if (empty($this->error)) {
                    $filename = '';

                    if ($_FILES['avatar']['error'] == 0) {
                        $dir_uploads = 'assets/img/uploads/users';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
    
                        $filename = time() . '-user-' . $_FILES['avatar']['name'];
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                    }
                    $user_model->username = $username;
                    $user_model->password = md5($password);
                    $user_model->first_name = $first_name;
                    $user_model->last_name = $last_name;
                    $user_model->phone = $phone;
                    $user_model->address = $address;
                    $user_model->email = $email;
                    $user_model->avatar = $filename;
                    $is_insert = $user_model->insert();
                    if ($is_insert) {
                        $_SESSION['success'] = 'Insert dữ liệu thành công';
                    } else {
                        $_SESSION['error'] = 'Insert dữ liệu thất bại';
                    }
                    header('Location: index.php?controller=user');
                    exit();
                }
            }
            
            $this->page_title = 'Thêm mới người dùng';
            $this->content = $this->render('views/users/create.php');
    
            require_once 'views/layouts/main.php';
        }

        public function logout() {
            $_SESSION = [];
            session_destroy();
            $_SESSION['success'] = 'Logout thành công';
            header('Location: index.php?controller=login&action=login');
           exit();
        }

    }

?>