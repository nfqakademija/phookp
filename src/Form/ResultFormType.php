<?php

namespace App\Form;

use App\Entity\Result;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResultFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('weigh', NumberType::class, array("label" => false, "required" => false, "empty_data" => '0'))
            ->add('specialFish', CheckboxType::class, array("label" => "form.results_entry.special_fish_name", "required" => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Result::class,
        ]);
    }
}
