<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use function PHPSTORM_META\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
                ->add('role', ChoiceType::class, array(
    'choices'  => array(
        'Medecin' => 'Medecin',
        'Esthéticienne' => 'Esthéticienne',
        'Responsable' =>'Responsable',
    ),
));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}