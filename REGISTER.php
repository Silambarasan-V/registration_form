<?php
//connectivity
$con=mysql_connect("localhost","root","") or die("not connected");
//select database
mysql_select_db("student",$con);

extract($_POST);
if(isset($save))
{
//for date of birt get one by one and concatente
$dob=$yy."-".$mm."--".$dd;
//hobbies retrieve in an array format change array into string 
$h=implode(",",$hobb);
$img=$_FILES['pic']['name'];

//To check user already exists or not
$sql=mysql_query("select email from studentdetails where email='$e'");
$return=mysql_num_rows($sql);
//if $return returns true value it means user's email already exists
if($return)
{
$msg="<font color='red'>".ucfirst($e)."already exists choose another email</font>";
}
else
{
$query="insert into studentdetails values('','$n','$e','$p','$m','$g','$h','$dob','$add','$img',now())";
mysql_query($query);
$msg= "<font color='blue'>Your data saved</font>";
}
}
?>