<?php

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class OrderNameForm extends AbstractType
{
    const FIELD_ID_ORDER_NAME_CODE = 'order-name-code';
    const ORDER_NAME_PROPERTY_PATH = 'orderName';

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'orderNameForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return $this
     */
    public function buildForm(FormBuilderInterface $builder, array $options): static
    {
        $builder->add(self::FIELD_ID_ORDER_NAME_CODE, TextType::class, [
            'required' => true,
            'property_path' => static::ORDER_NAME_PROPERTY_PATH,
            'constraints' => [
                new NotBlank(),
                new Regex([
                    'pattern' => '^[a-zA-Z0-9]+$',
                    'match' => true,
                    'message' => 'You must use only characters from a-z and numbers from 0-9',
                ]),
            ],
            'label' => false,
        ]);

        return $this;
    }
}
