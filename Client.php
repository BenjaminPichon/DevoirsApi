<?php 
    require "General.php";

    class Client extends General{
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