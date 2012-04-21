<?php
namespace LogTweets\Bundle\OrganisationBundle\Entity;

use DomainException;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="servergroup")
 */
class ServerGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="servergroup_id")
     **/
    private $id;

    /**
     * @var @ORM\Column(type="string", name="servergroup_name")
     */
    private $name;

    /**
     * @var @ORM\Column(type="datetime", name="servergroup_created_on")
     */
    private $createdOn;

    /**
     * @var @ORM\Column(type="datetime", name="servergroup_updated_on")
     */
    private $updatedOn;

    /**
     * @ORM\OneToMany(targetEntity="LogTweets\Bundle\OrganisationBundle\Entity\Server", mappedBy="ServerGroup")
     * @ORM\JoinColumn(name="servergroup_id", referencedColumnName="servergroup_id")
     */
    private $members;

    public function __construct()
    {
        $this->createdOn = new DateTime();
        $this->updatedOn = new DateTime();
        $this->members = new ArrayCollection();
    }

    public function addMember( User $member )
    {
        if ($this->members->contains($member)) {
            throw new DomainException( 'Already a member of the servergroup' );
        }

        $this->members->add($member);
    }

    public function removeMember( User $member )
    {
        if (!$this->members->contains($member)) {
            throw new DomainException( 'Cannot remove member from the servergroup. Not a member' );
        }
        $this->members->removeElement($member);
    }

    public function getMembers()
    {
        return $this->members->toArray();
    }

    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * @param string $name
     */
    public function setName( $name )
    {
        $this->name = $name;
    }

    /**
     * @return
     */
    public function getName()
    {
        return $this->name;
    }

}