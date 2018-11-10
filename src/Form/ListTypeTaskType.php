<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use App\Entity\ListTypeTask;

class ListTypeTaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'New Task',
                'attr' => array('class' => 'sm-form-control')
                )
            )
            ->add('price', null, array(
                'label' => 'Price',
                'attr' => array('class' => 'sm-form-control')
                )
            )
            ->add('note', null, array(
                'label' => 'Note',
                'attr' => array('class' => 'sm-form-control')
                )
            )->add('description', null, array(
                'label' => 'Description',
                'attr' => array('class' => 'sm-form-control')
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ListTypeTask::class,
        ]);
    }
}
