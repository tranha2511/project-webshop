<?php
    require_once 'models/Model.php';
    
    class Banner extends Model{
        public $id;
        public $title;
        public $img;
        public $created_at;
        public $updated_at;

        public function getAll($params = []){
            $sql_select_all = "SELECT * FROM banners";
            $obj_select_all = $this->connection->prepare($sql_select_all);
            $obj_select_all->execute();
            $banners = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

            return $banners;
        }
    }

?>