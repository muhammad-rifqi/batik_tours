<?php 
   function slug_url($name){
    $convert = strtolower($name);
    $slug = str_replace(array(' ', '<', '>', '&', '{', '}', '*',','), array('-'),$convert);
    return $slug;   
}
?>