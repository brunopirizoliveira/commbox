<?php

require_once('../model/inc.autoload.php');

$tpl = new TemplatePower('../view/_MASTER.html');

$tpl->assignInclude('home','../view/edit.html');


$id = $_REQUEST['id'];

$handleRegister = new HandleRegister();

$vet = $handleRegister->getRegisterById($id);

$tpl->prepare();

$tpl->newBlock('register');
$tpl->assign('id', $vet->getId());
$tpl->assign('nome', $vet->getNome());
$tpl->assign('senha', $vet->getSenha());
$tpl->assign('data', $vet->getData());
$tpl->assign('cpf', $vet->getCpf());
$tpl->assign('cidade', $vet->getCidade());
$tpl->assign('nomePai', $vet->getNomePai());
$tpl->assign('nomeMae', $vet->getNomeMae());
$tpl->assign('obs', $vet->getObs());

$tpl->printToScreen();