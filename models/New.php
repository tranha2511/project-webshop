<?php
    require_once 'models/Model.php';

    class News extends Model{
        public $id;
        public $avatar;
        public $title;
        public $content;
        public $created_at;
        public $updated_at;

        public function getAll($params = []){      
            $sql_select_all ="SELECT * FROM news";
            $obj_select_all = $this->connection->prepare($sql_select_all);
            $obj_select_all->execute();
            $news = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

            return $news;
        }

        public function getLimit(){
            $obj_select_limit = $this->connection->prepare("SELECT * FROM news LIMIT 3");
            $arr_select_limit = [];
            $obj_select_limit->execute($arr_select_limit);
            $news = $obj_select_limit->fetchAll(PDO::FETCH_ASSOC);

            return $news;
        }

        public function countTotal(){
            $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news");
            $obj_select->execute();

            return $obj_select->fetchColumn();
        }

        public function getById($id){
            $sql_select_one = "SELECT * FROM news WHERE id = $id";
            $obj_select_one = $this->connection->prepare($sql_select_one);
            $obj_select_one->execute();
            $new = $obj_select_one->fetch(PDO::FETCH_ASSOC);

            return $new;
        }

        public function getAllPagination($params = []){
            $limit = $params['limit'];
            $page = $params['page'];
            $start = ($page -1) * $limit;

            $obj_select = $this->connection->prepare("SELECT * FROM news LIMIT $start, $limit");
            $obj_select->execute();
            $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);

            return $news;
        }




    }


?>