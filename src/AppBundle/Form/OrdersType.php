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
            ->add('clientName', TextType::class, array(
                'label' => 'Vardas',
            ))
            ->add('clientEmail', EmailType::class, array(
                'label' => 'El. paštas',
            ))
            ->add('clientPhone', TextType::class, array(
                'label' => 'Telefono numeris',
            ))
            ->add('clientCity', TextType::class, array(
                'label' => 'Miestas',
            ))
            ->add('width', NumberType::class, array(
                'label' => 'Plotis (m)',
            ))
            ->add('height', NumberType::class, array(
                'label' => 'Aukštis (m)',
            ))
            ->add('fixation', ChoiceType::class, array(
                'label' => 'form.label_fixation',
                'choices' => array(
                    'form.choice_strong' => 1,
                    'form.choice_weak' => 2,
                    'form.choice_free' => 3,
                ),
                'expanded' => true,
            ))
            ->add('location', ChoiceType::class, array(
                'label' => 'form.label_location',
                'choices' => array(
                    'form.choice_indoor' => 1,
                    'form.choice_shelter' => 2,
                    'form.choice_outdoor' => 3,
                ),
                'expanded' => true,
            ))
            ->add('purpose', ChoiceType::class, array(
                'label' => 'form.label_purpose',
                'choices' => array(
                    'form.choice_profesional' => 1,
                    'form.choice_amateur' => 2,
                    'form.choice_recreational' => 3,
                    'form.choice_playground' => 4,
                ),
                'expanded' => true,
            ))
            ->add('Submit', SubmitType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}