<?php
require_once 'models/Model.php';

  class Product extends Model{
    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $price;
    public $amount;
    public $size;
    public $description;
    public $status;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $created_at;
    public $update_at;

    public $str_search;

    public function __construct(){
      parent::__construct();
      if(isset($_GET['title']) && !empty($_GET['title'])){
        $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%' "; 
      }
      if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
        $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
      }
    }

    public function getLimit(){
      $obj_select_limit = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id LIMIT 8");
      $arr_select_limit = [];
      $obj_select_limit->execute($arr_select_limit);
      $products = $obj_select_limit->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }

    public function getNewProduct(){
      $obj_select_new_product = $this->connection->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT 4 ");
      $arr_select = [];
      $obj_select_new_product->execute($arr_select);
      $new_products = $obj_select_new_product->fetchAll(PDO::FETCH_ASSOC);

      return $new_products;
    }

    public function getAll($str_pagination = ''){
      $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products
                INNER JOIN categories ON categories.id = products.category_id
                WHERE TRUE $this->str_search
                ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }

    //select vest
    public function getCategory($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.category_id = 1 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
    //select qu???n
    public function getCategory1($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.category_id = 18 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
    //select blazer
    public function getCategory2($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.category_id = 19 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
    //select th???t l??ng
    public function getCategory3($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.category_id = 20 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
    //select gi??y
    public function getCategory4($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.category_id = 21 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
    //select s?? mi
    public function getCategory5($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.category_id = 22 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }

    //select gi?? < 2 tri???u
    public function getPrice1($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.price < 2000000 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
    //select gi?? 2-4 tri???u
    public function getPrice2($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.price > 2000000 AND products.price < 4000000 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
    //select gi?? > 4 tri???u
    public function getPrice3($str_pagination = ''){
      $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products
      INNER JOIN categories ON categories.id = products.category_id WHERE products.price > 4000000 ORDER BY products.created_at DESC $str_pagination ");
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }

    public function getAllPagination($arr_params){
      $limit = $arr_params['limit'];
      $page = $arr_params['page'];
      $start = ($page -1) * $limit;
      $obj_select = $this->connection
          ->prepare("SELECT products.*, categories.name AS category_name FROM products
                      INNER JOIN categories ON categories.id = products.category_id
                      WHERE TRUE $this->$str_search
                      ORDER BY products.update_at DESC, products.created_at DESC
                      LIMIT $start, $limit");
      
      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }

    //?????m b???n ghi danh m???c vest
    public function countTotalCate(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE category_id = 1");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi danh m???c qu???n
    public function countTotalCate1(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE category_id = 18");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi danh m???c blazer
    public function countTotalCate2(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE category_id = 19");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi danh m???c th???t l??ng
    public function countTotalCate3(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE category_id = 20");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi danh m???c gi??y
    public function countTotalCate4(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE category_id = 21");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi danh m???c s?? mi
    public function countTotalCate5(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE category_id = 22");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi t???t c??? sp
    public function countTotal(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi sp gi?? < 2 tri???u
    public function countTotal1(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE price < 2000000");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi sp gi?? 2-4 tri???u
    public function countTotal2(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE price > 2000000 AND price < 4000000");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }
    //?????m b???n ghi sp gi?? > 4 tri???u
    public function countTotal3(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE price >= 4000000");
      $obj_select->execute();

      return $obj_select->fetchColumn();
    }

    public function getById($id){
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");

        $obj_select->execute();
        $product =  $obj_select->fetch(PDO::FETCH_ASSOC);
        
        return $product;  
    }
  }
