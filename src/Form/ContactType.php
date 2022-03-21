<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, array(
                'label' => FALSE, 'attr' => array(
                    'placeholder' => 'Name'
                )))
            ->add('email', EmailType::class, [
                'label' => FALSE, 'attr' => ['autocomplete' => 'email'], 'attr' =>['placeholder'=> 'Email'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your email',
                    ]),
                ],
            ])
            ->add('phone', TextType::class, array(
                'label' => FALSE, 'attr' => ['placeholder' => 'phone']))
            ->add('message', TextareaType::class , array(
                'label' => FALSE, 'attr' => array(
                    'placeholder' => 'Message'
                )));
            // ->add('submit', SubmitType::class, ['attr'=> (['label' => 'SUBMIT' ,'class' => 'btn'])]
        // );
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
