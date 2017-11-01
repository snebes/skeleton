<?php
/**
 * Created by PhpStorm.
 * User: snebes
 * Date: 11/1/17
 * Time: 1:52 PM
 */

namespace App\Form\Type;


use App\Form\Model\Subdefinition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubdefinitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('term', TextType::class)
        ;

        if (false && --$options['recursionLevel'] > 0) {
            $builder->add('subdefinitions', CollectionType::class, [
                'entry_type'    => static::class,
                'entry_options' => [
                    'label' => false,
                    'recursionLevel' => $options['recursionLevel']--,
                ],
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'attr' => [
                    'class' => 'subdef-collection',
                ],
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(['recursionLevel']);
        $resolver->setDefaults([
            'data_class' => Subdefinition::class,
            'recursionLevel' => 2,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'SubdefinitionType';
    }
}
