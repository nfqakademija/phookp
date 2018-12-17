<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.11
 * Time: 13.02
 */

namespace App\Form;
use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class TeamFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('teamName', TextType::class, array("required"=> false,"label" => "form.team_registration.team_name", 'label_attr' => ["class" => "u-text-bold u-border-bottom"], 'attr' => ['placeholder' => "form.team_registration.team_name",'class' => 'form__input u-text-bold u-border-bottom']))
            ->add('firstTeamMember', TextType::class, array("required"=> false,"label" => "form.team_registration.team_member",'attr' =>['placeholder' => "form.team_registration.team_member",'class' => 'form__input']))
            ->add('secondTeamMember', TextType::class, array("required"=> false,"label" => "form.team_registration.team_member",'attr' => ['placeholder' => "form.team_registration.team_member",'class' => 'form__input']))
            ->add('thirdTeamMember', TextType::class, array("required"=> false,"label" => "form.team_registration.team_member",'attr' => ['placeholder' => "form.team_registration.team_member",'class' => 'form__input']));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}