<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Devoir;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Devoir controller.
 *
 * @Route("backend/devoir")
 */
class DevoirController extends Controller
{
    /**
     * Lists all devoir entities.
     *
     * @Route("/", name="backend_devoir_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $deleteFormArray = [];

        $devoirs = $em->getRepository('AppBundle:Devoir')->findAll();

        foreach ($devoirs as $devoir)
            $deleteFormArray[$devoir->getId()] = $this->createDeleteForm($devoir)->createView();

        return $this->render('devoir/index.html.twig', array(
            'devoirs' => $devoirs,
            'deleteFormArray' => $deleteFormArray,
        ));
    }

    /**
     * Finds and displays a devoir entity.
     *
     * @Route("/{id}", name="backend_devoir_show")
     * @Method("GET")
     */
    public function showAction(Devoir $devoir)
    {
        $deleteForm = $this->createDeleteForm($devoir);

        return $this->render('devoir/show.html.twig', array(
            'devoir' => $devoir,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a new devoir entity.
     *
     * @Route("/new", name="backend_devoir_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $devoir = new Devoir();
        $form = $this->createForm('AppBundle\Form\DevoirType', $devoir);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($devoir);
            $em->flush();

            return $this->redirectToRoute('backend_devoir_index');
        }

        return $this->render('devoir/new.html.twig', array(
            'devoir' => $devoir,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing devoir entity.
     *
     * @Route("/{id}/edit", name="backend_devoir_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Devoir $devoir)
    {
        $deleteForm = $this->createDeleteForm($devoir);
        $editForm = $this->createForm('AppBundle\Form\DevoirType', $devoir);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('backend_devoir_index');
        }

        return $this->render('devoir/edit.html.twig', array(
            'devoir' => $devoir,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a devoir entity.
     *
     * @Route("/{id}", name="backend_devoir_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Devoir $devoir)
    {
        $form = $this->createDeleteForm($devoir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($devoir);
            $em->flush();
        }

        return $this->redirectToRoute('backend_devoir_index');
    }

    /**
     * Creates a form to delete a devoir entity.
     *
     * @param Devoir $devoir The devoir entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Devoir $devoir)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_devoir_delete', array('id' => $devoir->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
