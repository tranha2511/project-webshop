<?php
    require_once 'models/Model.php';

    class Category extends Model{

        public $id;
        public $name;
        public $description;
        public $status;
        public $created_at;
        public $update_at;


        public function getAll($params = []){
            $str_search = 'WHERE TRUE';

            // check mảng params truyền vào để thay đổi lại chuỗi search
            if(isset($params['name']) && !empty($params['name'])){
                $name = $params['name'];
                $str_search .= " AND `name` LIKE '%$name%'";
            }
            if(isset($params['status'])){
                $status = $params['status'];
                $str_search .= " AND `status` = $status";
            }

            $sql_select_all = "SELECT * FROM categories $str_search";
            $obj_select_all = $this->connection->prepare($sql_select_all);
            $obj_select_all->execute();
            $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
            
            return $categories;
        }

        public function countTotal(){
            $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM categories");
            $obj_select->execute();

            return $obj_select->fetchColumn();
        }

        public function getById($id){
            $sql_select_one = "SELECT * FROM categories WHERE id = $id";
            $obj_select_one = $this->connection
              ->prepare($sql_select_one);
            $obj_select_one->execute();
            $category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
            return $category;
        }

        public function getCategoryById($id){
            $obj_select = $this->connection
            ->prepare("SELECT * FROM categories WHERE id = $id");
            $obj_select->execute();
            $category = $obj_select->fetch(PDO::FETCH_ASSOC);

            return $category;
        }

        public function getAllPagination($params = []){
            $limit = $params['limit'];
            $page =  $params['page'];
            $start = ($page -1) * $limit;

            $obj_select = $this->connection->prepare("SELECT * FROM categories LIMIT $start, $limit");
            
            $obj_select->execute();
            $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

            return $categories;
        }
    }


?>