<?php
    class Admin{
        public $id;
        public $full_name;
        public $email;
        private $password;
        public $profile_pic_location;
        public $bio;
        public function __construct($id,$full_name,$email,$password,$profile_pic_location,$bio){
            $this->id = $id;
            $this->full_name = $full_name;
            $this->email = $email;
            $this->password = $password;
            $this->profile_pic_location = $profile_pic_location;
            $this->bio = $bio;
        }
        public function get_password(){
            return $this->password;
        }
    }
?>