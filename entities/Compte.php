<?php

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Compte {

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
     *      type="integer"
     * )
     *
     * @var id
     */
    private $user_id;

 /**
     * @OA\Property(
     *      type="integer"
     * )
     *
     * @var [type]
     */
    private $fond;

/**
     * @OA\Property(
     *      type="string"
     * )
     *
     * @var [type]
     */
    private $type;

/**
     * @OA\Property(
     *      type="integer"
     * )
     *
     * @var [type]
     */
    private $actif;
}