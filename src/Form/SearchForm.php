<?php


namespace App\Form;


use App\Data\SearchData;
use App\Entity\Campus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                'label' => false,
                'required' => false,
                'class' => Campus::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('datejour', TextType::class,[
                'label' =>false,
                'required' => false,
                'empty_data' => '',
                'attr'=> [
                    'placeholder' => '14']
            ])
          ->add('datemois', TextType::class,[
              'label' =>false,
              'required' => false,
              'empty_data' => '',
              'attr'=> [
                  'placeholder' => '02' ]])
          ->add('dateannee', TextType::class,[
              'label' =>false,
              'required' => false,
              'empty_data' => '',
              'attr'=> [
                  'placeholder' =>'Année']])
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