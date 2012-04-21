<?php
namespace LogTweets\Bundle\OrganisationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LogTweetsOrganisationBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}