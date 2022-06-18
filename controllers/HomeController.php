<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Pagination.php';
require_once 'models/Category.php';
require_once 'models/New.php';
require_once 'models/Banner.php';

class HomeController extends Controller {
  public function index() {
    $banner_model = new Banner();
    $banners = $banner_model->getAll();

    $product_model = new Product();

    $new_products = $product_model->getNewProduct();

    $products = $product_model->getLimit();

    $new_model = new News();

    $news = $new_model->getLimit();

    $this->page_title = 'TrnHa Store';
    $this->content = $this->render('views/homes/index.php', [
      'banners' => $banners,
      'new_products' => $new_products,
      'products' => $products,
      'news' => $news,
    ]);
    require_once 'views/layouts/main.php';
  }

  public  function introduce(){

    $this->page_title = 'TrnHa Store';
    $this->content = $this->render('views/homes/introduce.php');

    require_once 'views/layouts/main_show.php';
  }
}