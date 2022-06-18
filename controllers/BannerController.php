<?php   
    require_once 'controllers/Controller.php';
    require_once 'models/Pagination.php';
    require_once 'models/Banner.php';

    class BannerController extends Controller{
        public function show_banner(){
            $banner_model = new Banner();

            $banners = $banner_model->getAll();

            $this->content = $this->render('views/homes/show_banner.php', ['banners' => $banners]);
            require_once 'views/layouts/main_show.php';
        }



    }
?>