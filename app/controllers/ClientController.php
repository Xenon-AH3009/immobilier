<?php

namespace app\controllers;

use Flight;
use app\models\Client;

class ClientController {

	public function __construct() {
		
	}

	public function loginByMailPage() {
		$retour=['page'=>'loginByMail'];
		Flight::render('frontoffice/connection/template',$retour);
	}
	public function loginByTelPage() { 
		$retour="loginByTel";
		Flight::render('frontoffice/connection/template',$retour);
	}
	
	public function signupPage(){
		$retour=['page'=>'signup'];
		Flight::render('frontoffice/connection/template',$retour);
	}

	public function traitementLogin() {
        $column=Flight::request()->data->column;
        $log=Flight::request()->data->log;
        $pwd=Flight::request()->data->pwd;
		$login=Flight::Client()->login($log,$pwd,$column);
		if($login===true) {
			$tablename="client_habitation";
			$condition="WHERE %s='%s' AND mdp='%s'";
			$condition=sprintf($condition,$column,$log,$pwd);
			$client=Flight::General()->getAll($tablename,$condition);
			$_SESSION['client']=$client[0]['id_client'];
			$this->pageHome();
		} 
		if($login===false) {
			$retour=['page'=>'loginByMail','error'=>'1'];
			Flight::render('frontoffice/connection/template',$retour);
		}
		if($login===null) {
			$retour=['page'=>'loginByMail','error'=>'0'];
			Flight::render('frontoffice/connection/template',$retour);		
		}
    }

    public function traitementSignup() {
        /*nomClient VARCHAR(200),
        mdp VARCHAR(200),
        numero_telephone INT(14),
        mail VARCHAR(100)*/
		$nom=Flight::request()->data->nom;
		$mail=Flight::request()->data->mail;
        $tel=Flight::request()->data->tel;
        $pwd=Flight::request()->data->pwd;
		Flight::Client()->signup($nom,$pwd,$tel,$mail);
		$retour=['page'=>'login'];
		Flight::render('frontoffice/connection/template',$retour);
	}

	public function pageHome() {
		$list=Flight::Client()->getAllHabitation();
		$retour=['page'=>'home','list'=>$list];
		Flight::render('frontoffice/page/template',$retour);
	}

	public function deconnection() {
		$_SESSION['client_habitation']=null;
		session_unset();
		$this->loginByMailPage();
	}

	function rechercheDescr() {
		$criteria=Flight::request()->query->criteria;
		$list=Flight::Client()->recherche($criteria);
		$retour=['page'=>'home','list'=>$list];
		Flight::render('frontoffice/page/template',$retour);
	}

	function getDetails($id) {
		if (!is_numeric($id) || intval($id) <= 0) {
			Flight::halt(400, 'Invalid ID');
		}
		$id=intval($id);
		$habitation=Flight::Client()->getDetails($id);
		$retour=['page'=>'detail','list'=>$habitation];
		Flight::render('frontoffice/page/template',$retour);
	}

	function insertionReservation($idhabitation) {
		if(!isset($_SESSION['client_habitation'])){
			$retour=['page'=>'home'];
			$this->pageHome();
		}else{
		if (!is_numeric($idhabitation) || intval($idhabitation) <= 0) {
			Flight::halt(400, 'Invalid ID');
		}
			$datedebut=Flight::request()->data->datedebut;
			$datefin=Flight::request()->data->datefin;
			$idhabitation=(int)$idhabitation;
        	$idclient=$_SESSION['client_habitation'];
			$reservation=Flight::Client()->reserver($datedebut,$datefin,$idhabitation,$idclient);
			$habitation=Flight::Client()->getDetails($idhabitation);
			$retour=['page'=>'detail','feedback'=>$reservation,'list'=>$habitation];
			Flight::render('frontoffice/page/template',$retour);
		}
	}


}