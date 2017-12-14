<?php

namespace AppBundle\Form;

use AppBundle\Entity\Orders;
use AppBundle\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
//            ->setAttribute('class', 'test')
            ->add('clientName', TextType::class, [
                'label' => 'form.label_name',
            ])
            ->add('clientEmail', EmailType::class, [
                'label' => 'form.label_email',
            ])
            ->add('clientPhone', TextType::class, [
                'label' => 'form.label_phone',
            ])
            ->add('clientCity', TextType::class, [
                'label' => 'form.label_city',
            ])
            ->add('width', NumberType::class, [
                'label' => 'form.label_width',
            ])
            ->add('height', NumberType::class, [
                'label' => 'form.label_height',
            ])
            ->add('productId', EntityType::class, [
                'class' => Product::class,
                'label' => 'form.label_product',
                'choice_label' => 'name',
                'expanded' => true,
                'attr' =>
                [
                    'class' => '7u 12u$(small)',
                ],

            ])
            ->add('submit', SubmitType::class, [
                'label' => 'form.label_submit',
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
