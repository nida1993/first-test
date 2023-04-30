<?php
session_start();
include('dbcon.php');

if(isset($_POST['save_btn']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $is_verified = 'not verified';
    
    $query = "INSERT INTO user (name, email, mobile, is_verified) VALUES (:name, :email, :mobile, :is_verified)";
    $query_run = $handle->prepare($query);

    $data = [
        ':name' => $name,
        ':email' => $email,
        ':mobile' => $mobile,
        ':is_verified' => $is_verified,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $to=$email;
        $msg= "Thanks for new Registration.";   
        $subject="Email verification";
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From: PHPGurukul | Programing Blog (Demo) <nidaafreenansari.com>'."\r\n"; //Change this to  your email
         
        $ms.="<html></body><div><div>Dear $name,</div></br></br>";
        $ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
        <div style='padding-top:10px;'><a href='localhost/PROJECT2/email_verification.php?code=$is_verified'>Click Here</a></div> 
        </body></html>";
        mail($to,$subject,$ms,$headers);
        echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";
        echo "<script>window.location = 'index.php';</script>";;
        }
        else
        {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
}

?>