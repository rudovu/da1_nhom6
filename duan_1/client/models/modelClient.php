<?php
    class modelClient{
        public $conn;

        public function __construct()
        {
            $this->conn = connectDB();

        }
        public function getUser($username){
            try{
                $sql = "SELECT * FROM tai_khoans WHERE ten_dang_nhap = :username";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':username' => $username,
                ]);
                return $stmt->fetch();
            }catch(Exception $e){
                echo "ERROR".$e->getMessage();
             
            }
        }








        
    }



