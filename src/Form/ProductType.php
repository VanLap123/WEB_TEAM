<?php
 namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

 class ProductType extends AbstractType{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Product::class
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Pro_Name', TextType::class)
        ->add('Price', TextType::class)
        ->add('Old_Price', TextType::class)
        ->add('Pro_Desc', TextType::class)
        ->add('Pro_qty', TextType::class)
        ->add('Pro_Image', FileType::class)
        ->add('cat', EntityType::class,[
            'class'=>Category::class,
            'choice_label'=>'Cat_Name'
        ])
        ->add('save',SubmitType::class,[
            'label'=>'Save!'
        ]);

    }
        
 }
?>
