<?php

require_once 'Crud.php';

class Aluno extends Crud{
	
	protected $table = 'aluno';
    private $id;
    private $nome;
    private $telefone;
    private $endereco;

	public function setId($id){
		$this->id = $id;
    }

    public function setNome($nome){
		$this->nome = $nome;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
    }
    
    public function setEndereco($endereco){
		$this->endereco = $endereco;
    }


	public function insert(){

		$sql  = "INSERT INTO $this->table (id_matricula, nome, telefone, endereco) VALUES (:id, :nome, :telefone, :endereco)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':endereco', $this->endereco);
		return $stmt->execute(); 
	}

	public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE id_matricula = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}
	
	public function update($id){

		$sql  = "UPDATE $this->table SET id_matricula = :id, nome = :nome, telefone = :telefone, endereco = :endereco WHERE id_matricula = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':endereco', $this->endereco);
		return $stmt->execute();

	}
	
	public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE id_matricula = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		return $stmt->execute(); 
	}

}