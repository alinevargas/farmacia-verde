<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 604800");
header("Access-Control-Allow-Headers: x-requested-with");
header('Content-Type: application/json; charset=utf-8');

$array=[];
$retorno=[];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	switch($_POST['tipo']){
		case 'planta':
            include "../classes/planta.class.php";

			$planta = new Planta();
			$array=$planta->mostrar2();

			foreach($array as $a){
				$id=$a->getId_p();
				$retorno[$id]=$a->getComum();
			}
			echo json_encode($array);
			break;
		case 'receita':
			include_once "../classes/receita.class.php";
			$receita = new Receita();
			$array=$receita->mostrar2();
	
			foreach($array as $a){
				$id=$a->getId_r();
				$retorno[$id]=$a->getNome();
			}
			echo json_encode($retorno);
			break;		
		case 'evento':
			include_once "../classes/evento.class.php";
			$evento = new Evento();
			$array=$evento->mostrar2();
		
			foreach($array as $a){
				$id=$a->getId_e();
				$retorno[$id]=$a->getNome();
			}
			echo json_encode($retorno);
			break;		
		}

	}
