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

    public function i18n_singular_name()
    {
        return _t(__CLASS__ . '.SINGULAR_NAME', 'Age Gate Country');
    }

    public function i18n_plural_name()
    {
        return _t(__CLASS__ . '.PLURAL_NAME', 'Age Gate Countries');
    }

    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);
        $labels['CountryCode'] = _t(__CLASS__ . '.db_CountryCode', 'Country Code');
        $labels['Age'] = _t(__CLASS__ . '.db_Age', 'Age');
        return $labels;
    }
}