<?php
	function dbQuery(){
		try{
			$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
			$args = func_get_args();
			
			$stmt = $db->prepare($args[0]);
			
			print_r($args);
			
			for($i = 1; $i < count($args); $i++) {
				$stmt->bindParam($i, $args[$i]);
			}
			
			print_r($stmt);
			
			$stmt->execute();
			$db = null;
		} catch(Exception $e){
			print("Erreur : " . $e);
		}
	}
?>