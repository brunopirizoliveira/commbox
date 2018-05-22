<?php

require_once('../model/inc.autoload.php');

$tpl = new TemplatePower('../view/_MASTER.html');

$tpl->assignInclude('home','../view/cadastro.html');


$tpl->prepare();

$tpl->printToScreen();