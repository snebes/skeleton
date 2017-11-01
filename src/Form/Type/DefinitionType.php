<?php
/**
 * Created by PhpStorm.
 * User: snebes
 * Date: 11/1/17
 * Time: 1:38 PM
 */

namespace App\Form\Type;


use App\Entity\Definition;
use App\Form\Model\Subdefinition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DefinitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subdefinitions', CollectionType::class, [
                'entry_type'    => SubdefinitionType::class,
                'entry_options' => ['label' => false],
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'attr' => [
                    'class' => 'subdef-collection',
                ],
                'prototype' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Definition::class,
        ]);
    }
}