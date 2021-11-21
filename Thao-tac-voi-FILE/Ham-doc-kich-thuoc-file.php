<?php
    // Hàm đọc kích thước FILE
    function converSize($size,$totalDigit=2,$ditance=' '){
        $units=array('B','KB','MB','GB','TB');
        $length=count($units);

        for($i=0;$i<$length;$i++){
            if($size>1024){
                $size=$size/1024;
            }else{
                $unit =$units[$i];
                break;
            }
        }
        $result= round($size,$totalDigit).$ditance.$unit;
        return $result;
    }
?>