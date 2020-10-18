<?php 
    require "General.php";

    use OpenApi\Annotations as OA;

    class Transaction extends General{
        protected $table = "transaction";


 /**
        *@OA\Get(
        *   path="/transactions",
        *   @OA\Response(
        *       response="200",
        *       description="Solde suffisant",
        *       @OA\JsonContent(type="array", description="", @OA\Items(ref="#/components/schemas/Transaction")),
        *       
        *),

        *@OA\Response(
        *          response="404",
        *          description="Erreur 404",
        *          @OA\JsonContent(
        *              @OA\Property(
        *                  property="message",
        *                  type="string",
        *                  example="Solde insuffisant"
        *              )
        *          ),
        *      )
        *)
    */


    /**
     * Save user
     *
     * @param array $param
     * @return void
     */

        public function saved($param, $params){
            $statement = "INSERT INTO transaction (date, montant, valide, moyenPaiement, compte_id)
                            VALUES (:date, :montant, :valide, :moyenPaiement, :compte_id)";

            $statements = "SELECT * from compte WHERE id". $param['compte_id'];
            $this->db->prepare($statement, 'saved', $param);
            $possible = $params["fond"] - $param["montant"];
            if($possible > 0){
                $param["date"]= date('d-m-Y');
                $param["montant"]= is_numeric($param["montant"]);
                $param["valide"]= is_bool($param["valide"]);
                $param["moyenPaiement"]= htmlspecialchars($param["moyenPaiement"]);
                $param["compte_id"]= is_integer($param["compte_id"]);
                $this->db->prepare($statement, 'save', $param);
                $this->db->prepare($statements, 'put', $params);
                echo "payement effectué";
            }
            else{
                echo "pas assez de fond";
            }
        }
    }