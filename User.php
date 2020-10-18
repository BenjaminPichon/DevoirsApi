<?php

use Firebase\JWT\JWT;

require "General.php";

use OpenApi\Annotations as OA;

    class User extends General{

        protected $table = "user";

       
    /**
        *@OA\Get(
        *   path="/users",
        *   @OA\Response(
        *       response="200",
        *       description="Liste des utilisateurs",
        *       @OA\JsonContent(type="array", description="", @OA\Items(ref="#/components/schemas/User")),
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
     *      path="/users",
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
     *     *@OA\Response(
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
     * )
    */ 


    /**
     * Save user
     *
     * @param array $param
     * @return void
     */
    public function save($param){
        $statement = "INSERT INTO user (nom, prenom, email, password)
                        VALUES (:nom, :prenom, :email, :password)";
        $param["nom"]= htmlspecialchars($param["nom"]);
        $param["prenom"]= htmlspecialchars($param["prenom"]);
        $param["email"]= htmlspecialchars($param["email"]);
        $param["password"]= password_hash($param["password"], PASSWORD_DEFAULT);
        $this->db->prepare($statement, 'save', $param);
    }

    public function connexion ($param){
        $statement = "SELECT * FROM user WHERE email='".$param["email"]."'";
        $user = $this->db->queryReturn($statement, true);
        if (password_verify($param["password"], $user->password)) {
            $key = "demo";
            $payload = array(
                "exp" => time() * 600,
                "email" => $user->email,
            );
            $jwt = JWT::encode($payload, $key);
            $this->app->sendData("connexion réussie", true, $jwt);
        }
        else{
            $this->app->sendData("erreur de connexion");
        }
    }
}