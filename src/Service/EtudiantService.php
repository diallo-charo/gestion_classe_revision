<?php
namespace App\Service;

use App\Dto\EtudiantSearchDto;
use App\Dto\ListeEtudiantsDto;
use App\Repository\EtudiantRepository;

class EtudiantService{
    public function __construct(private EtudiantRepository $repo)
    {
       
    }

    public function getAllEtudiantsNotes():array{
        $etudiants = $this->repo->findAll();
        $etudiantsDto = [];
        foreach($etudiants as $etudiant){
            $etudiantsDto [] = ListeEtudiantsDto::fromEntity($etudiant);
        }
        return  $etudiantsDto;
    }

    public function getEtudiantAndFiltrePossible(EtudiantSearchDto $dto):array{
        $etudiants = $this->repo->findAllEtudiantAndFitre($dto);
        $etudiantsDto = [];
        foreach($etudiants as $etudiant){
            $etudiantsDto [] = ListeEtudiantsDto::fromEntity($etudiant);
        }
        return $etudiantsDto;
    }
}