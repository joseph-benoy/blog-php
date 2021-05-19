<?php
    class DB
    {
        private $connection;
        public function __construct($server,$user,$password,$database){
            try{
                $this->connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
            }
            catch(PDOException $error){
                error_log($error->getMessage(),0);
            }
        }
        public function get_pagination($page_no,$posts_per_page):stdClass{
            try{
                $offset = ($page_no-1)*$posts_per_page;
                $statement = $this->connection->prepare("SELECT COUNT(*) AS COUNT FROM POST");
                $statement->execute();
                $total_posts = $statement->fetch()['COUNT'];
                $no_of_pages = ceil($total_posts/$posts_per_page);
                $statement = $this->connection->prepare("SELECT ID,TITLE,TITLE_SLAG,AUTHOR,DATE,COVER_IMAGE_LOCATION,DESCRIPTION FROM POST ORDER BY DATE DESC LIMIT $offset,$posts_per_page");
                $statement->execute();
                $pageination_obj = new stdClass;
                $pageination_obj->posts = $statement->fetchAll();
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
            $result = $statement->fetchAll();
            return $result;
        }
        public function get_used_tags(){
            try{
                $statement = $this->connection->prepare("SELECT NAME FROM TAG WHERE ID IN(SELECT TAG_ID FROM USED_TAGS)");
                $statement->execute();
                $result = $statement->fetchAll();
                return $result;
            }
            catch(Exception $error){
                error_log("get used tag error : {$error->getMessage()}",0);
            }
        }
    }
?>