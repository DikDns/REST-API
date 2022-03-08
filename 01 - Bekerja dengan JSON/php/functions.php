<?php
    
function priceFormat($price){
    if(is_int($price)){
        $price = (string)$price;
    }
    
    if(strlen($price) <= 6){
        $dot_index_1 = strlen($price) - 3;
        $price = substr_replace($price, ".", $dot_index_1, 0);
    } else if (strlen($price) <= 12){
        $dot_index_1 = strlen($price) - 3;
        $dot_index_2 = strlen($price) - 6;
        $price = substr_replace($price, ".", $dot_index_1, 0);
        $price = substr_replace($price, ".", $dot_index_2, 0);
    }

    $price .= ",00-";
    return $price;
}