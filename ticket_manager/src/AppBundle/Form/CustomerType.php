<?php

namespace AppBundle\Form;
use AppBundle\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType{

  public function buildForm(FormBuilderInterface $builder, array $options){
    $builder->add('customerName');
    $builder->add('customerLastName');
    $builder->add('customerEmail');
    $builder->add('customerAddress');
    $builder->add('customerPhoneNumber');
  }

  public function getName(){
    return $this->getBlockPrefix();
  }

  public function configureOptions(OptionsResolver $resolver){
    $resolver->setDefaults(array(
      'data_class' => Customer::class,
    ));
  }

}
