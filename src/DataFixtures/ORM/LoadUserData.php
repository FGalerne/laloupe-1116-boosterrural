<?php
namespace BoosterBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BoosterBundle\Entity\User;
use BoosterBundle\Entity\Offer;
use BoosterBundle\Entity\Needs;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        //Create a new mayor

        $mayor1 = new User();
        $mayor1->setTown('Aumont-Aubrac');
        $mayor1->setCp('48130');
        $mayor1->setEmail('aumont@mail.fr');
        $mayor1->setEnabled('1');
        $mayor1->setUsername('Aumont');
        $mayor1->setPassword('123');
        $mayor1->setWebsite('www.aumontaubrac.com');
        $mayor1->setLastname('');
        $mayor1->setDescription('Aumont-Aubrac est une ancienne commune française située dans le département de la Lozère et la région Occitanie. En occitan, le village se nomme Autmont (prononcé [awmu] ou [zawmu] la deuxième forme étant celle en usage exclusif parmi les locuteurs occitans des communes environnantes (nom relevé sur place en 2000). L\'usage d\'un z prosthétique devant [a] ou [u] est typique des dialectes auvergnats de la région. En effet, le village se trouve à l\'extrême limite sud de l\'auvergnat. La commune d\'Aumont-Aubrac est labellisée Village étape depuis 2002.');
        $mayor1->setMessageMayor('Bienvenue en Terre de Peyre, C’est avec plaisir que nous vous accueillons à Aumont-Aubrac, commune de 1146 habitants située à 1050 d’altitude entre les pittoresques Monts Granitiques de la Margeride et les immenses plateaux basaltiques de l’Aubrac.
 
Notre commune premier village Etape Numérique de France, souhaite vous apporter via Internet le maximum d’informations sur la vie de notre cité, les principaux événements, l’activité économique et touristique, la dynamique des nos associations culturelles, sportives ou sociales autant d’atouts favorables et compatibles à notre réputation et vocation de terre d’accueil.
 
Alain Astruc, Maire d’Aumont-Aubrac.');
        $mayor1->setResident('1146');
        $mayor1->setPhone('04 66 42 80 02');

        //addition an offer for the mayor 1
        $mayor1 = new Offer();
        $mayor1->setDescription('');








        $manager->persist($userAdmin);
        $manager->flush();
    }
}