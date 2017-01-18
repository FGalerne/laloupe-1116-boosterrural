<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ActorOfferType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label'=>'Titre de l\'offre'
            ))
            ->add('cp', null, array(
                'label'=>'Code postal'
            ))
            ->add('town', null, array(
                'label'=>'Ville'
            ))

            ->add('development', choiceType::class, array(
                'choices' => array(
                    //DD
                    'Biodiversité' => 'Biodiversité',
                    'Eco-conception' => 'Eco-conception',
                    'Economie circulaire' => 'Economie circulaire',
                    'Energie / eau optimisées' => 'Energie / eau optimisées',
                    'Gouvernance et participation' => 'Gouvernance et participation',
                    'Recyclage' => 'Recyclage',
                    'Ressourceries' => 'Ressourceries',
                    'Mode ou textile "éco"' => 'Mode ou textile "éco"',
                    'Santé alternative' => 'Santé alternative'
                ),
                'label'=>'Categorie'))

            ->add('habitation', choiceType::class, array(
                'choices' => array(
                    //habitat
                    'Rénovation thermique' => 'Rénovation thermique',
                    'Matériaux "éco" ou locaux' => 'Matériaux "éco" ou locaux'
                ),
                'label'=>'Categorie'))

            ->add('culture', choiceType::class, array(
                'choices' => array(
                    //Culture
                    'Education' => 'Education',
                    'Formation innovante' => 'Formation innovante',
                    'Gastronomie locale' => 'Gastronomie locale',
                    'Savoirs et transmissions' => 'Savoirs et transmissions',
                    'Tourisme alternatif' => 'Tourisme alternatif'
                ),
                'label'=>'Categorie'))

            ->add('agriculture', choiceType::class, array(
                'choices' => array(
                    //Agri
                    'Agriculture bio, maraîchage, circuits courts' => 'Agriculture bio, maraîchage, circuits courts',
                    'Agro-alimentaire, transformation' => 'Agro-alimentaire, transformation',
                    'Commerces innovants et locaux' => 'Commerces innovants et locaux'
                ),
                'label'=>'Categorie'))

            ->add('transportation', choiceType::class, array(
                'choices' => array(
                    //mobilité
                    'Transport alternatif, co-voiturage' => 'Transport alternatif, co-voiturage'
                ),
                'label'=>'Categorie'))

            ->add('description','textarea', array(
                'label'=>'Description de l\'offre'
            ))

            ->add('wish', choiceType::class, array(
                'choices' => array(
                    'Choisir' => 'Choisir',
                    'Dupliquer ce projet' => 'Dupliquer ce projet',
                    'Former sur ce projet'=> 'Former sur ce projet',
                    'Appuyer un projet similaire'=> 'Appuyer un projet similaire',
                    'Echanger sur ce projet'=> 'Echanger sur ce projet',
                    'Rechercher un collaborateur'=> 'Rechercher un collaborateur',
                    'Co-créer'=> 'Co-créer'
                ),
                'label'=>'Souhaits'))

            ->add('fileOffer','file', [
                "label" => "Photo"],
                array( 'required'=>false));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoosterBundle\Entity\Offer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boosterbundle_offer';
    }
}
