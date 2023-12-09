<?php
session_start();

require '../conexao.php';

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'Cadastro', 
	1 => 'Nome',
	2=> 'Email',
    3=> 'Apelido',
    4=> 'Indicacao',
    5=> 'Whatsapp',
    6=> 'Endereco_Local_Votacao',
    7=> 'Estado'

);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT Cadastro, Nome, Email, Apelido, Indicacao, Whatsapp, Endereco_Local_Votacao, Estado FROM usuario";
$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT Cadastro, Nome, Email, Apelido, Indicacao, Whatsapp, Endereco_Local_Votacao, Estado FROM usuario WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
    $result_usuarios .= " AND ( 
        Cadastro LIKE '".$requestData['search']['value']."%' 
        OR Nome LIKE '".$requestData['search']['value']."%' 
        OR Email LIKE '".$requestData['search']['value']."%' 
        OR Apelido LIKE '".$requestData['search']['value']."%' 
        OR Indicacao LIKE '".$requestData['search']['value']."%' 
        OR Whatsapp LIKE '".$requestData['search']['value']."%' 
        OR Endereco_Local_Votacao LIKE '".$requestData['search']['value']."%' 
        OR Estado LIKE '".$requestData['search']['value']."%' 
    )";
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["Cadastro"];
	$dado[] = $row_usuarios["Nome"];
	$dado[] = $row_usuarios["Email"];	
    $dado[] = $row_usuarios["Apelido"];	
    $dado[] = $row_usuarios["Indicacao"];	
    $dado[] = $row_usuarios["Whatsapp"];	
    $dado[] = $row_usuarios["Endereco_Local_Votacao"];	
    $dado[] = $row_usuarios["Estado"];	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
