<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.17
 * Time: 00.13
 */

namespace App\Form;

use App\Entity\Competition;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;

class TeamsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("teams", CollectionType::class, array("entry_type" => TeamFormType::class));

    }


}