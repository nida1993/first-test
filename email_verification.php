<?php
include('dbcon.php');
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
 
$sql = "SELECT * FROM user WHERE is_verified=:code";
$query = $dbh -> prepare($sql);
$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
  
$st=0;
$sql = "SELECT id FROM user WHERE is_verified=:code";
$query = $dbh -> prepare($sql);
$query->bindParam(':code',$code,PDO::PARAM_STR);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
$st=1;
$sql = "UPDATE user WHERE is_verified=:code";
$query = $dbh->prepare($sql);
$query -> bindParam(':code',$code, PDO::PARAM_STR);

$query -> execute();
}
else
{
$msg ="Your account is already active, no need to activate again";
}
}
else
{
$msg ="Wrong activation code.";
}
}
?>