<?php

namespace app\models;

use Flight;
use app\models\General;

class Client {
    
    private $general;

    public function __construct($general)
    {
        $this->general = $general;
    }

    public function signup($name,$pwd,$tel,$mail) {
        $tablename='client_habitation';
        $data='("%s","%s",%s,"%s")';
        $data=sprintf($data,$id,$name,$pwd);
        $this->general->insert($tablename,$data);
    }

    public function login($log,$pwd,$columnName) {
        $tablename='client_habitation';
        $condition='WHERE %s="%s"';
        $condition=sprintf($condition,$columnName,$log);
        $clients = $this->general->getAll($tablename,$condition);
        if($clients==null) {return null;}
        else {     //si aucun utilisateur
            foreach($clients as $client) {      //si il y a utilisateur(s)
                if($client['mdp']==$pwd) {
                    return true;        //utilisateur trouve
                }
            }
            return false;       //mot de passe incorrect
        }
    }

    public function loginByMail($log,$pwd) {
        $columnName="mail";
        return $this->login($log,$pwd,$columnName);
    }

    public function loginByTel($log,$pwd) {
        $columnName="numero_telephone";
        return $this->login($log,$pwd,$columnName);
    }

    public function getAllHabitation() {
        $tablename="habitation_all";
        $condition="";
        return $this->general->getAll($tablename,$condition);
    }

    public function recherche($criteria) {
        $tablename="habitation_all";
        $condition="WHERE description like '%s'";
        $criteria="%".$criteria."%";
        $condition=sprintf($condition,$criteria);
        return $this->general->getAll($tablename,$condition);
    }
    public function getDetails($id) {
        $tablename="habitation_all";
        $condition="WHERE id_habitation=%s";
        $condition=sprintf($condition,$id);
        return $this->general->getAll($tablename,$condition);
    }

    public function reserver($datedebut,$datefin,$idhabitation,$idclient) {
        $tablename="dateprise";
        $condition="";
        $dateprises=$this->general->getAll($tablename,$condition);
        if($dateprises==null){return true;}
        foreach($dateprises as $dateprise) {
            if($this->general->isDateBetween($datedebut,$dateprise['date_debut'],$dateprise['date_fin'])
             && $this->general->isDateBetween($datefin,$dateprise['date_debut'],$dateprise['date_fin'])) {      
                return false;   
            }
        }
        $tablename="reservation_habitation";
        $column="(date_debut,date_fin,id_habitation,id_client)";
        $data="('%s','%s',%s,%s)";
        $data=sprintf($data,$datedebut,$datefin,$idhabitation,$idclient);      
        Flight::General()->insert($tablename,$column,$data);
        return true;
    }
}