<?php
class Animal {
    public function manger(): void {
        echo "Je mange." . PHP_EOL;
    }
}

class Chien extends Animal {
    public function aboyer(): void {
        echo "Wouf !" . PHP_aEOL;
    }
}

class Chat extends Animal {
    public function miauler(): void {
        echo "Miaou !" . PHP_EOL;
    }
}

$c = new Chien();
$c->manger();
$c->aboyer();

$chat = new Chat();
$chat->manger();
$chat->miauler();

// 6.2 et 6.4 Personne et Etudiant
class Personne {
    private string $dateNaissance;

    public function __construct(
        protected string $nom,
        protected string $prenom,
        string $dateNaissance
    ) {
        $this->dateNaissance = $dateNaissance;
    }

    private function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();
        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {
        return $this->prenom . " " . $this->nom . " (" . $this->getAge() . " ans)";
    }
}

class Etudiant extends Personne {
    private string $cne;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $cne
    ) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->cne = $cne;
    }

    public function getCne(): string {
        return $this->cne;
    }

    public function __toString(): string {
        return parent::__toString() . " | CNE : " . $this->cne;
    }
}

$etudiants = [];
$etudiants[] = new Etudiant("Hachimi", "Sara", "2004-05-14", "CNE001");
$etudiants[] = new Etudiant("Alaoui", "Ahmed", "2003-08-20", "CNE002");
$etudiants[] = new Etudiant("Amrani", "Salma", "2004-01-10", "CNE003");
$etudiants[] = new Etudiant("Bennani", "Youssef", "2002-11-03", "CNE004");
$etudiants[] = new Etudiant("Idrissi", "Meryem", "2003-06-25", "CNE005");

foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
}

// getAge() et dateNaissance sont privées dans Personne :
// Etudiant ne peut pas y accéder directement.
// La méthode __toString() de Personne peut toutefois appeler getAge().
?>