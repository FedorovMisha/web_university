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

        foreach($this->file as $items) {
            array_push($array, Comment::with_string($items));
        }
        $array = array_reverse($array);
        usort($array, 'date_compare');
        return $array;
    }

    function moveFile($fileName) {
        move_uploaded_file($fileName, 'messages.inc');
    }
}

function date_compare($time1, $time2)
{
    if (strtotime($time1->date) < strtotime($time2->date))
        return 1;
    else if (strtotime($time1->date) > strtotime($time2->date)) 
        return -1;
    else
        return 0;
}