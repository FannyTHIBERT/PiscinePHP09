<?php
$password="";
$hash="";
$salt="";
function my_password_hash($password)
{
    $salt=uniqid();
    $hash=crypt($password, $salt);
    return ["hash"=>$hash, "salt"=>$salt];
}
function my_password_verify($password,$salt,$hash)
{
    $salt=uniqid();
    $hash=crypt($password, $salt);
    if(password_verify($password, $hash))
    {
        return true;
    }else{
        return false;
    }
}
/*var_dump(my_password_hash("bonjour"));
var_dump(my_password_verify("bonjour",$salt,$hash));*/