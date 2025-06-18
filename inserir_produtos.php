<?php
header('content-type: application/json');
// verificar se os dados foram enviados via POST
if($_SERVER['REQUESR_METHOD'] === 'POST'){
  // conectar com o banco 
  $conn = new mysqli ("localhost","root","","panificadora");
  
  $conn = new mysqli ("localhost","root","","panificadora");

if($conn->connect_error){
    die(json_encode(["erro"=> "erro ao conectar"]))
}
   //receber e limpar os dados
   $nome = $conn -> real_escape_string($_POST['nome']);
   $quantidade = (int)$_POST['quantidade'];
   $preco = (float) $_POST['preco'];

   //inserir no banco
   $sql = "INSERT INTO produtos (nome, quantidade,preco) VALUES
                ('$nome, $quantidade ,$preco)";
  if($conn -> query($sql)){
      encho json_decode(["sucesso" =>true, "mensagem"=>
                                              "produto inserido com sucesso!"])                                        
  } else{
     echo json_decode(["erro"=> "erro ao iserir produto."]);
  }
     $conn ->close();
} else{
    echo json_encode(["erro" => "requisiçao invalida. "]);
}