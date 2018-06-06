<?php                                                //PHP代码开头

$user=$_POST['user'];                      //获取客户端用户名，存入变量“user”

$psw=md5($_POST['psw']);              //获取客户端密码，存入变量“pwd”

$lpnum=$_POST['lpnum'];                        //获取客户端昵称，存入变量“nick”

$phone=$_POST['phone'];

$Mailbox=$_POST['Mailbox'];

$mysql = new Mysql();                //初始化新浪服务器的MySQL类

$sql = "SELECT * FROM `user` where user='{$user}'";  //定义查询语句，看注册的用户名是否已经存在于数据库“student”中

$mysql->runSql($sql);         //执行sql语句

$no=$mysql->affectedRows();        //sql语句影响的代码行数



if($no==0){                           //如果没有影响到数据库中的数据（注册的用户是新用户）

$sql="INSERT INTO `user` (`id` ,`user`,`psw`,`lpnum`,`phone`,`Mailbox`)VALUES (NULL ,  '{$user}','{$psw}','{$lpnum}','{$phone}','{$Mailbox}')";       //将新注册的用户插入到数据库中

    $mysql->runSql($sql);             //执行插入操作

echo 1;                                       //返回1表示用户注册成功

}

else {

echo 2;                                       //返回2表示用户已存在

}

?>                                                //PHP代码结尾                       
