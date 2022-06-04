<?php

if (!$_SESSION['isLoggedIn']) {
    header("Location: login");
}