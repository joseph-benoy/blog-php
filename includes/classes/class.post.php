<?php
    class Post{
        private $id;
        private $title;
        private $title_slag;
        private $author;
        private $date;
        private $description;
        private $cover_image;
        private $content;
        private $views;
        public function __construct($id,$title,$title_slag,$author,$date,$description,$cover_image,$content,$views){
            $this->id = $id;
            $this->title = $title;
            $this->title_slag = $title_slag;
            $this->author = $author;
            $this->date = $date;
            $this->description = $description;
            $this->cover_image = $cover_image;
            $this->content = $content;
            $this->views = $views;
        }
    }
?>