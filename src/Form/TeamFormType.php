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
            ->add('teamName', TextType::class, array("label" => "Komandos pavadinimas"))
            ->add('teamMember', CollectionType::class, array
                (
                    'entry_type' => TextType::class,
                    'entry_options' => array
                    (
                        "label" => " ",
                    ),
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}