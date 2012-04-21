<?php
namespace LogTweets\Bundle\OrganisationBundle\Tests\Entity;

use PHPUnit_Framework_TestCase as TestCase;
use LogTweets\Bundle\OrganisationBundle\Entity\Server;
use LogTweets\Bundle\OrganisationBundle\Entity\ServerGroup;
use LogTweets\Bundle\OrganisationBundle\Entity\User;
use DomainException;

class ServerTest extends TestCase
{

    private $serverA, $serverB;

    public function setUp()
    {
        $this->serverA = $this->getMockBuilder('LogTweets\Bundle\OrganisationBundle\Entity\User')
                ->getMock();
        $this->serverB = $this->getMockBuilder('LogTweets\Bundle\OrganisationBundle\Entity\User')
                ->getMock();
    }

    public function testAddingMembersToTheOrganisation()
    {

        $serverGroup = new ServerGroup;
        $serverGroup->setName('local server group');

        $this->assertInternalType('array', $serverGroup->getMembers());
        $this->assertCount(0, $serverGroup->getMembers());
        $this->assertNull($serverGroup->addMember($this->serverA));
        $this->assertInternalType('array', $serverGroup->getMembers());
        $this->assertCount(1, $serverGroup->getMembers());
        $this->assertNull($serverGroup->addMember($this->serverB));
        $this->assertCount(2, $serverGroup->getMembers());
        $this->assertInternalType('array', $serverGroup->getMembers());
        $this->assertNull($serverGroup->removeMember($this->serverB));
        $this->assertCount(1, $serverGroup->getMembers());

        try {
            $serverGroup->addMember($this->serverA);
            $this->fail('Expected exception');
        } catch ( DomainException $e ) {
            $this->assertSame('Already a member of the servergroup', $e->getMessage());
        }

        try {
            $serverGroup->removeMember($this->serverB);
            $this->fail('Expected exception');
        } catch ( DomainException $e ) {
            $this->assertSame('Cannot remove member from the servergroup. Not a member', $e->getMessage());
        }
    }

}
