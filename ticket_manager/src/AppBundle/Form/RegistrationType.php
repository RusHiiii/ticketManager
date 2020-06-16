<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationType extends AbstractType{

   public function buildForm(FormBuilderInterface $builder, array $options){
       $builder->add('userSquad');
       $builder->add('userPhoneNumber');
       $builder->add('userApplication');
       $builder->add('roles', CollectionType::class, array(
               'entry_type' => ChoiceType::class,
               'label' => "Rôle :",
               'entry_options' => array(
                   'label' => false,
                   'choices' => array(
                     'Operateur' => 'ROLE_OPERATOR',
                     'Dev' => 'ROLE_DEV',
                     'Manager' => 'ROLE_MANAGER',
                     'Admin' => 'ROLE_ADMIN'
                   )
               )
           )
       );

   }

   public function getParent(){
       return 'FOS\UserBundle\Form\Type\RegistrationFormType';
   }

   public function getBlockPrefix(){
       return 'app_user_registration';
   }

   public function getName(){
       return $this->getBlockPrefix();
   }

}
