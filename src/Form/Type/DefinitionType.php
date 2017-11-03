<?php
/**
 * Created by PhpStorm.
 * User: snebes
 * Date: 11/1/17
 * Time: 1:38 PM
 */

namespace App\Form\Type;

use App\Entity\Definition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DefinitionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', TextType::class)
            ->add('term', TextType::class)
            ->add('definition', TextType::class)
            ->add('extendedDefinition', TextType::class)
            ->add('subdefinitions', CollectionType::class, [
                'entry_type'    => SubdefinitionType::class,
                'entry_options' => [
                    'label'          => false,
                    'recursionLevel' => 2,
                ],
                'allow_add'     => true,
                'allow_delete'  => true,
                'prototype'     => true,
                'prototype_name'=> '__parent_name__',
                'attr' => [
                    'class' => 'parent-collection',
                ],
            ])

            ->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) {
                $def    = $event->getData();
                $subXml = '';

                foreach ($def->getSubdefinitions() as $sub) {
                    $subXml .= strval($sub);
                }

                $def->setSubdefinitionXml($subXml);
            })
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Definition::class,
        ]);
    }
}
