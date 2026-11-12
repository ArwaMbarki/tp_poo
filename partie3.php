<?php
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
?>