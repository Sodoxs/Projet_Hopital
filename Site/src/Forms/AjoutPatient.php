<?php

namespace App\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class AjoutPatient extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num_secu', NumberType::class, ['required' => true])
            ->add('nom', TextType::class, ['required' => true])
            ->add('date_naissance', DateType::class, array(
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
            ))
            ->add('num_tel', NumberType::class, ['required' => true])
            ->add('sexe', TextType::class, ['required' => true])
            /*->add('date_ajout', DateType::class, ['required' => true])*/
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
            #'data_class' => Patient::class,
        ]);
    }
}