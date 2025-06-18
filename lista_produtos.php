<?php
header('content-type: application/json');

//conectar o banco 
$conn = new mysqli ("localhost","root","","panificadora");

if($conn->connect_error){
    die(json_encode(["erro"=> "erro ao conectar"]))
}

//consulta SQL
$sql = "SELECT id,nome,quantidade,preco FROM produtos";
$resultado = $conn -> query($sql);

$produtos = [];

while($rlinha = $resultado -> fetch_assoc()){
    $produtos[] = $linha;
}

echo json_encode($produtos);
