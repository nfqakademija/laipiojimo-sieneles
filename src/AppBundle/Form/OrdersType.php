<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017-09-13
 * Time: 10:27
 */

namespace AppBundle\Form;


use AppBundle\Entity\Orders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->setAttribute('class', 'test')
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
                'label' => 'form.label_width (m)',
            ])
            ->add('height', NumberType::class, [
                'label' => 'form.label_height (m)',
            ])
            ->add('fixation', ChoiceType::class, [
                'label' => 'form.label_fixation',
                'choices' => [
                    'form.choice_strong' => 1,
                    'form.choice_weak' => 2,
                    'form.choice_free' => 3,
                ],
                'expanded' => true,
            ])
            ->add('location', ChoiceType::class, [
                'label' => 'form.label_location',
                'choices' => [
                    'form.choice_indoor' => 1,
                    'form.choice_shelter' => 2,
                    'form.choice_outdoor' => 3,
                ],
                'expanded' => true,
            ])
            ->add('purpose', ChoiceType::class, [
                'label' => 'form.label_purpose',
                'choices' => [
                    'form.choice_profesional' => 1,
                    'form.choice_amateur' => 2,
                    'form.choice_recreational' => 3,
                    'form.choice_playground' => 4,
                ],
                'expanded' => true,
            ])
            ->add('certificate', CheckboxType::class, [
                'label' => 'form.label_certificate',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'form.label_submit',
                'attr' => [
                    'class' => "btn btn-carvey btn-animate-arrow",
                    'tabindex' => "3",
                ],
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