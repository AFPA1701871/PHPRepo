<?php

class PersonneManager
{
	  
	static public function add(Personne $perso)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO personnes(nom, prenom) VALUES(:nom, :prenom)');
		
		// Assignation des valeurs pour le nom, le pr�nom.
		$q->bindValue(':nom', $perso->getNom());
		$q->bindValue(':prenom', $perso->getPrenom());
		
		// Ex�cution de la requ�te.
		$q->execute();
		
	}
	
	static public function delete(Personne $perso)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->exec('DELETE FROM personnes WHERE id = '.$perso->getId());
	}
	
	static public function get($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Personne.
		$id = (int) $id;
		
		$q = $db->query('SELECT id, nom, prenom FROM personnes WHERE id = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Personne($donnees);
	}
	
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les personnes.
		$persos = [];
		
		$q = $db->query('SELECT id, nom, prenom FROM personnes ORDER BY nom');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personne($donnees);
		}
		
		return $persos;
	}
	
	static public function update(Personne $perso)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE personnes SET nom=:nom, prenom=:prenom WHERE id = :id');
		
		// Assignation des valeurs � la requ�te.
		$q->bindValue(':nom', $perso->getNom());
		$q->bindValue(':prenom', $perso->getPrenom());
		$q->bindValue(':id', $perso->getId());
		
		// Ex�cution de la requ�te.
		$q->execute();
	}
	
	
}