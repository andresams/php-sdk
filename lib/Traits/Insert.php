<?php

namespace Paggi\Traits;

use \Paggi\RestClient;

/**
 * Trait insert - Insert/Create a new resource
 * @package Paggi
 */
trait Insert
{
    /**
     * POST METHOD
     * @param $rest - The RestClient object
     * @param $params - Resource paramns
     * @return mixed - Exception or response
     */
    static protected function create($params)
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        //return $class->newInstanceArgs($curl->response);
        return self::manageResponse($curl);
    }
}