<?php
include './base.php'; 
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$conn=mysqli_connect('localhost','root','root','music');
$sql="SELECT * FROM `user` WHERE `username`='$username'";
$sql2="SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";
$res=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql2);
$row=mysqli_fetch_assoc($res);
$roow=mysqli_fetch_assoc($res2);
if($roow){
   $arr=array('code'=>1,'data'=>array('username'=>$username));
}
else if($row&&!$roow){
    $arr = array('code'=>0,'msg'=>'用户名或密码错误');
}
else if(!$row){
    $arr = array('code'=>0,'msg'=>'账号未注册');
}
echo json_encode($arr);

?>