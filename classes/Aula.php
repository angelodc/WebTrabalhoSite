<?php

require_once 'DB.php';

class Aula  extends DB{


    public function acharID($id){
		$sql  = "SELECT fk_Aula_id_aula FROM `aluno_aula` WHERE fk_Aluno_id_matricula = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}
    
    public function findAll(){
		$sql  = "SELECT * FROM aula";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
	public function acharAula($id){
		$sql  = "SELECT nome,dia,turno,campus,numero FROM aula as A INNER JOIN sala as B on a.fk_Sala_id_sala = b.id_sala WHERE id_aula = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
    }
    
	public function delete($id1, $id2){
		$sql  = "DELETE FROM aluno_aula WHERE fk_Aluno_id_matricula = :id1 AND fk_Aula_id_aula = :id2";
		$stmt = DB::prepare($sql);
        $stmt->bindParam(':id1', $id1);
        $stmt->bindParam(':id2', $id2);
		return $stmt->execute(); 
    }
    
    public function insert($id1, $id2){

		$sql  = "INSERT  INTO aluno_aula (fk_Aluno_id_matricula, fk_Aula_id_aula) VALUES (:id1, :id2) ";
		$stmt = DB::prepare($sql);
        $stmt->bindParam(':id1', $id1);
        $stmt->bindParam(':id2', $id2);
		return $stmt->execute(); 
	}

}