<?php
          //localserver information
            $server = "localhost";
            $username = "root";
            $password = "";
            $db = "adduser";

          //cheack if connection was successfull
            try{
              $handle = new PDO("mysql:host=$server; dbname=$db", "$username","$password");
              $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              //echo "connect";
            } catch(PDOException $e){
                echo "Oops.Something went wrong in the database.".$e->getMessage();
                
            }
    
            //$handle = null;
    
            ?>