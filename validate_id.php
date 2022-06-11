<?php
function validate(){
if(empty($_FILES)){
    echo 0;
}else{

    if($_FILES['file']['type'] == 'application/pdf'){
        echo 1;
    }else{
        echo 2;
    }
}
}


?>