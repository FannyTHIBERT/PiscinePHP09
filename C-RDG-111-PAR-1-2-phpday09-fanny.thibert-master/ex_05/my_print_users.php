<?php
function my_print_users($bdd, ...$id)
{ 
    foreach($id as $value)
        {                
            if(is_int($value))
                {
                    $sth = $bdd->prepare("SELECT name FROM users WHERE id = :id");
                    $sth->bindParam(':id', $value, PDO::PARAM_INT);
                    $sth->execute();
                    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
                    if($res==null)
                        {
                            return false;
                        }
                    else
                        {
                            print_r($res[0]['name']);
                            echo "\n";
                        }
                    
                }
                else
                {
                    throw new Exception("Invalid id given");
                }
        }
        if(isset($res))
            {
                return true;
            }
}
/*try
{
    $dsn = "mysql:dbname=gecko;host=localhost;port=3306";
    $bdd = new PDO($dsn, "fanny", "31051979");
    my_print_users($bdd,1,2);
}
catch(Exception $error)
    {
        echo $error->getMessage();
    }
var_dump(my_print_users($bdd,1,2,6));*/
