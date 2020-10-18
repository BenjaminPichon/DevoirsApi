<?php

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Transaction {

   

    /**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $date;

    /**
     * @OA\Property(
     *      type="integer"
     * )
     *
     * @var [type]
     */
    private $montant;

 /**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $valid;

 /**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $moyenPaiement;

 /**
     * @OA\Property(
     *      type="integer"
     * )
     *
     * @var id
     */
    private $id;
}