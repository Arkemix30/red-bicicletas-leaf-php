<?php

namespace App\Serializers;

use Respect\Validation\Validator as v;

class BikeSerializer
{
    public static function validate(array $data)
    {
        $validator = v::key('model', v::stringType()->notEmpty())
            ->key('color', v::stringType()->notEmpty())
            ->key('description', v::stringType()->notEmpty())
            ->key('rent_price', v::floatType()->notEmpty())
            ->key('image', v::stringType()->notEmpty())
            ->key('lat', v::floatType()->notEmpty())
            ->key('lng', v::floatType()->notEmpty());

        return $validator->validate($data);
    }
}
