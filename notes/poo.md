# Object Oriented Programms

## Types de Programmation

###  Programmation Procédurales

Tout est fonctions.

### Programmation Orienté Objet

Basé sur des objets.

## C'est quoi objet ?

###  Naturel

~ peuvent être toucher

### Programmation

~ ont des propriétés/attributs ( =~ entités)

~ ont des actions/méthodes

***exemples :***

Object : Voiture

Propriétés :
- Marque
- Type
- sns.

Méthodes :
- demarrer()
- freiner()
- rouler()
- claxonner()


## C'est quoi une Class ?

**Robotique** : Une sorte d'usine qui permet de fabriquer plusieurs Robots

Une class peut définir un objet en général

Class_1:
    - Objet 1 (du Class_1)
    - Objet 2 (du Class_1)
    - Objet 3 (du Class_1)


Class_2:
    - Objet 1 (du Class_2)
    - Objet 2 (du Class_2)
    - Objet 3 (du Class_2)

```php
class voiture {
    public $marque = 'toyota';
    function freinner($force_freinnage) {
        /* Code à propos du fonctions */
    }
}
```

```php
class dab { // Distribution automatique d'argent
    public $compteNumber;
    public $bankName;
    private $comptePassword;

    public function insererCarte() {
        // code
    }

    private function entrerCode() {
        // code définissant des actions
    }

    private function verifierCarte() {
        // code définissant des actions
    }
}
```

## Les visibilités (scope)
```php

class sample() {
    public $publicVar;
    private $privateVar;

    public function publicFunction() {
        printf($sample1.publicVar); # Success
        printf($sample.privateVar); # Success
    }

    private function privateFunction() {
        printf($sample1.publicVar); # Success
        printf($sample.privateVar); # Success
    }

$sample1 = New sample();
printf($sample1.publicVar);
printf($sample.privateVar) # Error : privateVar is onlyUsed

```

### Public

### Protected

### Private

## Principes d'encapsulations

Le fait de définir la visibilité des attributs et des méthodes
