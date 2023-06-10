<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');

/*
*Conectando ao sqlite
*/

$connect = new PDO('sqlite:dados.db'); 
$resultado = $connect->query("SELECT * FROM cadastros ORDER BY RANDOM() LIMIT 1");
/*
*fim da conexao
*/
if (isset($resultado)) {
	
foreach($resultado as $dados) {
header("HTTP/1.1 200 OK");
$r1 = array(
  "message" => "Dados Gerados Com Sucesso",
  "cpf" => "".$dados["CPF"]."",
  "nome" => "".$dados["NOME"]."",
  "nascimento" => "".$dados["NASCIMENTO"]."",
  "rua" => "".$dados["RUA"]."",
  "numero" => "".$dados["NUMERO"]."",
  "complemento" => "".$dados["COMPLEMENTO"]."",
  "bairro" => "".$dados["BAIRRO"]."",
  "cep" => "".$dados["CEP"]."",
  "municipio" => "".$dados["MUNICIPIO"]."",
  "uf" => "".$dados["UF"]."",
  "mae" => "".$dados["MAE"]."",  
);
 print_r(json_encode($r1, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
}
}else {
header("HTTP/1.1 404 OK");
$r2 = array(
  "message" => "Erro ao Gerar os dados",
);
 print_r(json_encode($r2, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
}
?>