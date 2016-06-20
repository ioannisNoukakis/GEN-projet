<?php
	function getBreedList() {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
			
		$stmt = $db->prepare("SELECT NOM_RACE FROM statistiquesprincipales;");
		$stmt->execute();
		
		$result = array();
		
		while($row = $stmt->fetch()) {
			array_push($result, $row[0]);
		}
		
		$db = null;
		return $result;
	}
	
	function getClassList() {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
			
		$stmt = $db->prepare("SELECT NOM_CLASSE FROM statistiquessecondaires;");
		$stmt->execute();
		
		$result = array();
		
		while($row = $stmt->fetch()) {
			array_push($result, $row[0]);
		}
		
		$db = null;
		return $result;
	}
	
	function getSkillList() {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
			
		$stmt = $db->prepare("SELECT NOM_COMPETENCE FROM competence;");
		$stmt->execute();
		
		$result = array();
		
		while($row = $stmt->fetch()) {
			array_push($result, $row[0]);
		}
		
		$db = null;
		return $result;
	}
	
	function getBannedUsers() {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
			
		$stmt = $db->prepare("SELECT ID_UTILISATEUR, pseudonyme FROM utilisateur WHERE banni = 1;");
		$stmt->execute();
		
		$result = array();
		
		while($row = $stmt->fetch()) {
			$result[$row[0]] = $row[1];
		}
		
		$db = null;
		return $result;
	}
	
	function getUsers() {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
			
		$stmt = $db->prepare("SELECT ID_UTILISATEUR, pseudonyme FROM utilisateur WHERE banni = 0;");
		$stmt->execute();
		
		$result = array();
		
		while($row = $stmt->fetch()) {
			$result[$row[0]] = $row[1];
		}
		
		$db = null;
		return $result;
	}
	
	function getCharacters() {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
			
		$stmt = $db->prepare("SELECT ID_PERSONNAGE, nom FROM personnage;");
		$stmt->execute();
		
		$result = array();
		
		while($row = $stmt->fetch()) {
			$result[$row[0]] = $row[1];
		}
		
		$db = null;
		return $result;
	}
?>