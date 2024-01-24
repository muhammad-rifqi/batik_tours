<?php 

   function change_month($num){

    if($num == 1){
        return "Januari";
    }elseif($num == 2){
        return "Februari";
    }elseif($num == 3){
        return "Maret";
    }elseif($num == 4){
        return "April";
    }elseif($num == 5){
        return "Mei";
    }elseif($num == 6){
        return "Juni";
    }elseif($num == 7){
        return "Juli";
    }elseif($num == 8){
        return "Agustus";
    }elseif($num == 9){
        return "September";
    }elseif($num == 10){
        return "Oktober";
    }elseif($num == 11){
        return "November";
    }elseif($num == 12){
        return "Desember";
    }else{
        return "No Display Data";
    }
}
?>