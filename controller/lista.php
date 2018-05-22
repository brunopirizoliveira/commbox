<?php

require_once('../model/inc.autoload.php');

$tpl = new TemplatePower('../view/_MASTER.html');

$tpl->assignInclude('home','../view/lista.html');

$search = "";

$handleRegister = new HandleRegister();

if(isset($_REQUEST['search'])) {
	$search = $_REQUEST['search'];
}

$vet = $handleRegister->getListRegister($search);

$tpl->prepare();

foreach ($vet as $value) {
	$tpl->newBlock('items');
	$tpl->assign('id', $value->getId());
	$tpl->assign('nome', $value->getNome());
	$tpl->assign('cpf', $value->getCpf());
}

$tpl->printToScreen();