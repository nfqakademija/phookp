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
            ->add('competitionOrganiser', TextType::class, array("label" => "form.competition_registration.organiser", 'attr' => ['class' => 'form__input']))
            ->add('competitionOrganiserEmail', EmailType::class, array("label" => "form.competition_registration.mail",'attr' => ['class' => 'form__input']))
            ->add('competitionName', TextType::class, array("label" => "form.competition_registration.name", 'attr' => ['class' => 'form__input']))
            ->add('competitionDate', DateType::class, array("label" => "form.competition_registration.start_date",'attr' => ['class' => 'form__select']))
            ->add('competitionDuration', NumberType::class, array("label" => "form.competition_registration.duration",'attr' => ['class' => 'form__input']))
            ->add("competitionType", ChoiceType::class, array("label" => "form.competition_registration.type",
                    "choices" => array(
                        "Top 5" => Competition::TYPE_TOP5,
                        "Bendras svoris" => Competition::TYPE_TOTAL)

            ))
            ->add('competitionTeamsCount', NumberType::class, array("label" => "form.competition_registration.sector_count", 'attr' => ['class' => 'form__input']))
            ->add('competitionWeighingsCount', NumberType::class, array("label" => "form.competition_registration.weighing_count", 'attr' => ['class' => 'form__input']))
            ->add('competitionLink', TextType::class, array("required"=>false,"label" => "form.competition_registration.facebook_link", 'attr' => ['class' => 'form__input']))
            ->add('competitionRules', TextareaType::class, array("required"=>false,"label" => "form.competition_registration.rules"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competition::class,
        ]);
    }
}
