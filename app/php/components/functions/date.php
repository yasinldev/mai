<?php

    function getDay(){

        $getDate = idate('H', time());

        if(13 >= $getDate && $getDate>=7){
            echo "Günaydın";
        }
        elseif(18 >= $getDate && $getDate>=14){
            echo "Tünaydın";
        }
        elseif(23 >= $getDate && $getDate>=19){
            echo "İyi Akşamlar";
        }
        elseif(6 >= $getDate && $getDate>=0){
            echo "İyi Geceler";
        }

    }

