<?php

require "General.php";
use OpenApi\Annotations as OA;

class Compte extends General{


/**
        *@OA\Get(
        *   path="/comptes",
        *   @OA\Response(
        *       response="200",
        *       description="Compte récupéré",
        *       @OA\JsonContent(type="array", description="", @OA\Items(ref="#/components/schemas/Compte")),
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
     *      path="/comptes",
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

 * @OA\Put(
     *      path="/comptes",
     *      @OA\Response(
     *          response="200",
     *          description="Compte modifié",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Le compte à été modifié"
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
        *                  example="Le compte n'a pas été modifié"
        *              )
        *          ),
        *      )
        *)
    *)
    */

    protected $table = "compte";
}
