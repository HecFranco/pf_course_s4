<?php

namespace App\Form;

use App\Entity\ListTypeProject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use App\Form\ListTypeTask;

class ListTypeProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $formType = $options['attr']['formType'];
        if($formType === 'editTypeProject'){
            $builder
                ->add('basePrice', NumberType::class, array(
                    'label' => false,
                    'attr' => array('class' => 'sm-form-control')
                    )
                );
        }
        $builder
            ->add('name', null, array(
                'label' => false,
                'attr' => array('class' => 'sm-form-control')
                )
            )
            ->add('description', null, array(
                'label' => false,
                'attr' => array('class' => 'sm-form-control')
                )
            );
        $builder->add(
            'tasks', CollectionType::class, array(
                'entry_type' => ListTypeTaskType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
            )
        );             
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ListTypeProject::class,
        ]);
    }
}
