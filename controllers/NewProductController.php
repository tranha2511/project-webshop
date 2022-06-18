<?php
    require_once 'controllers/Controller.php';
    require_once 'models/Product.php';
    require_once 'models/Pagination.php';
    require_once 'models/Category.php';

    class NewProductController extends Controller{
        public function show_new_product(){
            $product_model = new Product();
            $new_products = $product_model->getNewProduct();

            $this->content = $this->render('views/homes/show_new_product.php', ['products' => $new_products]);
            require_once 'views/layouts/main_show.php';
        }



    }


?>