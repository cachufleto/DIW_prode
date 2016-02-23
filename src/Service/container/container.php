<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 23/02/2016
 * Time: 16:38
 */

namespace Service\container;


class container
{
    public $instances = [];

    public function add($class, $object)
    {
        if(!isset($this->instances[$class])) {
            return $this->instances[$class] = $object;
        }
    }

    public function get($class)
    {
        if(isset($this->instances[$class])) {
            return $this->instances[$class];
        }
    }

}