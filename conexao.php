<?php

$dbHost = 'autorack.proxy.rlwy.net';
$dbUsername = 'root';
$dbPassword = 'FekCeetIoJTqBAJcXxbDciuHCcXKwUfW';
$dbName = 'railway';
$dbPort = '16862';


$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPort);


if($conexao->connect_errno)
{
    echo "a conexao falhou";
}
else{
    echo "funfou";
} 

?>