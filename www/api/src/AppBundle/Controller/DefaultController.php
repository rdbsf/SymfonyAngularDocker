<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Coffee;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use HireVoice\Neo4j\EntityManager;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/add", name="add")
     */
    public function addAction(Request $request)
    {
        $em = new EntityManager(array(
            // 'transport' => 'curl', // or 'stream'
            'host' => 'neo4j',
            'port' => 7474,
            'username' => 'neo4j',
            'password' => 'neo5j',
            // 'proxy_dir' => '/tmp',
            // 'debug' => true, // Force proxy regeneration on each request
            // 'annotation_reader' => ... // Should be a cached instance of the doctrine annotation reader in production
        ));

        $coffee = new Coffee();
        $coffee->setName('Blue Bottle Coffee');
        $em->persist($coffee);
        $em->flush();

        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:add.html.twig');
    }
}
