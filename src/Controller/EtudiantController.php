<?php

namespace App\Controller;

use App\Dto\EtudiantSearchDto;
use App\Form\EtudiantSearchType;
use App\Service\EtudiantService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EtudiantController extends AbstractController
{

    public function __construct(private readonly EtudiantService $service)
    {
    }


    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(Request $request): Response
    {
        // $etudiants = $this->service->getAllEtudiantsNotes();
        $search = new EtudiantSearchDto();

        $form = $this->createForm(EtudiantSearchType::class, $search);
        $form->handleRequest($request);
        $etudiants = $this->service->getEtudiantAndFiltrePossible($search);
        // dd($etudiants);
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
            'etudiants' => $etudiants,
            "fromSearchEtudiant" => $form->createView()
        ]);
    }

    #[Route('/etudiant/add', name: 'app_etudiant_add')]
    public function addEtudiant(): Response
    {
        return $this->render('etudiant/addEtudiant.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
}
