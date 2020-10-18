<?php 
    require "General.php";

    class Transaction extends General{
        protected $table = "transaction";
    /**
     * Save user
     *
     * @param array $param
     * @return void
     */


        public function saved($param, $params){
            $statement = "INSERT INTO transaction (date, montant, valide, moyenPaiement, compte_id)
                            VALUES (:date, :montant, :valide, :moyenPaiement, :compte_id)";

            // $param["montant"]= is_numeric($param["montant"]);
            // $param["date"]= ($param["date"]);
            // $param["valide"]= is_bool($param["valide"]);
            // $param["moyenPaiement"]= htmlspecialchars($param["moyenPaiement"]);
            // $param["compte_id"]= is_integer($param["compte_id"]);

            $statements = "SELECT * from compte WHERE id". $param['compte_id'];
            $this->db->prepare($statement, 'saved', $param);
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