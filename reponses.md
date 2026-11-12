# Réponses – TP 4 POO en PHP

## Partie 0
- 0.3 : Non. Chaque objet possède ses propres attributs. Modifier `$v1->marque` ne modifie pas `$v2->marque`.

## Partie 1
- 1.1 : `nom` et `prenom` sont accessibles car publics. `cin`, `dateNaissance` et `getAge()` ne sont pas accessibles depuis l'extérieur car privés.
- 1.2 : Un CIN est une information personnelle. Le rendre public permettrait à n'importe quel code ayant l'objet d'y accéder ou de le modifier directement.
- 1.3 : Non. Une méthode privée peut être appelée par une autre méthode de la même classe, par exemple `__toString()`.
- 1.4 : Depuis l'extérieur, `protected` reste inaccessible. La différence est que les classes filles peuvent accéder à un membre `protected`, mais pas à un membre `private`.

## Partie 2
- 2.1.a : `new Voiture("Noire")` donne la couleur Noire et conserve la vitesse par défaut 0. `new Voiture(120)` provoque une erreur de type, car le premier paramètre doit être une chaîne.
- 2.1.b : La promotion de propriétés permet de déclarer et initialiser les propriétés directement dans les paramètres du constructeur. Cela évite de répéter les déclarations et les affectations.
- 2.2.a : PHP ne permet pas de déclarer deux méthodes `__construct()` dans une même classe. La déclaration en double provoque une erreur fatale.
- 2.2.b : Utiliser un seul constructeur avec des valeurs par défaut, par exemple `__construct(string $nom = "", string $prenom = "")`.
- 2.2.c : Une méthode statique de fabrique est une méthode appelée sur la classe qui crée et retourne un objet, par exemple `Personne::depuisTableau($data)`.
- 2.3.a : Avec `unset`, affichage : création, destruction, puis « Fin du script ».
- 2.3.b : Sans `unset`, « Fin du script » s'affiche avant le message de destruction à la fin du script.
- 2.3.c : Les objets encore référencés sont généralement détruits à la fin du script dans l'ordre inverse de leur création.
- 2.3.d : Le destructeur peut afficher `echo "Détruire " . __CLASS__;`.

## Partie 3
- 3.1 : `__set` gère l'écriture, `__get` la lecture, `__isset` la vérification avec `isset`, et `__unset` la suppression/réinitialisation.
- 3.2 : Sans `__set`, l'accès à une propriété privée depuis l'extérieur provoque une erreur. Avec `__set`, la classe peut intercepter l'écriture et décider si elle l'accepte.
- 3.3 : Oui, si `__set` accepte toutes les valeurs sans contrôle. Il faut vérifier le nom de la propriété et valider la valeur avant de l'affecter.
- 3.4 : Dans le code, le nom est refusé s'il est vide ou contient moins de deux caractères.

## Partie 4
- 4.1 : `__toString()` est une méthode de la classe `Personne`; elle peut donc appeler une autre méthode privée de cette même classe.
- 4.2 : `__toString()` doit retourner une chaîne. Retourner un entier ne respecte pas le type de retour `string` et provoque une erreur de type.
- 4.3 : `__toString()` permet d'afficher directement un objet avec `echo`, et facilite son affichage dans une concaténation ou un message.

## Partie 5
- 5.1 : Non, le mot de passe ne figure pas dans la chaîne car `__serialize()` ne retourne que le nom et l'âge.
- 5.2 : Sans `__serialize()`, PHP sérialise les propriétés de l'objet, y compris potentiellement le mot de passe privé. Cela peut exposer une donnée sensible.
- 5.3 : Après restauration, le mot de passe vaut une chaîne vide car `__unserialize()` le réinitialise. Une vraie application doit prévoir une procédure sécurisée de réinitialisation ou de récupération.
- 5.4 : `unserialize()` sur des données non fiables peut permettre une PHP Object Injection. Pour échanger des données simples, utiliser JSON avec `json_encode()` et `json_decode()`.

## Partie 6
- 6.1.a : Oui, la classe `Chat` peut hériter de `Animal` et définir `miauler()`.
- 6.1.b : Non, un objet `Chien` ne possède pas la méthode `miauler()`, qui appartient à `Chat`.
- 6.2.a : Sans `parent::__construct($nom)`, le constructeur parent n'est pas exécuté; les propriétés initialisées par lui ne sont donc pas correctement initialisées.
- 6.2.b : `protected` permet à la classe fille d'accéder à `$nom`; `private` ne le permettrait pas.
- 6.3.a : (1) Redéfinir une méthode `final` provoque une erreur. (2) Étendre une classe `final` provoque une erreur. (3) Modifier une propriété `readonly` après son initialisation provoque une erreur.
- 6.3.b : `readonly` convient à un identifiant ou une date de création qui ne doit plus changer. `final` convient à une méthode dont le comportement ne doit pas être redéfini.
- 6.4.a : Une méthode privée du parent n'est pas accessible directement dans la classe fille. Il faudrait la déclarer `protected` pour que la classe fille puisse l'utiliser.
- 6.4.b : `dateNaissance` est `private`; elle est donc accessible uniquement dans `Personne`, même si `Etudiant` hérite de `Personne`.
- 6.4.c : `parent::__toString()` évite de répéter le code d'affichage du nom, prénom et âge.

## Partie 7
- 7.1 : L'expression `$this->montant 1 * ...` contient une erreur de syntaxe : le signe `+` manque.
- 7.2 : La formule correcte est `nouveau montant = montant * (1 + taux / 100)`.
- 7.3 : L'énoncé demande montant initial puis intérêt. Il est donc plus clair de respecter cet ordre dans le constructeur; sinon on risque d'inverser les arguments lors de l'appel.
- 7.4 : Le code corrigé utilise `float`, des types de retour et `number_format()`. Résultats attendus : environ 1 037,50 DH et 4 072,24 DH.

## Questions de synthèse
1. Une classe est un modèle qui définit les attributs et méthodes; un objet est une instance concrète de cette classe.
2. Trois avantages de la POO : organisation en objets, réutilisation du code avec l'héritage, encapsulation des données.
3. `private` et `protected` protègent les données et contrôlent les accès, ce qui favorise l'encapsulation.
4. `private` est accessible uniquement dans la classe qui le déclare; `protected` est aussi accessible dans les classes filles.
5. Les méthodes magiques sont généralement déclarées `public`. Certaines exceptions tolérées par PHP existent selon la méthode et sa signature; dans ce TP, suivez les signatures indiquées dans le cours.
