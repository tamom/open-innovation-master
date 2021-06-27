<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Entity\Matiere;
use App\Form\MatiereType;
use App\Repository\MatiereRepository;
use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(EtudiantRepository $etudiantRepository,MatiereRepository $matiereRepository ): Response
    {
   
        return $this->render('dashboard/index.html.twig', [
            'etudiants' => $etudiantRepository->findAll(),
            'matieres'=>$matiereRepository->findAll(),
        ]);
    }
}
