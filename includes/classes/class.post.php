<?php
    class Post{
        public $id;
        public $title;
        public $title_slag;
        public $author_id;
        public $author_name;
        public $date;
        public $description;
        public $cover_image;
        public $content;
        public $views;
        public function __construct($id,$title,$title_slag,$author,$date,$description,$cover_image,$content,$views,$author_name=null){
            $this->id = $id;
            $this->title = $title;
            $this->title_slag = $title_slag;
            $this->author = $author;
            $this->date = $date;
            $this->description = $description;
            $this->cover_image = $cover_image;
            $this->content = $content;
            $this->views = $views;
            $this->author_name = $author_name;
        }
    }
?>