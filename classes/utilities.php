<?php 

 function sanitizer($evilstring){
    $clean_string = strip_tags($evilstring);
    $clean_string = addslashes($clean_string);
    $clean_string = htmlentities($clean_string);
     return $clean_string;
 }

 class Utilities{

    public static function get_properties(){

     


        $curlobj = curl_init('http://localhost/hotelsdotng/api/v1.0/listall.php');

       

        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);

      

        $response = curl_exec($curlobj);


        curl_close($curlobj);

       

        $response_inphp_obj = json_decode($response);

        return $response_inphp_obj ;
    }
 }
?>