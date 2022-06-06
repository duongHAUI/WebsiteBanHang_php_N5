<?php

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
    header("Location: ./");
}

?>