<?php  

class General{

    public static function sanitize($evil_string){
        $safe_string = addslashes($evil_string);
        $safe_string = strip_tags($evil_string);
        $safe_string = htmlentities($evil_string);
        return $safe_string;

    }
}




?>