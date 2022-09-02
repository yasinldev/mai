<?php

    function getDay(){

        $getDate = date('H', time());

        if($getDate == "7" || $getDate == "8" || $getDate == "9" || $getDate == "10" || $getDate == "11" || $getDate == "12" || $getDate == "13"){
            echo "Günaydın";
        }
        elseif($getDate == "14" || $getDate == "15" || $getDate == "16" || $getDate == "17" || $getDate == "18"){
            echo "Tünaydın";
        }
        elseif($getDate == "19" || $getDate == "20" || $getDate == "21" || $getDate == "22" || $getDate == "23"){
            echo "İyi Akşamlar";
        }
        elseif($getDate == "00" || $getDate == "1" || $getDate == "2" || $getDate == "3" || $getDate == "4" || $getDate == "5" || $getDate == "6"){
            echo "İyi Geceler";
        }

    }

