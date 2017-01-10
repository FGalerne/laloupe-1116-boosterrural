<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BoosterBundle\Entity\User;


/**
 * Offer controller.
 *
 */
class OfferController extends Controller
{
    /**
     * Lists all offer entities.
     *
     */
    public function indexAction()
    {
        $user=$this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        $offers = $em->getRepository('BoosterBundle:Offer')->findBy(
            array('users'=>$user
            ));

        return $this->render('BoosterBundle:offer:index.html.twig', array(
            'offers' => $offers,
        ));
    }

    /**
     * Creates a new offer entity.
     *
     */
    public function newAction(Request $request)
    {
        $user=$this->get('security.context')->getToken()->getUser();
        $offer = new Offer();
        $offer->setUsers($user);
        $form = $this->createForm('BoosterBundle\Form\OfferType', $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offer);
            $em->flush($offer);

            return $this->redirectToRoute('offer_show', array('id' => $offer->getId(
                array($offer->getUsers()
            ))));

        }

        return $this->render('BoosterBundle:offer:new.html.twig', array(
            'offer' => $offer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offer entity.
     *
     */
    public function showAction(Offer $offer)
    {
        $deleteForm = $this->createDeleteForm($offer);

        return $this->render('BoosterBundle:offer:show.html.twig', array(
            'offer' => $offer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offer entity.
     *
     */
    public function editAction(Request $request, Offer $offer)
    {
        $deleteForm = $this->createDeleteForm($offer);
        $editForm = $this->createForm('BoosterBundle\Form\OfferType', $offer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offer_edit', array('id' => $offer->getId()));
        }

        return $this->render('BoosterBundle:offer:edit.html.twig', array(
            'offer' => $offer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offer entity.
     *
     */
    public function deleteAction(Request $request, Offer $offer)
    {
        $form = $this->createDeleteForm($offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offer);
            $em->flush($offer);
        }

        return $this->redirectToRoute('offer_index');
    }

    /**
     * Creates a form to delete a offer entity.
     *
     * @param Offer $offer The offer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offer $offer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offer_delete', array('id' => $offer->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
