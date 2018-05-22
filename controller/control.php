
<?php

	require_once('../model/inc.autoload.php');
	
	if( (isset($_REQUEST['id']) ) && ($_REQUEST['action'] == 'update') ) {

		$register = new Register();

		$register->setId($_REQUEST['id']);
		$register->setNome($_REQUEST['nome']);
		$register->setSenha($_REQUEST['senha']);
		$register->setData($_REQUEST['data']);
		$register->setCpf($_REQUEST['cpf']);
		$register->setCidade($_REQUEST['cidade']);
		$register->setNomePai($_REQUEST['nomePai']);
		$register->setNomeMae($_REQUEST['nomeMae']);
		$register->setObs($_REQUEST['obs']);		

		$handleRegister = new HandleRegister();

		$handleRegister->updateRegister($register);			

	} else if( (isset($_REQUEST['id']) ) && ($_REQUEST['action'] == 'delete') ) {

		$idRegister = $_REQUEST['id'];
		
		$handleRegister = new HandleRegister();
		
		$handleRegister->deleteRegister($idRegister);

	} else {

		$register = new Register();

		$register->setNome($_REQUEST['nome']);
		$register->setSenha($_REQUEST['senha']);
		$register->setData($_REQUEST['data']);
		$register->setCpf($_REQUEST['cpf']);
		$register->setCidade($_REQUEST['cidade']);
		$register->setNomePai($_REQUEST['nomePai']);
		$register->setNomeMae($_REQUEST['nomeMae']);
		$register->setObs($_REQUEST['obs']);

		$handleRegister = new HandleRegister();

		$handleRegister->insertRegister($register);

	}

	header("Location: lista.php");

?>