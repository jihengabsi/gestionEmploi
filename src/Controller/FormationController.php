<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Formation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
class FormationController extends AbstractController
{

  public function index(): Response
    {
        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }
     /**
     * @Route("/formation",name="formation")
     * @Method({"GET"})
     */
    public function index1(): Response
    {
     $formations=$this->getDoctrine()->getRepository(Formation::class)->findAll();
     return $this->render('formation/index.html.twig',array ('formations'=>$formations));

    }
      /**
     * @Route("/formationFront",name="formationFront")
     * @Method({"GET"})
     */
    public function index2(): Response
    {
     $formations=$this->getDoctrine()->getRepository(Formation::class)->findAll();
     return $this->render('formation/index2.html.twig',array ('formations'=>$formations));

    }
    

     /**
     * @Route("/addFormation")
     * @Method({"GET","POST"})
     */
    public function save(Request $request)
    {
        $classe=new Formation();
        $form=$this->createFormBuilder($classe)
        ->add('Titre', TextareaType::class, array(
        'label' => 'Titre',
          'required' => true,
          'attr' => array('class' => 'form-control')
        ))
             ->add('Date', DateType::class, array(
                'label' => 'Date',
                  'required' => true
                 
         ))
         ->add('Lieu', TextareaType::class, array(
            'label' => 'Lieu',
              'required' => true,
              'attr' => array('class' => 'form-control')
        ))
        ->add('Description', TextareaType::class, array(
            'label' => 'Description',
              'required' => true,
              'attr' => array('class' => 'form-control')
        ))
        ->add('Prix', TextareaType::class, array(
            'label' => 'Prix',
              'required' => true,
              'attr' => array('class' => 'form-control')
        ))
        ->add('save', SubmitType::class, array(
          'label' => 'Ajouter',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
          $classe = $form->getData();
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($classe);
          $entityManager->flush();
  
          return $this->redirectToRoute('formation');
        }
        return $this->render('formation/addFormation.html.twig',array('form'=>$form->createView()));

    }
    /**
     * @Route("/formation/modifier/{id}", name="edit_class")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
      $Formation = new Formation();
      $Formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);

      $form = $this->createFormBuilder($Formation)
      ->add('Titre', TextareaType::class, array(
        'label' => 'Titre',
          'required' => true,
          'attr' => array('class' => 'form-control')
        ))
             ->add('Date', DateType::class, array(
                'label' => 'Date',
                  'required' => true,
                  
         ))
         ->add('Lieu', TextareaType::class, array(
            'label' => 'Lieu',
              'required' => true,
              'attr' => array('class' => 'form-control')
        ))
        ->add('Description', TextareaType::class, array(
            'label' => 'Description',
              'required' => true,
              'attr' => array('class' => 'form-control')
        ))
        ->add('Prix', TextareaType::class, array(
            'label' => 'Prix',
              'required' => true,
              'attr' => array('class' => 'form-control')
        ))
        ->add('save', SubmitType::class, array(
          'label' => 'Modifier',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('formation');
      }

      return $this->render('formation/modFormation.html.twig', array(
        'form' => $form->createView()
      ));
    }
 /**
     * @Route("/formation/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
      $Formation = $this->getDoctrine()->getRepository(Formation::class)->findOneById($id);
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($Formation);
      $entityManager->flush();

      $response = new Response();
      $response->send();
      return $this->redirectToRoute('formation');
    }

/**
     * @Route("/formation/{id}", name="formation_show")
     */
    public function show($id) {
      $Formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);

      return $this->render('formation/affichFormation.html.twig', array('formation' => $Formation));
    }



}
