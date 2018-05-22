<?php

require_once('config.php');

Class HandleRegister {
	

	public static function loadRegister() {

		$handle = fopen( FILE, "r");
		if(filesize(FILE) >0) {
			return $conteudo = json_decode( fread ($handle, filesize (FILE)) );
		}
	}

	public static function returnID() {

		$vet = array();

		$conteudo = self::loadRegister();
		
		if($conteudo) {

			foreach ($conteudo as $value) { 
				array_push($vet, $value);
			}
		}

		return count($vet) + 1;
	}

	public function insertRegister($register) {

		$id = self::returnID();

		$json = json_decode(file_get_contents(FILE), true);

		$json[$id] = array( "id" 	  => $id, 
							"nome" 	  => $register->getNome(), 
							"senha"   => $register->getSenha(), 
							"data" 	  => $register->getData(), 
							"cpf"     => $register->getCpf(), 
							"cidade"  => $register->getCidade(), 
							"nomePai" => $register->getNomePai(), 
							"nomeMae" => $register->getNomeMae(), 
							"obs" 	  => $register->getObs() 
						);

		file_put_contents(FILE, json_encode($json));

		fclose(FILE);

	}

	public function deleteRegister($idRegister) {

		$content = self::loadRegister();

		$vet = array();

		file_put_contents(FILE, "");

		foreach ($content as $value) {
			if($value->id != $idRegister){
				array_push($vet, $value);
				file_put_contents(FILE, json_encode($vet));
			}
		}

		fclose(FILE);
	}

	public function updateRegister($register) {

		$content = self::loadRegister();

		$vet = array();

		file_put_contents(FILE, "");

		foreach ($content as $value) { 
			if($value->id == $register->getId()){
				$value->nome  	 = $register->getNome();
				$value->senha 	 = $register->getSenha();
				$value->data  	 = $register->getData();
				$value->cpf  	 = $register->getCpf();
				$value->cidade   = $register->getCidade();
				$value->nomePai  = $register->getNomePai();
				$value->nomeMae  = $register->getNomeMae();
				$value->obs      = $register->getObs();
				
				array_push($vet, $value);
			} else {
				array_push($vet, $value);
			}
			
			file_put_contents(FILE, json_encode($vet));			

		}

		fclose(FILE);
	}

	public function getRegisterById($idRegister) {

		$content = self::loadRegister();

		foreach ($content as $value) {
			if( ($idRegister) && ($idRegister == $value->id) ) {
				$register = new Register();

				$register->setId($value->id);
				$register->setNome($value->nome);
				$register->setSenha($value->senha);
				$register->setData($value->data);
				$register->setCpf($value->cpf);
				$register->setCidade($value->cidade);
				$register->setNomePai($value->nomePai);
				$register->setNomeMae($value->nomeMae);
				$register->setObs($value->obs);

				return $register;

			}			
		}


	}

	public function getListRegister($search=null) {
		
		$content = self::loadRegister();
			
			$i = 0;
			$vet = array();
			if($content) {
				foreach ($content as $value) {					
					if($search) {
						if( strpos(strtoupper(json_encode($value->nome)), strtoupper($search)) ) {	
							
							$register = new Register();

							$register->setId($value->id);
							$register->setNome($value->nome);
							$register->setCpf($value->cpf);

							array_push($vet, $register);
						}
					} else {
						$register = new Register();

						$register->setId($value->id);
						$register->setNome($value->nome);
						$register->setCpf($value->cpf);

						array_push($vet, $register);
					}
				}	

			}
		
		return $vet;	
	}

}