<?php

namespace RevStrat\AgeGate;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class PageExtension extends Extension {
    private static $db = [
        'AgeGated' => 'Boolean',
        'MinimumAgeOverrride' => 'Int',
        'AccessDeniedURLOverride' => 'Varchar(512)',
        'AgeGateContentOverride' => 'HTMLText'
    ];

    public function updateCMSFields(FieldList $fields) {
        $fields->findOrMakeTab('Root.AgeGateControl', _t(__CLASS__ . '.TAB_TITLE', 'Age Gate Control'));
        $fields->addFieldToTab('Root.AgeGateControl', CheckboxField::create('AgeGated', _t(__CLASS__ . '.AGE_GATED', 'Age gated')));
        $fields->addFieldToTab('Root.AgeGateControl', NumericField::create('MinimumAgeOverrride', _t(__CLASS__ . '.MIN_AGE_OVERRIDE', 'Override minimum age')));
        $fields->addFieldToTab('Root.AgeGateControl', TextField::create('AccessDeniedURLOverride', _t(__CLASS__ . '.ACCESS_DENIED_URL_OVERRIDE', 'Override access denied URL')));
        $fields->addFieldToTab('Root.AgeGateControl', HTMLEditorField::create('AgeGateContentOverride', _t(__CLASS__ . '.CONTENT_OVERRIDE', 'Override content for age gate on this page')));
    }
}