<?php

namespace App\Controller;

use App\Service\NoteService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NoteController extends AbstractController
{
    public function __construct(private readonly NoteService $service)
    {
    }

    #[Route('/note/{id_note?}', name: 'app_note')]
    public function index(?int $id_note): Response
    {
        $notes = $this->service->getNoteEtudiantById($id_note);
        // dd($notes);
        return $this->render('note/index.html.twig', [
            'controller_name' => 'NoteController',
            'notesEtudiant' => $notes
        ]);
    }
}
