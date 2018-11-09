<?php

namespace App\Form;

use App\Entity\Profiles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array(
                'label' => false,
                'attr' => array('class' => 'sm-form-control')
                )
            )
            ->add('lastname', null, array(
                'label' => false,
                'attr' => array('class' => 'sm-form-control')
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profiles::class,
        ]);
    }
}
