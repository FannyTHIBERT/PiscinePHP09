<?php
function my_password_change($bdd, $email, $new_password)
{
    $hash = password_hash($new_password,PASSWORD_DEFAULT);
    password_verify($new_password, $hash);
    if(!empty($new_password))
    {
    $sth = $bdd->prepare("UPDATE users set password= :new_password WHERE email= :email");
    $sth->bindParam(':new_password', $hash, PDO::PARAM_STR);
    $sth->bindParam(':email', $email, PDO::PARAM_STR);
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    elseif(empty($new_password) || $res==null)
    {
        throw new Exception();
    }
}
/*try
{
    $dsn = "mysql:dbname=gecko;host=localhost;port=3306";
    $bdd = new PDO($dsn, "fanny", "31051979");
    my_password_change($bdd, "hugo@hugo.com", "t");
}
catch(Exception $error)
    {
        echo $error->getMessage();
    }*/

    //UPDATE users set password = "passwordhugo" WHERE email="hugo@hugo.com";