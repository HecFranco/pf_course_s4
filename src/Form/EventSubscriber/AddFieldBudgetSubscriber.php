<?php
// src/Form/EventListener/AddNameFieldSubscriber.php
namespace App\Form\EventSubscriber;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Doctrine\ORM\EntityRepository;

use App\Entity\ListTypeProject;
use App\Entity\ListTypeTask;
use App\Entity\Users;

use App\Form\UsersType;

class AddFieldBudgetSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Tells the dispatcher that you want to listen on the form.pre_set_data
        // event and that the preSetData method should be called.
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        // ... adding the name field if needed
        $project = $event->getData();
        $form = $event->getForm();
        // checks if the Project object is "new"
        // If no data is passed to the form, the data is "null".
        // This should be considered a new "Project"
        if (!$project || null === $project->getId()) {
            $form->add('typeProject', EntityType::class, array(
                // looks for choices from this entity
                'class' => ListTypeProject::class,
                // used to render a select box, check boxes or radios
                'multiple' => false,
                'expanded' => true,
                'label' => false
            ));
        }
        if ( $project->getId() ) {
            $typeProject = $project->getTypeProject();
            $form->add('tasks', EntityType::class, array(
                'class' => ListTypeTask::class,
                'query_builder' => function (EntityRepository $er) use ( $typeProject ) {
                    return $er->createQueryBuilder('tasks')
                        ->innerJoin('tasks.typeProject', 'typeProject')
                        ->andWhere('typeProject = :param1')
                        ->orderBy('tasks.name', 'ASC')
                        ->setParameter('param1', $typeProject);
                },
                'choice_label' => function ($tasks) {
                    return 	$tasks->getName();
                },
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
                'label' => false
            ))
            ->add('note', null, array(
                'label' => false,
                'attr' => array('class' => 'sm-form-control')
                )
            );
         
        }
    }
}