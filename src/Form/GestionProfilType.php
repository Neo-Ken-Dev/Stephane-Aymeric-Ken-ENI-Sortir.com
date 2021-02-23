<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestionProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',textType::class, ['attr'=> [
            'placeholder'=>'Votre pseudo/identifiant',
            'required'=>true
            ],
          'label'=> 'Pseudo : '
        ])
        ->add('nom',textType::class, [
            'attr'=> [
                'placeholder'=>'Votre nom',
                'required'=>true
            ],
            'label'=> 'Nom : '
        ])
        ->add('prenom',textType::class, [
            'attr'=> [
                'placeholder'=>'Votre prénom',
                'required'=>true
            ],
            'label'=> 'Prénom : '
        ])
        ->add('telephone',TelType::class, [
            'attr'=> [
                'placeholder'=>'Votre numéro de téléphone',
                'required'=>true
            ],
            'label'=> 'Téléphone : '
        ])
        ->add('email', EmailType::class, [
            'attr'=> [
                'placeholder'=>'Votre email',
                'required'=>true
            ],
            'label'=> 'Email : '
        ])

        ->add('photo', FileType::class, [
            'label' => 'Télécharger votre photo de profil',
            'required' => false,
            'attr'=> [
                'placeholder'=>"votre fichier"],
            'data_class' => null]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

}
