<?php

class Utilisateur {
    public string $nom;
    public int $age;
    private string $motDePasse;

    public function __construct(string $nom, int $age, string $motDePasse) {
        $this->nom = $nom;
        $this->age = $age;
        $this->motDePasse = $motDePasse;
    }

    public function __serialize(): array {
        return [
            "nom" => $this->nom,
            "age" => $this->age
        ];
    }

    public function __unserialize(array $data): void {
        $this->nom = $data["nom"];
        $this->age = $data["age"];
        $this->motDePasse = "";
    }
}
echo "<pre>";
$u = new Utilisateur("Alice", 25, "secret123");
$serialise = serialize($u);
echo "Sérialisé : " . $serialise . PHP_EOL;

$restaure = unserialize($serialise);
var_dump($restaure);
echo "<pre>";
// Ne jamais utiliser unserialize() avec des données non fiables.
// Pour échanger des données, préférer JSON (json_encode / json_decode).
?>