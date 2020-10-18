<?php 
    require "General.php";
use OpenApi\Annotations as OA;

    class CB extends General{


/**
        *@OA\Get(
        *   path="/CB",
        *   @OA\Response(
        *       response="200",
        *       description="Compte récupéré",
        *       @OA\JsonContent(type="array", description="", @OA\Items(ref="#/components/schemas/CB")),
        *       
        *),

        *@OA\Response(
        *          response="404",
        *          description="Erreur 404",
        *          @OA\JsonContent(
        *              @OA\Property(
        *                  property="message",
        *                  type="string",
        *                  example="Compte introuvable"
        *              )
        *          ),
        *      )
        *)

   * @OA\Post(
     *      path="/CB",
     *      @OA\Response(
     *          response="200",
     *          description="CB enregistré",
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
        *                  example="Il y a eux un problème lors de l'enregistrement"
        *              )
        *          ),
        *      )
        *)

 * @OA\Put(
     *      path="/CB",
     *      @OA\Response(
     *          response="200",
     *          description="CB modifié",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="La CB à été modifié"
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
        *                  example="La CB n'a pas été modifié"
        *              )
        *          ),
        *      )
        *)
    *)
    */
        protected $table = "cb";
    }