<?php

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Client {

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
    private $password;
}