<?php
// Partie 2 – Constructeurs et destructeur
// 2.1 Constructeur avec valeurs par défaut et promotion de propriétés
class Voiture {
    public function __construct(
        public string $couleur = "Blanche",
        public int $vitesse = 0
    ) {
        ech<?php
class Personne {
    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";

    public function __set(string $name, mixed $value): void {
        if (property_exists($this, $name)) {
            if ($name === "nom" && (trim((string)$value) === "" || strlen(trim((string)$value)) < 2)) {
                throw new InvalidArgumentException("Le nom doit contenir au moins 2 caractères.");
            }
            $this->$name = (string)$value;
        } else {
            echo "Propriété $name inexistante" . PHP_EOL;
        }
    }

    public function __get(string $name): mixed {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __isset(string $name): bool {
        if (property_exists($this, $name)) {
            return isset($this->$name);
        }
        return false;
    }

    public function __unset(string $name): void {
        if (property_exists($this, $name)) {
            $this->$name = "";
        }
    }
}
echo "<pre>";
$p = new Personne();
$p->nom = "Hachimi";
$p->prenom = "Sara";
echo $p->nom . PHP_EOL;
echo $p->prenom . PHP_EOL;
var_dump(isset($p->nom));

unset($p->nom);
var_dump(isset($p->nom));
echo "<pre>";
$p->telephone = "0600000000"; 

// Exemple de validation : décommenter pour tester l'exception.
// $p->nom = "A";
?>o "Voiture créée." . PHP_EOL;
    }

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }

    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}
echo "<pre>";
$v1 = new Voiture();
$v2 = new Voiture("Rouge", 50);
$v1->afficher();
$v2->afficher();

unset($v1); // Le destructeur de v1 est appelé ici.
echo "</pre>";
// 2.2 Un seul constructeur peut gérer les deux cas grâce aux valeurs par défaut.
class Personne {
    public function __construct(
        public string $nom = "",
        public string $prenom = ""
    ) {
        echo "Création " . __CLASS__ . PHP_EOL;
    }
}
echo "<pre>";
$p1 = new Personne();
$p2 = new Personne("Hachimi", "Sara");
echo $p2->prenom . " " . $p2->nom . PHP_EOL;
echo "</pre>";
// v2 et les autres objets encore référencés seront détruits à la fin du script.
?>