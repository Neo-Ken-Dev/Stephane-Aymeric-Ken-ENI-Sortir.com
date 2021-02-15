<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestionProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', string)
            ->add('prenom',string)
            ->add('nom',string)
            ->add('telephone',integer )
            ->add('email', integer)
            ->add('mdp', string)
            ->add('confirmationMdp',string)
            ->add('campus', null,[
                "label" => "Campus",
                "choice_label" => "name"
            ])
            ->add('photo', file)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
