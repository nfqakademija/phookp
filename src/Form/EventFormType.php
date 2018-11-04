<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eventName', TextType::class, array("label" => "Renginio pavadinimas"))
            ->add('eventDate', DateType::class, array("label" => "Renginio pradžia"))
            ->add('eventDuration', NumberType::class, array("label" => "Renginio trukme"))
            ->add('eventOrganiser', TextType::class, array("label" => "Organizatorius"))
            ->add('eventOrganiserEmail', EmailType::class, array("label" => "Elektroninis paštas"))
            ->add("eventType", ChoiceType::class, array("label" => "Renginio tipas",
                "choices" => array(
                    "Top 5" => Event::TYPE_TOP5,
                    "Bendras svoris" => Event::TYPE_TOTAL))
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
