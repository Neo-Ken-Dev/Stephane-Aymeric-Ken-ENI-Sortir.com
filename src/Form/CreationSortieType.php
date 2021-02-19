<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CreationSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie :'
            ])
            ->add('dateHeureDebut', DateTimeType::class, [
                'label' => 'Date et heure de la sortie :'
            ])
            ->add('dateLimiteInscription', DateType::class, [
                'label' => 'Date limite d\'inscription :'
            ])
            ->add('nbInscriptionMax', IntegerType::class, [
                'label' => 'Nombre de places :'
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée :'
            ])
            ->add('descriptionInfos', TextareaType::class, [
                'label' => 'Description et infos :'
            ])
            ->add('campus', EntityType::class, [
                'label' => 'Campus :',
                'class' => 'App\Entity\Campus',
                'choice_label' => 'nom',
                'expanded' => false,
                'multiple' => false

            ])

            ->add('lieu', LieuType::class)

            /*->add('rue', TextType::class, [
                'label' => 'Rue :'
            ])
            ->add('codePostal', TextType::class, [
                'label' => 'Code postal :'
            ])
            ->add('latitude', TextType::class, [
                'label' => 'Latitude :'
            ])
            ->add('longitude', TextType::class, [
                'label' => 'Longitude :'
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
