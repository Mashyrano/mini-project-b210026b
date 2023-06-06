<?php
session_start();
if( ! empty($_SESSION['myErr']))
{
    echo "my err " . $_SESSION['myErr'];
    unset($_SESSION['login_error_msg']);
}