<?php

namespace App\Form;

use App\Entity\Matiere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomModule')
            ->add('reference')
            ->add('nombreHeures')
            ->add('classe',ChoiceType::class,['choices'=>
                                                ['I1 études et développement'=>'I1 études et développement',
                                                'I2 études et développement'=>'I2 études et développement',
                                                'Réseaux et infrastructure'=>'Réseaux et infrastructure'
                                                ]

                                                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matiere::class,
        ]);
    }
}
