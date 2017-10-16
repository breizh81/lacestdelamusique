<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/loginj", name="connexion")
     */
    public function loginAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/login.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/liste-sequences", name="liste-sequences")
     */
    public function listeSequencesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sequences = $em->getRepository('AppBundle:Sequence')->findAll();
        // replace this example code with whatever you need
        return $this->render('@App/liste-sequences.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'sequences' => $sequences,
        ]);
    }
    /**
     * @Route("/sequence", name="sequence")
     */
    public function sequenceAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/sequence.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
