<?php
namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ActorRegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            -> add('organization', null, array(
                'label'=>'nom de la structure',


            ))
            -> add('lastname', null, array(
                'label'=>'nom et prénom du responsable'
            ))
            -> add('status_actor', ChoiceType::class, array(
                'choices' => array(

                    'Réseaux (Fondation RTE, Compagnons bâtisseurs...)' => 'Réseaux (Fondation RTE, Compagnons bâtisseurs...)',
                    'Association' => 'Association',
                    'TPE/Artisans' => 'TPE/Artisans'),
                'placeholder'=>'Choisir',
                'label'=>'statut'
            ))
            -> add('category', ChoiceType::class, array(
                'choices' => array(
                    'Développement durable' => 'Développement durable',
                    'Habitat' => 'Habitat',
                    'Agriculture/Agroalimentaire' => 'Agriculture/Agroalimentaire',
                    'Culture/Patrimoine' => 'Culture/Patrimoine',
                    'Mobilité' => 'Mobilité'),
                'placeholder'=>'Choisir',
                'label'=>'catégorie',

            ))
            -> add('town', null, array(
                'label'=>'nom de la commune'
            ))
            -> add('cp', 'text', array(
                'label'=>'code postal'
            ))
            -> add('address', null, array(
                'label'=>'adresse'
            ));
    }
    public function getParent(){
        return 'fos_user_registration';
    }
    public function getName() {
        return 'booster_actor_registration';
    }
}