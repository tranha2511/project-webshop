<?php
    require_once 'controllers/Controller.php';
    require_once 'models/New.php';
    require_once 'models/Pagination.php';

    class NewController extends Controller{

        public function show_detail(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = 'ID không hợp lệ';
                $url_redirect = $_SERVER['SCRIPT_NAME'] . '/';
                header("Location: $url_redirect");
                exit();
            }

            $id = $_GET['id'];
            $new_model = new News();
            $new = $new_model->getById($id);

            $this->page_title = 'Chi tiết tin tức';
            $this->content = $this->render('views/news/show_detail.php', ['new' => $new]);

            require_once 'views/layouts/main_show.php';
        }

        public function show_all(){
            $new_model = new News();

            $news = $new_model->getAll();

            $this->page_title = 'Danh sách tin tức';
            $this->content = $this->render('views/news/show_all.php', ['news' => $news]);
            require_once 'views/layouts/main_show.php';
        }

    }



?>