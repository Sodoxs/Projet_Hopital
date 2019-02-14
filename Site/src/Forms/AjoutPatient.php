<?php

namespace App\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class AjoutPatient extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num_secu', TextType::class, ['required' => true])
            ->add('nom', TextType::class, ['required' => true])
            ->add('date_naissance', TextType::class, ['required' => true])
            ->add('num_tel', TextType::class, ['required' => true])
            ->add('sexe', TextType::class, ['required' => true])
            ->add('date_ajout', TextType::class, ['required' => true])
            ->add('statut', TextType::class, ['required' => true])
            ->add('submit', SubmitType::class, array(
                'label' => 'Ajouter Patient',
                'attr' => array(
                    'class' => "btn btn-contact background-color-orange-lacces waves-effect",
                )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            #'data_class' => Article::class,
        ]);
    }
}