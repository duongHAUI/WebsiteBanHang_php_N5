<?php
    namespace Models;
?>
<?php

    if(!$_SESSION['c_user']){
        $c_user = $_COOKIE('c_user');
    }
    
?>