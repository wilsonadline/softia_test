<?php

namespace App\Form;

use App\Entity\Convention;
use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AttestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Etudiants', EntityType::class
            , [
                'label' => 'etudiant',
                'class' => Etudiant::class,
                'choice_label' => function(Etudiant $e){

                    return sprintf(' %s', $e->getNom());
                },
                'placeholder' => 'Veuillez selectionner un étudiant',
            ],)
            ->add('text', TextareaType::class, [
                'data' => `Bonjour getInfo()`
            ])
            ->add('Send', SubmitType::class, [
                'label' => "Envoyer",

            ])

        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }

    // public function buildView(FormView $view, FormInterface $form, array $options)
    // {
    //     // this makes the "products" array available in your view
    //     $view->vars['products'] = $options['products'];
    // }

    // public function buildView(FormView $view, FormInterface $form, array $options)
    // {
    //     dd($options);

    //     dd($view->vars['data'] );
    //     $view->vars['data'] = $options['nom'];
    // }

    // // public function getParent()
    // // {
    // //     return 'choices';
    // // }

    // public function getName()
    // {
    //     return 'my_form_type';
    // }

}
