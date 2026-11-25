<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $etudiants = [
            ['Jean Dupont', 'ETU0001', '2002-04-15'],
            ['Marie Diallo', 'ETU0002', '2001-08-22'],
            ['Paul Ndiaye', 'ETU0003', '2003-01-10']
        ];
        foreach ($etudiants as $key => [$nom,$matricule,$dateNaissance]) {
            # code...
            
            $etudiant = (new Etudiant())
                    ->setNomComplet($nom)
                    ->setMatricule($matricule)
                    ->setDateNaissance(new DateTime($dateNaissance));

            $manager->persist($etudiant);   
        }
        $manager->flush();
    }
}
