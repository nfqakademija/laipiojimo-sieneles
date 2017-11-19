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
                'label' => 'Fixation',
                'choices' => array(
                    'Strong wall' => 'strong',
                    'Weak wall' => 'weak',
                    'Free standing' => 'free',
                ),
            ))
            ->add('location', ChoiceType::class, array(
                'label' => 'Location',
                'choices' => array(
                    'Indoor' => 'indoor',
                    'Shelter' => 'shelter',
                    'Outdoor' => 'outdoor',
                ),
            ))
            ->add('purpose', ChoiceType::class, array(
                'label' => 'Purpose',
                'choices' => array(
                    'Profesional sport' => 'prosport',
                    'Amateur sport' => 'asport',
                    'Recreational' => 'recreational',
                    'Playground' => 'playground',
                ),
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