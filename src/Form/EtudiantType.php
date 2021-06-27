<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('classe',ChoiceType::class,['choices'=>
                                                ['I1 études et développement'=>'I1 études et développement',
                                                'I2 études et développement'=>'I2 études et développement',
                                                'Réseaux et infrastructure'=>'Réseaux et infrastructure'
                                                ]
                                                
                                                ])
            ->add('absence')
            ->add('retard')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
