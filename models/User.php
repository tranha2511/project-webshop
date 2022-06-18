<?php
    require_once 'models/Model.php';

    class User extends Model{
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $phone;
        public $address;
        public $email;
        public $avatar;
        public $created_at;
        public $update_at;

        public $str_search;

        public function __construct(){
            parent::__construct();
            if(isset($_GET['username']) && !empty($_GET['username'])){
                $usernam  = addcslashes($_GET['username']);
                $this->$str_search .= "AND user.username LIKE '%$username%' ";
            }
        }

        public function getAll(){
            $obj_select = $this->connection->prepare("SELECT * FROm users ORDER BY update_at DESC");
            $obj_select->execute();
            $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        }

        public function getUser($username){
            $sql_select_one = "SELECT * FROM users WHERE username = :username";
            $obj_select_one = $this->connection->prepare($sql_select_one);
            $selects = [
                ':username' => $username
            ];
            $obj_select_one->execute($selects);
            $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);

            return $user;
        }

        public function getById($id){
            $sql_select_one = "SELECT * FROM users WHERE id = $id";
            $obj_select_one = $this->connection->prepare($sql_select_one);
            $obj_select_one->execute();
            $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);

            return $user;
        }

        public function insert(){
            $obj_insert = $this->connection->prepare("INSERT INTO users(username, password, first_name, last_name, phone, address, email, avatar)
            VALUES (:username, :password, :first_name, :last_name, :phone, :address, :email, :avatar)");
            $arr_insert= [
                ':username' => $this->username,
                ':password' => $this->password,
                ':first_name' => $this->first_name,
                ':last_name' => $this->last_name,
                ':phone' => $this->phone,
                ':address' => $this->address,
                ':email' => $this->email,
                ':avatar' => $this->avatar,
            ];
            return $obj_insert->excute($arr_insert);
        }

        public function update($id){
            $obj_update = $this->connection->prepare("UPDATE users SET username = :username, first_name = :first_name, last_name = :last_name, phone = :phone, email = :email, address = :address, avatar = :avatar, update_at = :update_at WHERE id = $id");
            $arr_update = [
                ':username' => $this->username,
                ':first_name' => $this->first_name,
                ':last_name' => $this->last_name,
                ':phone' => $this->phone,
                ':email' => $this->email,
                ':address' => $this->address,
                ':avatar' => $this->avatar,
                ':update_at' => $this->update_at,
            ];

            return $obj_update->execute($arr_update);
        }

        public function delete($id){
            $obj_delete = $this->connection->prepare("DELETE FROM users WHERE id = $id");
            $is_delete = $obj_delete->execute();

            return $is_delete;
        }

        public function getUserByUsername($username){
            $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE username='$username'");
            $obj_select->execute();
            return $obj_select->fetchColumn();
        }

        public function register() {
            $sql_insert = "
          INSERT INTO users(username, password) 
          VALUES(:username, :password)";
            $obj_insert = $this->connection
              ->prepare($sql_insert);
            $inserts = [
              ':username' => $this->username,
              ':password' => $this->password,
            ];
            $is_insert = $obj_insert->execute($inserts);
            
            return $is_insert;
        }

        public function updateResetPasswordToken($id, $reset_password_token) {
            $sql_update = "UPDATE users SET reset_password_token=:reset_password_token WHERE id=:id";
            $obj_update = $this->connection->prepare($sql_update);
            $updates = [
                ':reset_password_token' => $reset_password_token,
                ':id' => $id
            ];
            $is_update = $obj_update->execute($updates);
            return $is_update;
            // Đky 1 user với email=email của bạn
        }

        public function getUserResetPasswordToken($hash) {
            $sql_select_one = "SELECT * FROM users WHERE reset_password_token=:reset_password_token";
            $obj_select_one = $this->connection->prepare($sql_select_one);
            $selects = [
                ':reset_password_token' => $hash
            ];
            $obj_select_one->execute($selects);
            $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
            return $user;
        }

        public function updatePasswordReset($id, $password) {
            $sql_update = "UPDATE users SET password=:password, reset_password_token='' WHERE id=:id";
            $obj_update = $this->connection->prepare($sql_update);
            $updates = [
              ':password' => $password,
              ':id' => $id
            ];
            $is_update = $obj_update->execute($updates);
            return $is_update;
        }

    }











?>