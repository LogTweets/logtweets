<?php
namespace LogTweets\Bundle\OrganisationBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="user_id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="LogTweets\Bundle\OrganisationBundle\Entity\Organisation")
     * @ORM\JoinColumn(name="organisation_id", referencedColumnName="organisation_id")
     */
    protected $organisation;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}