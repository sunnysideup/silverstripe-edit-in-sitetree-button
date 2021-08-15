<?php

namespace Sunnysideup\EditeInSiteTree\Extensions;

use SilverStripe\CMS\Controllers\RootURLController;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\CMS\Model\SiteTreeExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Security\Member;

class EditPageInSiteTree extends SiteTreeExtension
{
    public function updateCMSActions(FieldList $fields)
    {
        if ($this->isModelAdmin()) {
            $phrase = _t(__CLASS__ . '.EditInSiteTree', 'Edit in SiteTree');
            $fields->addFieldsToTab(
                'ActionMenus.MoreOptions',
                [
                    LiteralField::create(
                        'EditNote',
                        '
                        <div class=\'cms-sitetree-information\'>
                        	<p class="meta-info" style="white-space: normal;">
                                <a href="'.$this->owner->CMSEditLink().'">' . $phrase . '</a>
                            </p>
                        </div>'
                    ),
                ]
            );
        }
    }

    protected function isModelAdmin()
    {

    }

}
