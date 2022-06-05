<?php

require_once 'application/core/Models/CommentEntity.php';

class CommentService {
    private $file;

    function __construct() {
        $this->file = file("messages.inc");
    }

    function addComment($comment) {
        $item = "".$comment->userName.";".$comment->email.";".$comment->date.";".$comment->text."\n";
        $h = fopen("messages.inc", 'a+');

        if(fwrite($h, $item)) {
            echo "Success";
        }
        fclose($h);
        clearstatcache();
        $this->file = file("messages.inc");
    }

    function getAll() {
        $array = array();
        $this->file = file("messages.inc");

        foreach($this->file as $items) {
            array_push($array, Comment::with_string($items));
        }
        usort($array, "date_compare");
        return $array;
    }

    function moveFile($fileName) {
        // move_uploaded_file($fileName, 'messages_up.inc');

        $h = fopen("messages.inc", "a+");
        $c = file_get_contents($fileName);
        fwrite($h, $c);
    }
    
}

function date_compare($a, $b)
{
    str_replace(".", "-", $a->date);
    str_replace(".", "-", $b->date);
    return strtotime($a->date) < strtotime($b->date);
}