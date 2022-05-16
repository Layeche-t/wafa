<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends ApplicationType
{





    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, $this->getGonfiguration("Prénom", "Votre prénome..."))
            ->add('lastname', TextType::class, $this->getGonfiguration("Nom", "Votre nom de famille..."))
            ->add('email', EmailType::class, $this->getGonfiguration("Email", "Entrez votre email"))
            ->add('picteur', UrlType::class, $this->getGonfiguration("Url", "Importez votre image"))
            ->add('hash', PasswordType::class, $this->getGonfiguration("Mot de passe", "Tapez votre mot de passe"))
            ->add('passwordConfirm', PasswordType::class, $this->getGonfiguration("Confirmation de mot de passe", "Tapez votre mot de passe à nouveau"))
            ->add('useRole', ChoiceType::class, [
                'choices'  => [
                    'َAdmin' => 'admin',
                    'Use' => 'use'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
