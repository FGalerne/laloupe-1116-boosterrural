<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BoosterBundle\Entity\User;
use BoosterBundle\Entity\Needs;


class ProfCitizenController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();


        $user=$this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('BoosterBundle:User')->findAll();

        $offers = $em->getRepository('BoosterBundle:Offer')->findBy(
            array('users'=>$user
            ));

        $needs = $em->getRepository('BoosterBundle:Needs')->findBy(
            array('users'=>$user
            ));


        return $this->render('BoosterBundle:Citizen:index.html.twig', array(
            'user'=>$user,
            'users'=>$users,
            'offers' => $offers,
            'needs' => $needs,

        ));
    }

    /**
     * Lists all offer entities.
     *
     */

    /**
     * Creates a new offer entity.
     *
     */
    public function newOfferAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $offer = new Offer();
        $offer->setUsers($user);
        $form = $this->createForm('BoosterBundle\Form\CitizenOfferType', $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offer);
            $em->flush($offer);

            return $this->redirectToRoute('citizen_showOffer', array('id' => $offer->getId(
                array($offer->getUsers()
            ))));

        }

        return $this->render('BoosterBundle:Citizen:newOffer.html.twig', array(
            'offer' => $offer,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a offer entity.
     *
     */
    public function showOfferAction(Offer $offer)
    {

        return $this->render('BoosterBundle:Citizen:showOffer.html.twig', array(
            'offer' => $offer,

        ));
    }
    /**
     * Displays a form to edit an existing offer entity.
     *
     */
    public function editOfferAction(Request $request, Offer $offer)
    {


        $form = $this->createForm('BoosterBundle\Form\CitizenOfferType', $offer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('citizen_editOffer', array('id' => $offer->getId()));
        }

        return $this->render('BoosterBundle:Citizen:editOffer.html.twig', array(
            'offer' => $offer,
            'form' => $editForm->createView()
        ));

    }

    public function listOfferCitizenAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offers = $em->getRepository('BoosterBundle:Offer')->createQueryBuilder('n')->join('n.users','u');
        $offers = $offers->where($offers->expr()->in('u.roles', ['a:1:{i:0;s:12:"ROLE_CITIZEN";}']))->getQuery()->getResult();
        return $this->render('BoosterBundle:Citizen:listOfferCitizen.html.twig', array(
            'offers' => $offers,
        ));
    }


    /**
     * Lists all needs entities.
     */

    public function newNeedAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $needs = new Needs();
        $needs->setUsers($user);

        $form = $this->createForm('BoosterBundle\Form\CitizenNeedsType', $needs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($needs);
            $em->flush($needs);

            return $this->redirectToRoute('citizen_showNeeds', array('id' => $needs->getId(
                array($needs->getUsers()
                ))));

        }

        return $this->render('BoosterBundle:Citizen:newNeeds.html.twig', array(
            'needs' => $needs,
            'form' => $form->createView(),
        ));
    }




    public function showNeedAction(Needs $need)
    {


        return $this->render('BoosterBundle:Citizen:showNeeds.html.twig', array(
            'need' => $need,

        ));
    }

    /**
     * Displays a form to edit an existing need entity.
     *
     */
    public function editNeedAction(Request $request, Needs $need)
    {

        $form = $this->createForm('BoosterBundle\Form\CitizenNeedsType', $need);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('citizen_editNeeds', array('id' => $need->getId()));
        }

        return $this->render('BoosterBundle:Citizen:editNeeds.html.twig', array(
            'need' => $need,
            'form' => $form->createView(),

        ));
    }

    public function listNeedsCitizenAction(){
        $em = $this->getDoctrine()->getManager();
        $needs = $em->getRepository('BoosterBundle:Needs')->createQueryBuilder('n')->join('n.users','u');
        $needs = $needs->where($needs->expr()->in('u.roles', ['a:1:{i:0;s:12:"ROLE_CITIZEN";}']))->getQuery()->getResult();
        return $this->render('BoosterBundle:Citizen:listNeedsCitizen.html.twig', array(
            'needs' => $needs,
            ));
    }

    /************************DELETE OFFER OR NEEDS *************************/

    public function deleteOfferAction(Offer $offer){
        $em = $this->getDoctrine()->getManager();
        $em->remove($offer);
        $em->flush($offer);

        return $this->redirectToRoute('citizen_index');

    }
    public function deleteNeedsAction(Needs $needs){
        $em = $this->getDoctrine()->getManager();
        $em->remove($needs);
        $em->flush($needs);

        return $this->redirectToRoute('citizen_index');

    }


    public function editDescriptionAction(Request $request, User $user)
    {

        $form = $this->createForm('BoosterBundle\Form\DescriptionType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actor_index', array('id' => $user->getId()));
        }


        return $this->render('BoosterBundle:Citizen:editDescription.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),

        ));
    }


    public function editUserAction(Request $request, User $user)
    {

        $form = $this->createForm('BoosterBundle\Form\CitizenRegistrationType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('citizen_index', array('id' => $user->getId()));
        }

        return $this->render('BoosterBundle:Citizen:editDescription.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),


        ));
    }
}
