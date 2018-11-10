<?php

namespace App\Form;

use App\Entity\Projects;
use App\Entity\Users;
use App\Form\UsersType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use App\Form\EventSubscriber\AddFieldProjectSubscriber;

class ProjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Event Subscriber to define the fields to use by project data
        $builder->addEventSubscriber(new AddFieldProjectSubscriber());     
        // Event Listener to define the fields to use by user logged or no logged   
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            // ... adding the name field if needed
            $project = $event->getData();
            $form = $event->getForm();
            if($project->getUser() === null){
                $form->add('user', UsersType::class, array(
                    'data_class' => Users::class,
                    'label' => false
                    )
                ); 
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
