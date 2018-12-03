<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.27
 * Time: 00.02
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TeamsSectorsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("teams", CollectionType::class, array(
                "entry_type" => TeamSectorFormType::class,
                'entry_options' => array(
                    'attr' => array('class' => 'form__input'),
                )
            ));

    }
}