<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ClasseController extends AbstractController
{
    /**
     * @Route("/classe", name="I1_dev")
     */
    public function Dev1(EtudiantRepository $etudiantRepository): Response
    {
        return $this->render('classe/I1_dev.html.twig', [
            'etudiants' => $etudiantRepository->findBy(['classe'=>'I1 études et développement']),
        ]);
    
    }
        /**
     * @Route("/I2_dev", name="I2_dev")
     */
    public function Dev2(EtudiantRepository $etudiantRepository): Response
    {
        return $this->render('classe/I2_dev.html.twig', [
            'etudiants' => $etudiantRepository->findBy(['classe'=>'I2 études et développement']),
        ]);
    
    }
            /**
     * @Route("/infa", name="infra")
     */
    public function infra(EtudiantRepository $etudiantRepository): Response
    {
        return $this->render('classe/infra1.html.twig', [
            'etudiants' => $etudiantRepository->findBy(['classe'=>'Réseaux et infrastructure ']),
        ]);
    
    }
    //Fonction  Pour ajouter Etudiant dans la classe I1 dev 

     /**
     * @Route("/ajouter", name="classe_etudiant_new", methods={"GET","POST"})
     */
    public function newI1(Request $request): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etudiant);
            $entityManager->flush();

            return $this->redirectToRoute('I1_dev');
        }

        return $this->render('etudiant/new.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form->createView(),
        ]);
    }
    //Fonction  Pour ajouter Etudiant dans la classe I2 dev 

     /**
     * @Route("/ajouterI2", name="classe_etudiant_I2", methods={"GET","POST"})
     */
    public function newI2(Request $request): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etudiant);
            $entityManager->flush();

            return $this->redirectToRoute('I2_dev');
        }

        return $this->render('etudiant/new.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form->createView(),
        ]);
    }

    //Fonction  Pour ajouter un Etudiant dans la classe Réseaux & infrastructure 

     /**
     * @Route("/ajouterInfra", name="classe_etudiant_Infra", methods={"GET","POST"})
     */
    public function newReseaux(Request $request): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etudiant);
            $entityManager->flush();

            return $this->redirectToRoute('infra');
        }

        return $this->render('etudiant/new.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form->createView(),
        ]);
    }

}
