<?php

namespace App\Form;

use App\Entity\Participants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestionProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class)
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('mail')
            ->add('motDePasse')
            ->add('campusNoCampus')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participants::class,
        ]);
    }

    /*
     * public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            ->add('prenom')
            ->add('nom')
            ->add('telephone')
            ->add('mail')
            ->add('motDePasse', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'les mots de passe saisis ne correspondent pas',
                'required' => true,
                'first_option' => array ('label' => 'Mot de passe'),
                'second_option' => array ('label' => 'Confirmation'),
            ])
            ->add('campusNoCampus', null,[
                "label" => "Campus",
                "choice_label" => "name"
            ])
            //->add('photo', filetype())
        ;
    }
     */
}
