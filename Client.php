<?php 
    require "General.php";

use OpenApi\Annotations as OA;

    class Client extends General{

/**
        *@OA\Get(
        *   path="/clients",
        *   @OA\Response(
        *       response="200",
        *       description="Connecté",
        *       @OA\JsonContent(type="array", description="", @OA\Items(ref="#/components/schemas/Client")),
        *       
        *),

        *@OA\Response(
        *          response="404",
        *          description="Erreur 404",
        *          @OA\JsonContent(
        *              @OA\Property(
        *                  property="message",
        *                  type="string",
        *                  example="Utilisateur ou mots de passe incorrecte"
        *              )
        *          ),
        *      )
        *)

   * @OA\Post(
     *      path="/clients",
     *      @OA\Response(
     *          response="200",
     *          description="Compte enregistré",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Données sauvegardées"
     *              )
     *          )
     *      ),
     *     @OA\Response(
        *          response="404",
        *          description="Erreur 404",
        *          @OA\JsonContent(
        *              @OA\Property(
        *                  property="message",
        *                  type="string",
        *                  example="Il y a eux un problème lors de la création"
        *              )
        *          ),
        *      )
*)
    */



            /**
         * Client connexion
         *
         * @param array $param
         */
        public function connexion($param)
        {
            $statement = ("SELECT * FROM client WHERE nom='". $param["nom"] ."'");
            $client = $this->db->queryReturn($statement, true);
            if (password_verify($param["password"], $client["password"])) {
                $this->app->sendData("connexion ok", true, $client["secret_api_key"]);
            }
        }

        /**
         * Save client in Db
         *
         * @param array $param
         * @return void
         */
        public function save($param){
            $statement = "INSERT INTO $this->table (api_key, role, nom, password) 
                            VALUES (:api_key, :role, :nom, :password )";

            $param["password"] = password_hash($param["password"], PASSWORD_DEFAULT);
            $param["role"] = json_encode(["EXTERNE"]);
            $param["secret_api_key"] = md5(uniqid());

            $this->db->prepare($statement, "save", $param);
        }
    }