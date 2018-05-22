<?php

Class Register {

	private $id;
	private $nome;
	private $senha;
	private $data;
	private $cpf;
	private $cidade;
	private $nomePai;
	private $nomeMae;
	private $obs;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getNomePai(){
		return $this->nomePai;
	}

	public function setNomePai($nomePai){
		$this->nomePai = $nomePai;
	}

	public function getNomeMae(){
		return $this->nomeMae;
	}

	public function setNomeMae($nomeMae){
		$this->nomeMae = $nomeMae;
	}

	public function getObs(){
		return $this->obs;
	}

	public function setObs($obs){
		$this->obs = $obs;
	}	 
	
}