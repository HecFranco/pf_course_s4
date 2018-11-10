<?php

namespace App\Form;

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

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use App\Form\EmailsType;
use App\Form\ProfilesType;

use App\Entity\Profiles;
use App\Entity\Users;
use App\Entity\ListRoles;

use App\Form\EventSubscriber\AddFieldUserSubscriber;

class UsersType extends AbstractType
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $formType = (!empty($options['attr']) && $options['attr']['formType'])? $options['attr']['formType'] : null ;
        $user = $this->tokenStorage->getToken()->getUser();
        if(
            $user instanceof Users && 
            in_array("ROLE_ADMIN", $user->getRoles()) && 
            isset($options) &&
            isset($options['attr']) &&
            $formType === 'editUser'
        ){
            $builder
                ->add('roles', EntityType::class, array(
                    'attr' => array('class' => 'sm-form-control'),
                    'label' => false,
                    // looks for choices from this entity
                    'class' => ListRoles::class,
                    // uses the User.username property as the visible option string
                    'choice_label' => 'role',
                    // used to render a select box, check boxes or radios
                    'multiple' => false,
                    'expanded' => false,
                ));
        }
        // Standar fields form
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
