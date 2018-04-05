<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Historique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Historique controller.
 *
 * @Route("historique")
 */
class HistoriqueController extends Controller
{
    /**
     * Lists all historique entities.
     *
     * @Route("/", name="historique_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historiques = $em->getRepository('AppBundle:Historique')->findAll();

        return $this->render('historique/index.html.twig', array(
            'historiques' => $historiques,
        ));
    }

    /**
     * Creates a new historique entity.
     *
     * @Route("/new", name="historique_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $historique = new Historique();
        $form = $this->createForm('AppBundle\Form\HistoriqueType', $historique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historique);
            $em->flush();

            return $this->redirectToRoute('historique_show', array('idUserHisto' => $historique->getIduserhisto()));
        }

        return $this->render('historique/new.html.twig', array(
            'historique' => $historique,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a historique entity.
     *
     * @Route("/{idUserHisto}", name="historique_show")
     * @Method("GET")
     */
    public function showAction(Historique $historique)
    {
        $deleteForm = $this->createDeleteForm($historique);

        return $this->render('historique/show.html.twig', array(
            'historique' => $historique,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing historique entity.
     *
     * @Route("/{idUserHisto}/edit", name="historique_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Historique $historique)
    {
        $deleteForm = $this->createDeleteForm($historique);
        $editForm = $this->createForm('AppBundle\Form\HistoriqueType', $historique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('historique_edit', array('idUserHisto' => $historique->getIduserhisto()));
        }

        return $this->render('historique/edit.html.twig', array(
            'historique' => $historique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a historique entity.
     *
     * @Route("/{idUserHisto}", name="historique_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Historique $historique)
    {
        $form = $this->createDeleteForm($historique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($historique);
            $em->flush();
        }

        return $this->redirectToRoute('historique_index');
    }

    /**
     * Creates a form to delete a historique entity.
     *
     * @param Historique $historique The historique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Historique $historique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historique_delete', array('idUserHisto' => $historique->getIduserhisto())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
