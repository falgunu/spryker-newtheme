<?php

namespace Pyz\Zed\StoreLocations\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class StoreLocationsFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('storename', TextType::class, [
            'label' => 'Store Name',

        ])->add('street', TextType::class, [
            'label' => 'Street No.',

        ])->add('city', TextType::class, [
            'label' => 'City',

        ])->add('region', TextType::class, [
            'label' => 'Region',

        ])->add('country', TextType::class, [
            'label' => 'City',

        ])->add('zip', NumberType::class, [
            'label' => 'Zip Code',

        ])->add('Latitude', NumberType::class, [
            'label' => 'Latitude',

        ])->add('Longitude', NumberType::class, [
            'label' => 'Longitude',

        ])->add('storeimage', FileType::class, [
            'label' => 'Store Image',

        ]);
    }
}
