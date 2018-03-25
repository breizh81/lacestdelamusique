<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sequence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sequence controller.
 *
 * @Route("backend/sequence")
 */
class SequenceController extends Controller
{
    /**
     * Lists all sequence entities.
     *
     * @Route("/", name="backend_sequence_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sequences = $em->getRepository('AppBundle:Sequence')->findAll();

        $deleteForms = [];

        foreach ($sequences as $sequence)
            $deleteForms[$sequence->getId()] = $this->createDeleteForm($sequence)->createView();


        return $this->render('@App/backend/sequence/index.html.twig', [
            'sequences' => $sequences,
            'delete_forms' => $deleteForms
        ]);
    }

    /**
     * Creates a new sequence entity.
     *
     * @Route("/new", name="backend_sequence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Sequence $sequence=null)
    {
        $sequence ? $deleteForm = $this->createDeleteForm($sequence)->createView() : $deleteForm=null;


        $form = $this->createForm('AppBundle\Form\SequenceType', $sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sequence);
            $em->flush();

            return $this->redirectToRoute('backend_sequence_show', array('id' => $sequence->getId()));
        }

        return $this->render('@App/backend/sequence/edit.html.twig', [
            'sequence' => $sequence,
            'edit_form' => $form->createView(),
            'delete_form' => $deleteForm,

        ]);
    }

    /**
     * Finds and displays a sequence entity.
     *
     * @Route("/{id}", name="backend_sequence_show")
     * @Method("GET")
     */
    public function showAction(Sequence $sequence)
    {
        $deleteForm = $this->createDeleteForm($sequence);

        return $this->render('@App/backend/sequence/show.html.twig', array(
            'sequence' => $sequence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sequence entity.
     *
     * @Route("/{id}/edit", name="backend_sequence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {


        $sequence = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Sequence')->findOneById($id);


        return $this->newAction($request, $sequence);

    }

    /**
     * Deletes a sequence entity.
     *
     * @Route("/{id}", name="backend_sequence_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sequence $sequence)
    {
        $form = $this->createDeleteForm($sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sequence);
            $em->flush();
        }

        return $this->redirectToRoute('backend_sequence_index');
    }

    /**
     * Creates a form to delete a sequence entity.
     *
     * @param Sequence $sequence The sequence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sequence $sequence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_sequence_delete', array('id' => $sequence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
