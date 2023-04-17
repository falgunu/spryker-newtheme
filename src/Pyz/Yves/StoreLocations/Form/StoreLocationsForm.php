<?php

namespace Pyz\Yves\StoreLocations\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class StoreLocationsForm extends AbstractType
{
    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'StoreLocationsForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $this->addQueryField($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     * @return StoreLocationsForm
     */
    private function addQueryField(FormBuilderInterface $builder): StoreLocationsForm
    {

        $builder->add('query', TextType::class, [
            'required' => true,
            'label'=>'Enter zip code/city',
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 1, 'max' => 255]),
            ],
        ]);
        return $this;
    }
}
