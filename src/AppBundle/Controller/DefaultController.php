<?php

namespace AppBundle\Controller;

use AppBundle\Entity\produit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/index", name="indexpage")
     */
    public function indexpageAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('Pro/index.html.twig');
    }

    /**

     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/mail",name="email_send")
     */
    public function sendAction( \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('mohamedbouaziz24@gmail.com')
            ->setTo('mohamedbouaziz24@gmail.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    array('name' => "med")
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $mailer->send($message);

        // or, you can also fetch the mailer service this way
        // $this->get('mailer')->send($message);

        return $this->render("Emails/registration.html.twig");
    }



    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request)
    {
        $p=new produit();
        $form=$this->CreateFormBuilder($p)
        ->add('name',TextType::class,array('attr'=> array('class'=>'span2')))
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()){            return $this->redirectToRoute('homepage');
        }

        return $this->render('produit/test.html.twig',array('form'=>$form->createView()))    ;

    }

}
