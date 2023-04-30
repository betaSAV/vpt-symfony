<?php

namespace App\Form;

use App\Entity\Proveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre',
                'required' => true,
            ])
            ->add('correo_electronico', EmailType::class, [
                'label' => 'Correo electrónico',
                'required' => true,
            ])
            ->add('telefono', TelType::class, [
                'label' => 'Teléfono',
                'required' => true,
            ])
            ->add('tipo', ChoiceType::class, [
                'label' => 'Tipo',
                'required' => true,
                'choices' => [
                    'Hotel' => 'hotel',
                    'Pista' => 'pista',
                    'Complemento' => 'complemento',
                ],
            ])
            ->add('activo', ChoiceType::class, [
                'label' => 'Activo',
                'required' => true,
                'choices' => [
                    'Sí' => true,
                    'No' => false,
                ],
            ])
            ->add('guardar', SubmitType::class, [
                'label' => 'Guardar',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Proveedor::class,
        ]);
    }
}
