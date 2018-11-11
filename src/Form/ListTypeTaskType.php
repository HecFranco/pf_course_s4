<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Entity\ListTypeTask;

class ListTypeTaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'New Task',
                'attr' => array('class' => 'sm-form-control')
                )
            )
            ->add('price', NumberType::class, array(
                'label' => 'Price',
                'attr' => array('class' => 'sm-form-control')
                )
            )
            ->add('note', TextType::class, array(
                'label' => 'Note',
                'attr' => array('class' => 'sm-form-control')
                )
            )->add('description', TextType::class, array(
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
