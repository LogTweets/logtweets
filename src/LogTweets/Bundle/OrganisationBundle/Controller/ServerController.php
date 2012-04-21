<?php
namespace LogTweets\Bundle\OrganisationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use LogTweets\Bundle\OrganisationBundle\Entity\Server;
use Doctrine\ORM\EntityManager;


class ServerController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/add", name="LogTweetsOrganisationBundle_Server_add")
     * @Template("LogTweetsOrganisationBundle:Server:index.html.twig")
     * @Method("post")
     * @return array
     */
    public function addAction()
    {

        /**
         * @var Symfony\Component\HttpFoundation\ParameterBag $request
         */
        $serverName = $this->getRequest()->get('_servername');

        $product = new Server();
        $product->setName($serverName);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();



        
        return array( '' );
    }

}