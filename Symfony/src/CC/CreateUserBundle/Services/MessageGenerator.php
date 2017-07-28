<?php 
namespace CC\CreateUserBundle\Services;

class MessageGenerator
{
	public $messages;

	function __construct(){
		$this->messages = [
			"Bonjour, bienvenue dans l'interface dailystandup",
			"Créer votre projet, hace a nice day",
			"Bon travail, just do it"
		];
	}	

	public function getHappyMessage()
	{

		$index = array_rand($this->messages);
		return $this->messages[$index];
	}

	public function getAllHappyMessages() 
	{
		return $this->messages;
	}
}
?>