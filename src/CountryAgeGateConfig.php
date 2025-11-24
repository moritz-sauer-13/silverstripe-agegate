<?php

namespace RevStrat\AgeGate;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class CountryAgeGateConfig extends Extension
{
    private static $db = [
        'AgeGateContent' => 'HTMLText',
        'AccessDeniedURL' => 'Varchar(512)',
        'GlobalAgeGate' => 'Boolean',
        'RedirectMessage' => 'HTMLText'
    ];

    private static $has_many = [
        'AgeGateCountries' => AgeGateCountry::class
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->findOrMakeTab('Root.AgeGateControl', _t(__CLASS__ . '.TAB_TITLE', 'Age Gate Control'));
        $fields->addFieldToTab('Root.AgeGateControl', CheckboxField::create('GlobalAgeGate', _t(__CLASS__ . '.GLOBAL_AGE_GATE', 'Activate age gate for all pages')));
        $fields->addFieldToTab('Root.AgeGateControl', HTMLEditorField::create('AgeGateContent', _t(__CLASS__ . '.CONTENT', 'Age Gate Content')));
        $fields->addFieldToTab('Root.AgeGateControl', TextField::create('AccessDeniedURL', _t(__CLASS__ . '.ACCESS_DENIED_URL', 'Redirect for access denied')));
        $fields->addFieldToTab('Root.AgeGateControl', HTMLEditorField::create('RedirectMessage', _t(__CLASS__ . '.REDIRECT_MESSAGE', 'Message to show if no redirect is present')));
        $fields->addFieldToTab('Root.AgeGateControl', GridField::create('AgeGateCountries', _t(__CLASS__ . '.COUNTRIES', 'Age Gate Countries'), AgeGateCountry::get(), GridFieldConfig_RecordEditor::create()));
    }
}