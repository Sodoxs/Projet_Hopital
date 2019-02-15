<?php

namespace App\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class AjoutCommande extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantitecommande',IntegerType::class, ['required' =>true, 'label'=> 'name'])
            ->add('idetat', ChoiceType::class,[
                'choices' =>[
                    'Requete' => 0,
                    'Effectue' => 1,
                    'Disponible'=>2,
                    'Livre' => 3,
                ]
            ], ['attr'=>['class' =>"input-field"]], ['required' => true])
            ->add('submit', SubmitType::class, array(
                'label' => 'Ajouter Commande',
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