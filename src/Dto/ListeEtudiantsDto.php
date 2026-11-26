<?php
namespace App\Dto;

use App\Entity\Etudiant;
use DateTime;

final readonly class ListeEtudiantsDto{
    public function __construct(
        public int $id,
        public string $nomComplet,
        public string $matricule,
        public DateTime $dateNaissance,
        public array $notes = []
    ){ }

    public static function fromEntity(Etudiant $etudiant):self{
        $notesDto = [];
        foreach ($etudiant->getNotes() as $note) {
            # code...
            $notesDto[] = $note;
        }
        return new self(
            $etudiant->getId(),
            $etudiant->getNomComplet(),
            $etudiant->getMatricule(),
            $etudiant->getDateNaissance(),
            $notesDto
        );
    }
}