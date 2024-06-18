<?php

class General{
    public static function sanitize($evilstring){
        $safe_string = addslashes($evilstring);
        $safe_string = strip_tags($safe_string);
        $safe_string = htmlentities($safe_string);
        
        return $safe_string;
    }
}


?>