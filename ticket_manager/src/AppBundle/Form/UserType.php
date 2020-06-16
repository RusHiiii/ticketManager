<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('userPhoneNumber')->add('userApplication')->add('userSquad');
        /*$builder->add('roles', CollectionType::class, array(
                'entry_type' => ChoiceType::class,
                'label' => "Rôle :",
                'entry_options' => array(
                    'label' => false,
                    'choices' => array(
                      'Operateur' => 'ROLE_OPERATOR',
                      'Dev' => 'ROLE_DEV',
                      'Manager' => 'ROLE_MANAGER',
                      'Admin' => 'ROLE_ADMIN'
                    ),
                    //'multiple' => true
                )
            )
        );*/
        $builder->add('roles', ChoiceType::class, array(
          'choices'  => array(
            'Operateur' => 'ROLE_OPERATOR',
            'Dev' => 'ROLE_DEV',
            'Manager' => 'ROLE_MANAGER',
            'Admin' => 'ROLE_ADMIN'
          ),
          'multiple' => true
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }

    public function getParent(){
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}
