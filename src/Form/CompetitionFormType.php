<?php

namespace App\Form;

use App\Entity\Competition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('competitionOrganiser', TextType::class, array("label" => "form.competition_registration.organiser"))
            ->add('competitionOrganiserEmail', EmailType::class, array("label" => "form.competition_registration.mail"))
            ->add('competitionName', TextType::class, array("label" => "form.competition_registration.name"))
            ->add('competitionDate', DateType::class, array("label" => "form.competition_registration.start_date"))
            ->add('competitionDuration', NumberType::class, array("label" => "form.competition_registration.duration"))
            ->add("competitionType", ChoiceType::class, array("label" => "form.competition_registration.type",
                    "choices" => array(
                        "Top 5" => Competition::TYPE_TOP5,
                        "Bendras svoris" => Competition::TYPE_TOTAL)))
            ->add('competitionSectorCount', NumberType::class, array("label" => "form.competition_registration.sectorCount"))
            ->add('competitionWeighingsCount', NumberType::class, array("label" => "form.competition_registration.weighingCount"))
            ->add('competitionLink', TextType::class, array("required"=> false,"label" => "form.competition_registration.facebook_link"))
            ->add('competitionRules', TextareaType::class, array("required"=> false,"label" => "form.competition_registration.rules"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competition::class,
        ]);
    }
}
