<?php
include_once __DIR__.'/../../model/Mrendez_vous.php';

class Rendez_vousControler{

	function index()
	{
		session_start();

		$rendez_vous = new Mrendez_vous();
		$groupes=$rendez_vous->getSelect();

		// $horaire = new Mreservation();
		// $horaire=$horaire->res2CreneauHoraire($groupe,$dateSeance);

		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
		require_once __DIR__.'/../../view/créneaux_disponibles..php';
		}else{
			header("location: http://localhost/www/brief_6_VueJs_API/");
		}
	}

	function page_add(){
		require_once __DIR__.'/../../view/ajouter_un_créneau.php';
	}

	function save(){

		session_start();
		$i = 0;
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			if(isset($_POST['submit'])){
				$date=$_POST['date'];
				$typeConsultation=$_POST['typeConsultation'];
				$horaire=$_POST['horaire'];

				// date
				// typeConsultation
				// horaire
				// reference

				$groupe = new Mrendez_vous();
				$groupe->save($date,$typeConsultation,$horaire);

				
				
				header("location: http://localhost/www/brief_6_VueJs_API/rendez_vous/index");
				
			}
		}else{
			header("location: http://localhost/www/brief_6_VueJs_API/");
		}
		
	}

	function edit()
	{
		if(isset($_POST['update'])){
			$id=$_POST['updateID'];

			$groupe = new Mrendez_vous();
			$groupes=$groupe->edit($id);

			require_once __DIR__.'/../view/updateGroupe.php';

		}
	}

	function update()
	{
		if(isset($_POST['submit'])){
			$Libelle=$_POST['Libelle'];
			$effectif=$_POST['effectif'];
			$id=$_POST['id'];

			$Mrendez_vous = new Mrendez_vous();
			$Mrendez_vous->update($Libelle,$effectif,$id);
			
			header("location: http://localhost/www/brief_6_VueJs_API/rendez_vous/");

		}
	}

	function delete()
	{
		if(isset($_POST['submit'])){
			$id=$_POST['DeleteID'];
			$Mrendez_vous = new Mrendez_vous();
			$Mrendez_vous->delete($id);

			header("location: http://localhost/www/brief_6_VueJs_API/rendez_vous/index");

		}
		
	}

	
}
