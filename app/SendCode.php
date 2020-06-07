<?php
namespace App;

class SendCode
{
    public static function sendCode($phone)
    {
        $code=rand(1111,9999);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to'=>'+222'.(int)$phone,
            'from'=>'ANAPEJ',
            'text'=>'Vérifier le code :'.$code,
        ]);
        return $code;
    }
}
