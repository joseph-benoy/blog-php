<?php
    class DB
    {
        private $connection;
        public function __construct($server,$user,$password,$database){
            try{
                $this->connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $error){
                error_log($error->getMessage(),0);
            }
        }
        public function __destruct(){
            $this->connection = null;
        }
        public function get_pagination($page_no,$posts_per_page):stdClass{
            try{
                $offset = ($page_no-1)*$posts_per_page;
                $statement = $this->connection->prepare("SELECT COUNT(*) AS COUNT FROM POST");
                $statement->execute();
                $total_posts = $statement->fetch(PDO::FETCH_ASSOC)['COUNT'];
                $no_of_pages = ceil($total_posts/$posts_per_page);
                $statement = $this->connection->prepare("SELECT ID,TITLE,TITLE_SLAG,AUTHOR,DATE,COVER_IMAGE_LOCATION,DESCRIPTION FROM POST ORDER BY DATE DESC LIMIT $offset,$posts_per_page");
                $statement->execute();
                $pageination_obj = new stdClass;
                $pageination_obj->posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                $pageination_obj->total_post_count = $total_posts;
                $pageination_obj->no_of_pages = $no_of_pages;
                return $pageination_obj;
            }
            catch(Exception $error){
                error_log("Get Pagination error : {$error->getMessage()}");
            }
        }
        public function search_posts($val){
            $statement = $this->connection->prepare("SELECT ID,TITLE,TITLE_SLAG FROM POST WHERE TITLE LIKE '{$val}%'");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function get_used_tags(){
            try{
                $statement = $this->connection->prepare("SELECT NAME FROM TAG WHERE ID IN(SELECT TAG_ID FROM USED_TAGS)");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(Exception $error){
                error_log("get used tag error : {$error->getMessage()}",0);
            }
        }
        public function get_posts_by_category($category,$page_no,$posts_per_page){
            try{
                $offset = ($page_no-1)*$posts_per_page;
                $statement = $this->connection->prepare("SELECT COUNT(TAG_ID) AS COUNT FROM USED_TAGS WHERE TAG_ID IN (SELECT ID FROM TAG WHERE NAME = '{$category}')");
                $statement->execute();
                $total_posts = $statement->fetch(PDO::FETCH_ASSOC)['COUNT'];
                $no_of_pages = ceil($total_posts/$posts_per_page);
                $statement = $this->connection->prepare("SELECT ID,TITLE,TITLE_SLAG,AUTHOR,DATE,COVER_IMAGE_LOCATION,DESCRIPTION FROM POST WHERE ID IN (SELECT POST_ID FROM USED_TAGS WHERE TAG_ID IN(SELECT ID FROM TAG WHERE NAME = '{$category}')) ORDER BY DATE DESC LIMIT $offset,$posts_per_page");
                $statement->execute();
                $pageination_obj = new stdClass;
                $pageination_obj->posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                $pageination_obj->total_post_count = $total_posts;
                $pageination_obj->no_of_pages = $no_of_pages;
                return $pageination_obj;
            }
            catch(Exception $error){
                error_log("Get Pagination error : {$error->getMessage()}");
            }
        }
        public function get_post($title_slag){
            try{
                $statement = $this->connection->prepare("SELECT ID,TITLE,TITLE_SLAG,AUTHOR,DATE,DESCRIPTION,COVER_IMAGE_LOCATION,CONTENT,VIEWS FROM POST WHERE TITLE_SLAG='$title_slag'");
                $statement->execute();
                $post_array = $statement->fetch(PDO::FETCH_NUM);
                $post_obj = new Post(...$post_array);
                $statement = $this->connection->prepare("SELECT FULL_NAME FROM ADMIN WHERE ID='{$post_array[3]}'");
                $statement->execute();
                $post_obj->author_name = $statement->fetch(PDO::FETCH_NUM)[0];
                $statement = $this->connection->prepare("SELECT NAME FROM TAG WHERE ID IN(SELECT TAG_ID FROM USED_TAGS WHERE POST_ID='{$post_array[0]}')");
                $statement->execute();
                $post_obj->tags = $statement->fetchAll(PDO::FETCH_NUM);
                return $post_obj;
            }
            catch(PDOException $error){
                error_log("Get Post error : {$error->getMessage()}");
            }
        }
        public function save_message($data){
            try{
                $statement = $this->connection->prepare("SELECT COUNT(*) AS COUNT FROM MESSAGES");
                $statement->execute();
                $message_count = $statement->fetch(PDO::FETCH_NUM);
                $statement = $this->connection->prepare("INSERT INTO MESSAGES (ID,FULL_NAME,EMAIL,PHONE,MESSAGES) VALUES(:id,:full_name,:email,:phone,:message)");
                $statement->bindParam(':id',$id);
                $statement->bindParam(':full_name',$full_name);
                $statement->bindParam(':email',$email);
                $statement->bindParam(':phone',$phone);
                $statement->bindParam(':message',$message);
                $id = "M_".$message_count[0];
                $full_name = $data['full_name'];
                $email = $data['email'];
                $phone = $data['phone'];
                $message = $data['message'];
                return $statement->execute();
            }
            catch(PDOException $error){
                error_log("Save message error : {$error->getMessage()}");
            }
        }
        public function get_admin($id){
            try{
                $statement = $this->connection->prepare("SELECT ID,FULL_NAME,EMAIL,CAST(AES_DECRYPT(PASSWORD,'key') AS CHAR) AS PASSWORD,PROFILE_PIC_LOCATION,BIO FROM ADMIN WHERE ID=:id");
                $statement->bindParam(":id",$id);
                $statement->execute();
                $admin_array = $statement->fetch(PDO::FETCH_NUM);
                $admin = new Admin(...$admin_array);
                return $admin;
            }
            catch(PDOException $error){
                error_log("Get admin error : {$error->getMessage()}");
            }
        }
        public function get_posts_by_date($date,$page_no,$posts_per_page){
            try{
                $offset = ($page_no-1)*$posts_per_page;
                $statement = $this->connection->prepare("SELECT COUNT(*) AS COUNT FROM POST WHERE DATE=:date");
                $statement->bindParam(":date",$date);
                $statement->execute();
                $total_posts = $statement->fetch(PDO::FETCH_ASSOC)['COUNT'];
                $no_of_pages = ceil($total_posts/$posts_per_page);
                $statement = $this->connection->prepare("SELECT ID,TITLE,TITLE_SLAG,DATE,COVER_IMAGE_LOCATION,DESCRIPTION FROM POST WHERE DATE=:date LIMIT $offset,$posts_per_page");
                $statement->bindParam(":date",$date);
                $statement->execute();
                $pageination_obj = new stdClass;
                $pageination_obj->posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                $pageination_obj->total_post_count = $total_posts;
                $pageination_obj->no_of_pages = $no_of_pages;
                return $pageination_obj;
            }
            catch(PDOException $error){
                error_log("Get posts by date error : {$error->getMessage()}");
            }
        }
        public function increment_view($title_slag){
            try{
                $statement = $this->connection->prepare("UPDATE POST SET VIEWS=VIEWS+1 WHERE TITLE_SLAG=:slag");
                $statement->bindParam(':slag',$title_slag);
                return $statement->execute();
            }
            catch(Exception $error){
                error_log("Increment views error : {$error->getMessage()}");
            }
        }
    }
?>