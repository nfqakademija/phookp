<?php

namespace App\Form;

use App\Entity\Competition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('competitionName', TextType::class, array("label" => "form.competition_registration.name"))
            ->add('competitionDate', DateType::class, array("label" => "form.competition_registration.start_date"))
            ->add('competitionDuration', NumberType::class, array("label" => "form.competition_registration.duration"))
            ->add('competitionOrganiser', TextType::class, array("label" => "form.competition_registration.organiser"))
            ->add('competitionOrganiserEmail', EmailType::class, array("label" => "form.competition_registration.mail"))
            ->add("competitionType", ChoiceType::class, array("label" => "form.competition_registration.type",
                    "choices" => array(
                        "Top 5" => Competition::TYPE_TOP5,
                        "Bendras svoris" => Competition::TYPE_TOTAL))
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competition::class,
        ]);
    }
}
