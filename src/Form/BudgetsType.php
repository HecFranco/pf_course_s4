<?php

namespace App\Form;

use App\Entity\Budgets;
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

use App\Form\EventSubscriber\AddFieldBudgetSubscriber;

class BudgetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber(new AddFieldBudgetSubscriber());        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            // ... adding the name field if needed
            $budget = $event->getData();
            $form = $event->getForm();
            if($budget->getUser() === null){
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
            'data_class' => Budgets::class,
        ]);
    }
}
