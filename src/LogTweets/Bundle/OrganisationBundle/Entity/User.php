<?php
namespace LogTweets\Bundle\OrganisationBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="LogTweets\Bundle\OrganisationBundle\Entity\Organisation")
     */
    protected $organisation;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}