<?php
namespace App\Dto;

use App\Entity\Etudiant;
use App\Entity\Note;

class NotesEtudiantDto{
    public function __construct(
        public ?string $matiere = null,
        public ?float $valeur = 0,
        public ?Etudiant $etudiant = null
    ){}

    public static function fromEntity(Note $note){
        return new self(
            $note->getMatiere(),
            $note->getValeur(),
            $note->getEtudiant()
        );
    }
}