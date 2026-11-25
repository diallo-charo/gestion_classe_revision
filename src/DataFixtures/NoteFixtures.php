<?php

namespace App\DataFixtures;

use App\Entity\Note;
use App\Repository\EtudiantRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Override;

class NoteFixtures extends Fixture implements DependentFixtureInterface
{

    //injecter le repos de etudiant ici

    public function __construct(private readonly EtudiantRepository $repo)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $notes = [
            ['Mathématiques', 15, 1],
            ['PHP', 17, 1],
            ['Java', 18, 1],

            ['Mathématiques', 12, 2],
            ['PHP', 16, 2],
            ['Java', 18, 2],

            ['Mathématiques', 10, 3],
            ['PHP', 17, 3],
            ['Java', 15, 3],
        ];

        foreach ($notes as $key => [$matiere,$valeur,$idEtudiant]) {
            # code...
            $etudiant = $this->repo->find($idEtudiant); 
            $note = (new Note())
                ->setEtudiant($etudiant)
                ->setMatiere($matiere)
                ->setValeur($valeur);
            $manager->persist($note);       
        }
        $manager->flush();
    }

    #[Override]
    public function getDependencies(): array
    {
        return [EtudiantFixtures::class];
    }

    
}
