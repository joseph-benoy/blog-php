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
    }
?>