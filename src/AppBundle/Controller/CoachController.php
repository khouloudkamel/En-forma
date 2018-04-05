<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Coach;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Coach controller.
 *
 * @Route("coach")
 */
class CoachController extends Controller
{
    /**
     * Lists all coach entities.
     *
     * @Route("/", name="coach_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coaches = $em->getRepository('AppBundle:Coach')->findAll();

        return $this->render('coach/index.html.twig', array(
            'coaches' => $coaches,
        ));
    }

    /**
     * Creates a new coach entity.
     *
     * @Route("/new", name="coach_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $coach = new Coach();
        $form = $this->createForm('AppBundle\Form\CoachType', $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coach);
            $em->flush();

            return $this->redirectToRoute('coach_show', array('idCoach' => $coach->getIdcoach()));
        }

        return $this->render('coach/new.html.twig', array(
            'coach' => $coach,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coach entity.
     *
     * @Route("/{idCoach}", name="coach_show")
     * @Method("GET")
     */
    public function showAction(Coach $coach)
    {
        $deleteForm = $this->createDeleteForm($coach);

        return $this->render('coach/show.html.twig', array(
            'coach' => $coach,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coach entity.
     *
     * @Route("/{idCoach}/edit", name="coach_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Coach $coach)
    {
        $deleteForm = $this->createDeleteForm($coach);
        $editForm = $this->createForm('AppBundle\Form\CoachType', $coach);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coach_edit', array('idCoach' => $coach->getIdcoach()));
        }

        return $this->render('coach/edit.html.twig', array(
            'coach' => $coach,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coach entity.
     *
     * @Route("/{idCoach}", name="coach_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Coach $coach)
    {
        $form = $this->createDeleteForm($coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coach);
            $em->flush();
        }

        return $this->redirectToRoute('coach_index');
    }

    /**
     * Creates a form to delete a coach entity.
     *
     * @param Coach $coach The coach entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Coach $coach)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('coach_delete', array('idCoach' => $coach->getIdcoach())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
