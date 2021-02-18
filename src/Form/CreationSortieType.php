<?php

namespace App\Form;

use App\Entity\Sorties;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
                'label' => 'Nom de la sortie'
            ])
            ->add('datedebut', null, [
                'label' => 'Date et heure de la sortie'
            ])
            ->add('datecloture', null, [
                'label' => 'Date limite d\'inscription'
            ])
            ->add('nbinscriptionsmax', IntegerType::class, [
                'label' => 'Nombre de places'
            ])
            ->add('duree')


            ->add('descriptioninfos', TextareaType::class, [
                'label' => 'Description et infos'
            ])


            ->add('lieuxNoLieu')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sorties::class,
        ]);
    }
}
