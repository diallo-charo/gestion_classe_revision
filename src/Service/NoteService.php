<?php
namespace App\Service;

use App\Dto\NotesEtudiantDto;
use App\Repository\NoteRepository;

class NoteService{
    public function __construct(private readonly NoteRepository $repo)
    {
    }

    public function getNoteEtudiantById(int $id){
        $notes = $this->repo->findBy(["etudiant" => $id]);
        $notesDto = [];
        foreach ($notes as $note) {
            $notesDto [] =  NotesEtudiantDto::fromEntity($note);;
        }        
        return $notesDto;
    }
}