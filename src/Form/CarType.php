<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Brand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'model',
            TextType::class,
            [
                "label" => "Model"
            ]
        );

        $builder->add(
            'year',
            IntegerType::class,
            [
                "label" => "Year"
            ]
        );

        $builder->add(
            'brand',
            EntityType::class, [
                "label" => "Brand",
                "class" => Brand::class,
                "choice_label" => "name",
                "required" => false
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
