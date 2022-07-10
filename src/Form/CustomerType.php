<?php
 namespace App\Form;

use App\Entity\Customer;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

 class CustomerType extends AbstractType{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Product::class
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Cust_Name', TextType::class)
        ->add('Gender', TextType::class)
        ->add('Address', TextType::class)
        ->add('Telephone', TextType::class)
        ->add('Birthday', DateTime::class)
        ->add('orders', EntityType::class,[
            'class'=>Customer::class,
            'choice_label'=>'id'
        ])
        ->add('save',SubmitType::class,[
            'label'=>'Save!'
        ]);

    }
        
 }
?>
