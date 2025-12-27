<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity',
                Type\IntegerType::class,
                ['label' => 'Quantity',
                    'attr' => [
                        'class' => 'form-control',
                        'min' => 1,
                        'max' => 13,
                        'style' => 'max-width: 100px;'
                    ],
                    'data' => 4,])
            ->add('color',
                Type\ChoiceType::class,
                ['label' => 'Select Color',
                    'choices' => [
                        'Matte Black' => 'black',
                        'Pearl White' => 'white',
                        'Silver' => 'silver',
                    ],
                    'attr' => [
                        'class' => 'form-select',
                        'style' => 'max-width: 200px;'
                    ],])
            ->add('submit',
                Type\SubmitType::class,
                [
                    'label' => 'Add to Cart',
                    'attr' => [
                        'class' => 'btn btn-primary btn-lg'
                    ]]);
    }
}
