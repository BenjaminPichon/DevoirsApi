<?php 
    require "General.php";

    class Transaction extends General{
        protected $table = "transaction";


        public function saved($param, $params){
            $statement = "INSERT INTO transaction (date, montant, valide, moyenPaiement, compte_id)
                            VALUES (:date, :montant, :valide, :moyenPaiement, :compte_id)";
            $statements = "SELECT * from compte WHERE id". $param['compte_id'];
            $possible = $params["fond"] - $param["montant"];

            if($possible > 0){
                $param["date"]= date('d-m-Y');
                $this->db->prepare($statement, 'save', $param);
                $this->db->prepare($statements, 'put', $params);
            }
            else{
                echo "pas assez de fond";
            }
            
            
        }
    }