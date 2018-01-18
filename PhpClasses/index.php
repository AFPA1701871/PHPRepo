<?php
include '/Php/Model/DbConnect.php';
include '/Php/Model/PersonneManager.php';
include '/Php/Controller/PersonneClass.php';
// initialise une connection
DbConnect::init();
// on crée une nouvelle personne en vue de l'ajouter à la base de données
$perso = new Personne(['nom'=>'test','prenom'=>'ptest']);
PersonneManager::add($perso);

// On récupère un objet de la base pour le modifier
$perso2=PersonneManager::get(41);
$perso2->setNom("erfd");
PersonneManager::update($perso2);
echo $perso2->getNom()." ";

// On récupère la liste des objets Personne
$tab = PersonneManager::getList();
foreach ($tab as $pers)
{
	 echo $pers->getNom()." ";
}

// On teste le delete
PersonneManager::delete($perso2);
