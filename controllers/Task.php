<?php

class Task
{
    public $name;
    public $data;
    public $correct_answer;
    public $cost;


    public function __construct($name, $data, $correct_answer, $cost)
    {
        $this->name = $name;
        $this->data = $data;
        $this->correct_answer = $correct_answer;
        $this->cost = $cost;
    }
}