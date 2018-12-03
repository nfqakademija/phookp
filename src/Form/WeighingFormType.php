<?php

namespace App\Form;

use App\Entity\Weighing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeighingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('results', CollectionType::class, array(
                "entry_type" => ResultFormType::class,
                    'allow_add' => true,
                    'entry_options' => array(
                        'attr' => array('class' => 'form__input'),
                    )
                )


            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Weighing::class,
            'allow_extra_fields' => true
        ]);
    }
}
