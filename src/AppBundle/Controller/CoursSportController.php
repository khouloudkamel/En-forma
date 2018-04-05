<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CoursSport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Courssport controller.
 *
 * @Route("courssport")
 */
class CoursSportController extends Controller
{
    /**
     * Lists all coursSport entities.
     *
     * @Route("/", name="courssport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coursSports = $em->getRepository('AppBundle:CoursSport')->findAll();

        return $this->render('courssport/index.html.twig', array(
            'coursSports' => $coursSports,
        ));
    }

    /**
     * Creates a new coursSport entity.
     *
     * @Route("/new", name="courssport_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $coursSport = new Courssport();
        $form = $this->createForm('AppBundle\Form\CoursSportType', $coursSport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coursSport);
            $em->flush();

            return $this->redirectToRoute('courssport_show', array('idCours' => $coursSport->getIdcours()));
        }

        return $this->render('courssport/new.html.twig', array(
            'coursSport' => $coursSport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coursSport entity.
     *
     * @Route("/{idCours}", name="courssport_show")
     * @Method("GET")
     */
    public function showAction(CoursSport $coursSport)
    {
        $deleteForm = $this->createDeleteForm($coursSport);

        return $this->render('courssport/show.html.twig', array(
            'coursSport' => $coursSport,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coursSport entity.
     *
     * @Route("/{idCours}/edit", name="courssport_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CoursSport $coursSport)
    {
        $deleteForm = $this->createDeleteForm($coursSport);
        $editForm = $this->createForm('AppBundle\Form\CoursSportType', $coursSport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('courssport_edit', array('idCours' => $coursSport->getIdcours()));
        }

        return $this->render('courssport/edit.html.twig', array(
            'coursSport' => $coursSport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coursSport entity.
     *
     * @Route("/{idCours}", name="courssport_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CoursSport $coursSport)
    {
        $form = $this->createDeleteForm($coursSport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coursSport);
            $em->flush();
        }

        return $this->redirectToRoute('courssport_index');
    }

    /**
     * Creates a form to delete a coursSport entity.
     *
     * @param CoursSport $coursSport The coursSport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CoursSport $coursSport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('courssport_delete', array('idCours' => $coursSport->getIdcours())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
