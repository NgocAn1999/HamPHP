<?php
    //Hàm random 1 chuỗi
    function randomString($length=5){
        $arrString=array_merge(range('A','Z'),range('a','z'),range(0,9));
        $arrString= implode('',$arrString );
        $arrString=str_shuffle($arrString);

        $result=substr($arrString,0,$length);
        return $result;
    }
?>