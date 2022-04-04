<?php
$password = "";
function my_very_secure_hash($password)
{
    return md5($password);
}