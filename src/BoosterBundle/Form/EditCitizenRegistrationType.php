<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EditCitizenRegistrationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add ('lastname', null, [
                "label" => "Nom et Prénom"
            ])
            ->add('address', null, array(
                'label' => 'Adresse'
            ))
            ->add('cp', null, array(
                'label' => 'Code postal'
            ))
            ->add('town', null, array(
                'label' => 'Ville'
            ))

            -> add('category', ChoiceType::class, array(
                'choices' => array(
                    'Développement durable' => 'Développement durable',
                    'Habitat' => 'Habitat',
                    'Agriculture/Agroalimentaire' => 'Agriculture/Agroalimentaire',
                    'Culture/Patrimoine' => 'Culture/Patrimoine',
                    'Mobilité' => 'Mobilité',
                    'Numérique et co-coworking' => 'Numérique et co-coworking'),
                'placeholder'=>'Choisir',
                'label'=>'catégorie',
            ))

            ->add('statusCitizen', choiceType::class, array(
                'choices' => array(
                    'En recherche d\'emploi' => 'En recherche d\'emploi',
                    'Artisan'=> 'Artisan',
                    'benevolat'=> 'Bénévolat',

                ),
                'label'=>'Categorie',
                'placeholder'=>'Choisir'))

            ->add('fileIdentity','file', [
                "label" => "Photo"],
                array( 'required'=>false));

        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'booster_citizen_registration';
    }
}
