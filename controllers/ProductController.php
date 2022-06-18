<?php
    require_once 'controllers/Controller.php';
    require_once 'models/Product.php';
    require_once 'models/Pagination.php';
    require_once 'models/Category.php';

    class ProductController extends Controller{

        public function show_product(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getAll($str_pagination);
            //lấy danh sách đang có trên hệ thống để phục vụ cho search
            $category_model = new Category();
            $categories = $category_model->getAll();

            // phân trang
            $params = [
                'total' => $product_model->countTotal(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product',
                'full_mode' => FALSE,
            ];
        
            //nếu có truyền tham số page lên trình duyêt - tương đương đang ở tại trang nào, thì gán giá trị đó cho biến $page
            if (isset($_GET['page'])) {
            $page = $_GET['page'];
            }
            //xử lý form tìm kiếm
            if (isset($_GET['name'])) {
            $params['query_additional'] = '&name=' . $_GET['name'];
            }
        
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages
            ]);

            require_once 'views/layouts/main_show.php';
        }

        public function show_new_product(){
            $product_model = new Product();
            $new_products = $product_model->getNewProduct();

            $this->page_title = 'Danh sách sản phẩm mới';
            $this->content = $this->render('views/homes/show_new_product.php', ['products' => $new_products]);
            require_once 'views/layouts/main_show.php';
        }

        //select vest
        public function show_category_product(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getCategory($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotalCate(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_1',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages,
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select quần
        public function show_category_product1(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getCategory1($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotalCate1(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_1',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages,
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select blazer
        public function show_category_product2(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getCategory2($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotalCate2(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_1',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages,
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select thắt lưng
        public function show_category_product3(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getCategory3($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotalCate3(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_1',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages,
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select giầy
        public function show_category_product4(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getCategory4($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotalCate4(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_1',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages,
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select sơ mi
        public function show_category_product5(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getCategory5($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotalCate5(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_1',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages,
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select giá < 2 triệu
        public function show_product_1(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getPrice1($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotal1(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_1',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select giá 2-4 triệu
        public function show_product_2(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getPrice2($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotal2(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_2',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages
            ]);

            require_once 'views/layouts/main_show.php';
        }
        //select giá > 4 triệu
        public function show_product_3(){
            $product_model = new Product();
        
            $str_pagination = '';
            $limit = 12;
            $pages = 1;
            if(isset($_GET['page'])){
            $pages = $_GET['page'];
            }
            $start = ($pages - 1) * $limit;
            $str_pagination = " LIMIT $start, $limit"; 
            $products = $product_model->getPrice3($str_pagination);

            // phân trang
            $params = [
                'total' => $product_model->countTotal3(),
                'limit' => 12,
                'query_string' => 'page',
                'controller' => 'product',
                'action' => 'show_product_3',
                'full_mode' => FALSE,
            ];   
        
            $pagination = new Pagination($params);
            $pages = $pagination->getPagination();
        
            $this->page_title = 'Danh sách sản phẩm';
            $this->content = $this->render('views/products/show_product.php', [
                'products' => $products,
                'pages' => $pages,
            ]);

            require_once 'views/layouts/main_show.php';
        }

        public function show_detail(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = 'ID không hợp lệ';
                $url_redirect = $_SERVER['SCRIPT_NAME'] . '/';
                header("Location: $url_redirect");
                exit();
            }

            $id = $_GET['id'];
            $product_model = new Product();
            $product = $product_model->getById($id);

            $this->page_title = 'Chi tiết sản phẩm';
            $this->content = $this->render('views/products/show_detail.php', ['product' => $product]);

            require_once 'views/layouts/main_show.php';
        }
    }


?>