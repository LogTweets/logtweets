<?php
namespace LogTweets\Bundle\OrganisationBundle\Entity;

use DomainException;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="server")
 */
class Server
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="server_id")
     **/
    private $id;

    /**
     * @var @ORM\Column(type="string", name="server_name")
     */
    private $name;

    /**
     * @var @ORM\Column(type="datetime", name="server_created_on")
     */
    private $createdOn;

    /**
     * @var @ORM\Column(type="datetime", name="server_updated_on")
     */
    private $updatedOn;

    public function __construct(User $founder)
    {
        $this->createdOn = new DateTime();
        $this->updatedOn = new DateTime();
    }

    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

}