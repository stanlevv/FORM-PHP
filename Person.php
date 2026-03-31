<?php

class Person {
    public $firstname;
    public $lastname;
    public $phone;
    public $address;

    public function __construct($firstname, $lastname, $phone, $address) {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->phone     = $phone;
        $this->address   = $address;
    }

    public function getFullName() {
        return $this->firstname . " " . $this->lastname;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }
}

