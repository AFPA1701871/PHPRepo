<?php
include '/Php/Model/DbConnect.php';
include '/Php/Model/PersonneManager.php';
include '/Php/Controller/PersonneClass.php';
// initialise une connection
DbConnect::init();
// on cr�e une nouvelle personne en vue de l'ajouter � la base de donn�es
$perso = new Personne(['nom'=>'test','prenom'=>'ptest']);
PersonneManager::add($perso);

// On r�cup�re un objet de la base pour le modifier
$perso2=PersonneManager::get(41);
$perso2->setNom("erfd");
PersonneManager::update($perso2);
echo $perso2->getNom()." ";

// On r�cup�re la liste des objets Personne
$tab = PersonneManager::getList();
foreach ($tab as $pers)
{
	 echo $pers->getNom()." ";
}

// On teste le delete
PersonneManager::delete($perso2);
