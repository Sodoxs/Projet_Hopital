<?php

namespace App\Forms;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class AjoutPatient extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numsecu', NumberType::class, ['required' => true])
            ->add('nummutuelle', NumberType::class, ['required' => true])
            ->add('civilite', ChoiceType::class, array(
                'choices' => array(
                    'H' => 'H',
                    'F' => 'F',
                )))
            ->add('nompatient', TextType::class, ['required' => true])
            ->add('prenompatient', TextType::class, ['required' => true])
            ->add('datenaissance', DateType::class, array(
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array('placeholder' => 'dd/MM/yyyy'),
            ))
            ->add('telephone', TextType::class, ['required' => true])
            ->add('adresse', TextType::class)
            ->add('nivurgence', NumberType::class, ['required' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}