<?php 
    namespace app\models;

    use Flight;
    
    class General {
        
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function idGenerator($tablename,$idColumnName,$idname) {
            $sql="SELECT %s FROM %s WHERE datecreated=(select max(datecreated) from %s)";
            $sql=sprintf($sql,$idColumnName,$tablename,$tablename);
            $data=$this->db->fetchField($sql);
            if(!isset($data)) {
                $id='%s%s';    
                $id=sprintf($id,$idname,'1');
                return $id;
            } else {
                if (is_string($data) && strpos($data, $tablename) !== false) {
                    $cleanedData = str_replace($tablename, "", $data); // Supprime $tablename de $data
                    $idInt = intval($cleanedData); // Convertit en entier
                } else {
                    $idInt = null; // Retourne une valeur par défaut en cas d'erreur
                }                
                $idInt++;
                $id="%s%s";
                $id=sprintf($id,$idname,$idInt);
                return $id;
            }
        }
        
        public function getAll($tablename,$condition) {
            $sql='SELECT * FROM %s %s';
            $sql=sprintf($sql,$tablename,$condition);
            $stmt=$this->db->fetchAll($sql);
            $data=array();
            foreach($stmt as $temp) {
                $data[]=$temp;
            }
            return $data;
        }

        public function get($tablename,$condition,$column) {
            $sql='SELECT %s FROM %s %s';
            $sql=sprintf($sql,$column,$tablename,$condition);
            $stmt=$this->db->fetchAll($sql);
            $data=array();
            foreach($stmt as $temp) {
                $data[]=$temp;
            }
            return $data;
        }

        public function insertAll($tablename,$data) {
            $sql='INSERT INTO %s VALUES %s';
            $sql=sprintf($sql,$tablename,$data);
            return $this->db->runQuery($sql);
        }

        public function insert($tablename,$column,$data) {
            $sql='INSERT INTO %s%s VALUES %s';
            $sql=sprintf($sql,$tablename,$column,$data);
            return $this->db->runQuery($sql);
        }

        public function modify($tablename,$modification,$condition) {
            $sql='UPDATE %s SET %s %s';
            $sql=sprintf($sql,$tablename,$modification,$condition);
            return $this->db->runQuery($sql);
        }

        public function delete($tablename,$condition) {
            $sql='DELETE FROM %s WHERE %s';
            $sql=sprintf($sql,$tablename,$condition);
            return $this->db->runQuery($sql);
        }

        public function isDateBetween($date, $start_date, $end_date) {
            $date = strtotime($date);
            $start_date = strtotime($start_date);
            $end_date = strtotime($end_date);
        
            if ($date >= $start_date && $date <= $end_date){return true;}else{false;}
        }    
    }