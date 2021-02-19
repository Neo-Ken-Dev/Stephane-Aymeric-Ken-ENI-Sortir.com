<?php

namespace App\Form;

use App\Entity\Lieu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class ,[
                'label' => 'Lieu :'
            ])
            ->add('rue', TextType::class,[
            'label' => 'Rue :'
            ])
            ->add('latitude', NumberType::class,[
                'label' => 'Latitude :'
            ])
            ->add('longitute', NumberType::class,[
                'label' => 'Longitude :'
            ])
            ->add('ville', VilleType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lieu::class,
        ]);
    }
}
