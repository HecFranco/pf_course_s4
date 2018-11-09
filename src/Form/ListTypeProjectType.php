<?php

namespace App\Form;

use App\Entity\ListTypeProject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListTypeProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, null, array(
                'label' => false,
                'attr' => array('class' => 'sm-form-control')
                )
            )
            ->add('description', null, array(
                'label' => false,
                'attr' => array('class' => 'sm-form-control')
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ListTypeProject::class,
        ]);
    }
}
