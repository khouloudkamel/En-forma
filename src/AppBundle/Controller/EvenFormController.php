<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EvenForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Evenform controller.
 *
 * @Route("evenform")
 */
class EvenFormController extends Controller
{
    /**
     * Lists all evenForm entities.
     *
     * @Route("/", name="evenform_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenForms = $em->getRepository('AppBundle:EvenForm')->findAll();

        return $this->render('evenform/index.html.twig', array(
            'evenForms' => $evenForms,
        ));
    }

    /**
     * Creates a new evenForm entity.
     *
     * @Route("/new", name="evenform_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evenForm = new Evenform();
        $form = $this->createForm('AppBundle\Form\EvenFormType', $evenForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenForm);
            $em->flush();

            return $this->redirectToRoute('evenform_show', array('idEvent' => $evenForm->getIdevent()));
        }

        return $this->render('evenform/new.html.twig', array(
            'evenForm' => $evenForm,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evenForm entity.
     *
     * @Route("/{idEvent}", name="evenform_show")
     * @Method("GET")
     */
    public function showAction(EvenForm $evenForm)
    {
        $deleteForm = $this->createDeleteForm($evenForm);

        return $this->render('evenform/show.html.twig', array(
            'evenForm' => $evenForm,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenForm entity.
     *
     * @Route("/{idEvent}/edit", name="evenform_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EvenForm $evenForm)
    {
        $deleteForm = $this->createDeleteForm($evenForm);
        $editForm = $this->createForm('AppBundle\Form\EvenFormType', $evenForm);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenform_edit', array('idEvent' => $evenForm->getIdevent()));
        }

        return $this->render('evenform/edit.html.twig', array(
            'evenForm' => $evenForm,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evenForm entity.
     *
     * @Route("/{idEvent}", name="evenform_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EvenForm $evenForm)
    {
        $form = $this->createDeleteForm($evenForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenForm);
            $em->flush();
        }

        return $this->redirectToRoute('evenform_index');
    }

    /**
     * Creates a form to delete a evenForm entity.
     *
     * @param EvenForm $evenForm The evenForm entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EvenForm $evenForm)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenform_delete', array('idEvent' => $evenForm->getIdevent())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
