<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 17/02/2016
 * Time: 16:18
 */


class Address
{
    private $number;
    private $street;
    private $zipcode;
    private $city;

    public function __construct($number, $street, $zipcode, $city)
    {
        $this->number = $number;
        $this->street = $street;
        $this->zipcode = $zipcode;
        $this->city = $city;
    }
}

class Person
{
    private $address;
}