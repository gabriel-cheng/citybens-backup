<?php

namespace App\Services\Cleaners;

class Cleaner {
    public function removeNotNumbers(String $value)
    {
        return preg_replace("/[^0-9]/", "", $value);
    }

}
