<?php
include './base.php';
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$conn=mysqli_connect('localhost','root','root','music');
$sql="SELECT * FROM `user` WHERE `username`='$username'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
if($row){
   $arr = array('code'=>0,'msg'=>'用户名已被注册');
}
else{
   $sql="INSERT INTO `user` (`username`,`password`) VALUES ('$username','$password')";
   $res=mysqli_query($conn,$sql);
   $arr = array('code'=>1,'data'=>array('username'=>$username,'msg'=>'注册成功'));
}
echo json_encode($arr);
?>