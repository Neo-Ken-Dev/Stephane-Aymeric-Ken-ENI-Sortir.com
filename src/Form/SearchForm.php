<?php


namespace App\Form;


use App\Data\SearchData;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
            ->add('motclef', TextareaType::class, [
                'label' => false,
                'empty_data' => '',
                'required' => false,
                'attr'=> [
                    'placeholder' => 'Rechercher une sortie'
                ]
            ])
            ->add('campus',EntityType::class, [
                'class' => 'App\Entity\Campus',
                'label' => false,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('datedebut', DateType::class,[
                'label' =>false,
                'empty_data' => '',
                'required' => false,
                'by_reference' => true,
            ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ])
        ;
    }

    public function getBlockPrefix()
    {
        return '';
    }
}