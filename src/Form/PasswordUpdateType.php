<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\ApplicationType;


class PasswordUpdateType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('oldPassword', PasswordType::class, $this->getGonfiguration("Ancien mot de passe", "Tapez votre ancien mot de passe"))
            ->add('newPassword', PasswordType::class, $this->getGonfiguration("Nouveau mot de passe", "Tapez votre nouveau mot de passe"))
            ->add('confirmPassword', PasswordType::class, $this->getGonfiguration("Confirmation du mot de passe", "Confirmez votre mot de passe"));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
