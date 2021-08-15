<?php

namespace Sunnysideup\EditeInSiteTreeButton\Extension;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\LiteralField;


use SilverStripe\Control\Controller;

use SilverStripe\Core\Extension;

use SilverStripe\ORM\FieldType\DBField;

class EditInSiteTreeButtonMaker extends Extension
{

    public function updateFormActions(FieldList $fields)
    {
        if ($this->isSiteTreeRecord()) {
            $record = $this->owner->getRecord();
            $phrase = _t(__CLASS__ . '.EditInSiteTree', '⇱ Edit in SiteTree');
            $fields->fieldByName('MajorActions')->unshift(
                LiteralField::create(
                    'EditInSiteTreeButton',
                    '<a href="'.$record->CMSEditLink().'" class="btn action" style="border: 1px solid #dbe0e9; margin-right: 10px;">' . $phrase . '</a>'
                )
            );
        }
    }

    protected function isSiteTreeRecord() : bool
    {
        $record = $this->owner->getRecord();
        return $record and $record instanceof SiteTree ? true : false;
    }


}
