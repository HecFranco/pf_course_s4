<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use App\Form\EmailsType;
use App\Form\ProfilesType;

use App\Entity\Profiles;

use App\Form\EventSubscriber\AddFieldUserSubscriber;

class UsersType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {       
        $builder
            ->add(
                'emails', CollectionType::class, array(
                    'entry_type' => EmailsType::class,
                    'entry_options' => array('label' => false),
                    'allow_add' => true,
                    'label' => false
                )
            )
            ->add(
                'profile', ProfilesType::class, array(
                    'data_class' => Profiles::class,
                    'label' => false
                    )
                )
            ;       
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
