<?php

class Voiture {
    public string $marque;
    public string $couleur;

    public function setMarque(string $m) {
        $this->marque = $m;
    }

    public function setCouleur(string $c) {
        $this->couleur = $c;
    }

    public function afficher() {
        echo "Marque : " . $this->marque . " | Couleur : " . $this->couleur . PHP_EOL;
    }
}
echo "<pre>";
$v1 = new Voiture();
$v1->setMarque("Toyota");
$v1->setCouleur("Blanche");

$v2 = new Voiture();
$v2->setMarque("Renault");
$v2->setCouleur("Noire");

$v1->afficher();
$v2->afficher();
echo "</pre>";
// $v1 et $v2 ont chacun leurs propres valeurs.
?>