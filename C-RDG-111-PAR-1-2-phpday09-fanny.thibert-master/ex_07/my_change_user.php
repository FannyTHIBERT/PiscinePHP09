<?php
function my_change_user($bdd, ...$names)
{
    foreach($names as $value)
    {
        try
        {
            $sth1 = $bdd->prepare("SELECT name FROM users WHERE name=:name");
            $sth1->bindParam(':name', $value, PDO::PARAM_STR);
            $sth1->execute();
            $res1 = $sth1->fetchAll(PDO::FETCH_ASSOC);
            if($res1!=null)
            {
            $sth = $bdd->prepare("UPDATE users set name = CONCAT(UPPER(LEFT(name,1)),LOWER(SUBSTRING(name,2)),'42') WHERE name = :name");
            $sth->bindParam(':name', $value, PDO::PARAM_STR);
            $sth->execute();
            $res = $sth->fetchAll(PDO::FETCH_ASSOC);
            }
            else
            {
                throw new PDOException("User not found");
            }
        }
        catch(PDOException $error) 
        {
            echo $error->getMessage();
        }
        finally
        {
            echo "Good luck with the user DB!\n";
        }
    }
}

    /*$dsn = "mysql:dbname=gecko;host=localhost;port=3306";
    $bdd = new PDO($dsn, "fanny", "31051979");
    my_change_user($bdd, "hugo");*/
    //UPDATE users set name="Hugo" WHERE id=1;