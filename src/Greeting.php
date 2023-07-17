<?php


namespace Src;


class Greeting
{
    public function say($name)
    {
        if(!$name)  {
            throw new \Exception("Invalid name");
        }

        return "Hello" . $name;
    }
}