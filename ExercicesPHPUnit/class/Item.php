<?php

class Item
{
    public function getDescription()
    {
        return $this->getID().$this->getToken();
    }

    protected function getID()
    {
        return rand();
    }

    protected function getToken()
    {
        return uniqid();
    }

    public function getPrefixedToken($prefix)
    {
        return uniqid($prefix);
    }
}
