<?php


namespace App\Form;



use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ModifierSortieType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextareaType::class,[ 'attr'=>[
                'placeholder' => 'le nouveau nom de la sortie'
            ]])
            ->add('dateHeureDebut', DateType::class, [
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

            ->add('urlPhoto', TextType::class, [
                'label' => 'Url de la photo :'
            ])

            ->add('add', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'button btnAdd']
            ])

            ->add('publish', SubmitType::class, [
                'label' => 'Publier la sortie',
                'attr' => ['class' => 'button btnPublish']
            ])

            ->add('annuler', SubmitType::class, [
                'label' => 'Annuler',
                'attr' => ['class' => 'button']
            ])
        ;

    }
}