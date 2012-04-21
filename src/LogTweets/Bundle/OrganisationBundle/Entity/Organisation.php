<?php
namespace LogTweets\Bundle\OrganisationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use DomainException;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="organisation")
 */
class Organisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="organisation_id")
     **/
    private $id;

    /**
     * @var @ORM\Column(type="string", name="organisation_name")
     */
    private $name;

    /**
     * @var @ORM\Column(type="datetime", name="organisation_created_on")
     */
    private $createdOn;

    /**
     * @var @ORM\Column(type="datetime", name="organisation_updated_on")
     */
    private $updatedOn;

    private $founder;

    /**
      * @ORM\OneToMany(targetEntity="LogTweets\Bundle\OrganisationBundle\Entity\User", mappedBy="Organisation")
      * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
      */
    private $members;

    public function __construct(User $founder)
    {
        $this->founder = $founder;
        $this->members = new ArrayCollection();
        $this->createdOn = new DateTime();
        $this->updatedOn = new DateTime();
    }

    public function getFounder()
    {
        return $this->founder;
    }

    public function addMember(User $member)
    {
        if ($this->members->contains($member)) {
            throw new DomainException('Already a member of the organisation');
        }

        $this->members->add($member);
    }

    public function removeMember(User $member)
    {
        if (!$this->members->contains($member)) {
            throw new DomainException('Cannot remove member from the organisation. Not a member');
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

}