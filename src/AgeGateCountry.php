<?php

namespace RevStrat\AgeGate;

use SilverStripe\ORM\DataObject;

class AgeGateCountry extends DataObject
{
    private static $db = [
        'CountryCode' => 'Varchar(4)',
        'Age' => 'Int'
    ];

    private static $summary_fields = [
        'CountryCode',
        'Age'
    ];

    private static $table_name = "AgeGateCountry";
}