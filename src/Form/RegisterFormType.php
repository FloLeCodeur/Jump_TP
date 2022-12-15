<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => 'a',
                'attr' => ['placeholder' => 'Prénom']
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom de famille',
                'attr' => ['placeholder' => 'Nom de famille']
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'Numéro de télophone',
                'attr' => ['placeholder' => 'Numéro de télophone']
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse postale',
                'attr' => ['placeholder' => 'Adresse postale']
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'Male',
                    'Women' => 'Female',
                    'Non communiquer' => 'none',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'attr' => [
                    'placeholder' => 'Adresse email de connexion']
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Mot de passe'
                ],
                // 'constraints' => [
                //     new Regex([
                //         'pattern' => '/\d+/i',
                //         ''
                //     ]),
                // ]
                // 'constraints' => [
                //     new Length([
                //         'min' => 6,
                //         'minMessage' => 'Mot de passe trop court'
                //     ])
                // ] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
