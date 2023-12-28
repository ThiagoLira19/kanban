<?php
header("Content-Type:application/json");
include "../classes/conecta.php";

if(!empty($_GET["cmd"])){
	$cmd = $_GET['cmd'];
}else{
	echo "Erro! Comando inválido.";
}

function getAllStatus($status){

	$sql = "select * from dados where status='$status' order by data_status";

    mysqli_query($GLOBALS['conn'],"SET CHARACTER SET utf8");
	$res = mysqli_query($GLOBALS['conn'],$sql);
    $qtd_result = mysqli_num_rows($res);

    $data = [];

    if($qtd_result > 0){
        while ($row = $res->fetch_assoc()){
            $data = $row;
        }
    }else{
        $data = array("Erro" => "Nenhum resuldado encontrado");
    }

    $response = [];
    $response['data'] =  $data;

	return json_encode($response, JSON_PRETTY_PRINT);

}

function getOneId($id){

	$sql = "select * from dados where id='$id'";

    mysqli_query($GLOBALS['conn'],"SET CHARACTER SET utf8");
	$res = mysqli_query($GLOBALS['conn'],$sql);
    $qtd_result = mysqli_num_rows($res);

    $data = [];

    if($qtd_result > 0){
        while ($row = $res->fetch_assoc()){
            $data = $row;
        }
    }else{
        $data = array("Erro" => "Nenhum resuldado encontrado");
    }

	return json_encode($data, JSON_PRETTY_PRINT);

}

switch ($cmd) {
    case "getAllStatus":
        echo getAllStatus($_GET["status"]);
        break;
    case "getOneId":
        echo getOneId($_GET["id"]);
        break;
    default:
        echo "Erro! Url ou parâmetros inválidos.";
}

?>