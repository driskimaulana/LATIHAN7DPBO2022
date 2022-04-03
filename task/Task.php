<?php 

class Task extends DB{
	
	// Mengambil data
	function getTask($sortby=""){
		// Query mysql select data ke tb_to_do
		if($sortby == ""){
			$query = "SELECT * FROM tb_to_do";
		}else{
			$query = "SELECT * FROM tb_to_do ORDER BY $sortby";
		}

		// Mengeksekusi query
		return $this->execute($query);
	}

	function addTask($taskName = "", $deadLine = "", $detail = "", $subject= "", $priority=""){
		$this->execute("INSERT INTO tb_to_do (name_td, details_td, subject_td, priority_td, deadline_td, status_td) VALUES ('$taskName', '$detail', '$subject', '$priority', '$deadLine', 'Belum')");
	}

	function deleteTask($id_hapus){
		$this->execute("DELETE FROM tb_to_do WHERE id=$id_hapus");
	}

	function selesaiTask($id_selesai){
		$this->execute("UPDATE tb_to_do SET status_td='Sudah' WHERE id=$id_selesai");
	}
}

?>