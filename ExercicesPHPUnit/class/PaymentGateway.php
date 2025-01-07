<?php

class PaymentGateway
{
    public function charge($amount)
    {
        $newAmount = $amount + 5;

        return $newAmount." euros";
    }
}
