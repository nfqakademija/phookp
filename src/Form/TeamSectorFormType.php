<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.27
 * Time: 00.02
 */

namespace App\Form;

use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class TeamSectorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sectorNr', NumberType::class, array('required'=> true,"label" => "form.team_sectors_assignment.sector", "attr" => ['placeholder' => "form.team_sectors_assignment.sector","class" => "form__input form__input--full"])
            );
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}