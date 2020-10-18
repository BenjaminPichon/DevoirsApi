<?php

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class User {

    /**
     * @OA\Property(
     *      type="integer"
     * )
     *
     * @var id
     */
    private $id;

    /**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $nom;

    /**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $prenom;

 /**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $email;

 /**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $password;
}