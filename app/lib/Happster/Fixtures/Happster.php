<?php

namespace Happster\Fixtures;

class Happster {

    public static function load() {
        // Compte fictif
        $compteEdf = new \Happster\Model\CompteEdf;
        $compteEdf->setNom('Dupont');
        $compteEdf->setPrenom('Jean');
        $compteEdf->setAdresse('30 rue des fleurs');
        $compteEdf->setVille('La Roche-sur-Yon');
        $compteEdf->setCodePostal(85000);
        $compteEdf->setBudgetSouhaite(50);
        $compteEdf->setPrixAbonnement(55.60);
        $compteEdf->save();

        // Postes
        $poste = new \Happster\Model\Poste;
        $poste->setNom('Radiateurs');
        $poste->setPuissanceMax(54.59);
        $poste->setReglagePossible(false);
        $poste->save();

        $poste = new \Happster\Model\Poste;
        $poste->setNom('Lave Linge');
        $poste->setPuissanceMax(90);
        $poste->setReglagePossible(true);
        $poste->save();

        $poste = new \Happster\Model\Poste;
        $poste->setNom('Lave Linge');
        $poste->setPuissanceMax(90);
        $poste->setReglagePossible(true);
        $poste->save();

        $poste = new \Happster\Model\Poste;
        $poste->setNom('Panneau Solaire');
        $poste->setPuissanceMax(80);
        $poste->setReglagePossible(false);
        $poste->setProducteur(true);
        $poste->save();

        // Tarifs
        $timeStart = mktime(16,0,0,10,3,2015);
        $timeEnd   = mktime(23,50,0,10,4,2015);

        $currTime = $timeStart;

        while ($currTime < $timeEnd) {
            $tarif = new \Happster\Model\Tarif();
            $tarif->setTime($currTime);
            $tarif->setProduction(round(rand(50, 225)/1000, 2));
            $tarif->setConsommation(round(rand(130, 35)/1000, 2));
            $tarif->save();

            $activite = new \Happster\Model\Activite();
            $activite->setTime($currTime);
            $activite->setProduction(round(rand(50, 225)/1000, 2));
            $activite->setConsommation(round(rand(130, 35)/1000, 2));
            $activite->setCompteEdf($compteEdf);
            $activite->save();

            $currTime += 15;
        }


        // Historique
        for ($i = 9; $i > 0; $i--) {
            $historique = new \Happster\Model\Historique();
            $historique->setTime(mktime(0, 0, 0, $i, 1, 2015));
            $historique->setBudgetSouhaite(50);
            $historique->setConsommation(rand(4536, 5697)/100);
            $historique->setProduction(rand(2349, 3200)/100);
            $historique->setCompteEdf($compteEdf);
            $historique->save();
        }

        $postes = [
            'Radiateur' => 5 * 1500,
            'Ballon 100L' => 2500,
            'Réfrigérateur' => 200,
            'Congélateur' => 275,
            'Lave-vaisselle' => 1200,
            'Lave-linge' => 2500,
            'Sèche-linge' => 2500,
            'Télévision LCD' => 150,
            'Plaques de cuisson' => 9000,
            'Micro-ondes' => 1000,
            'Cafetière' => 750,
            'Voiture' => 4500,
            'Ordinateur' => 80,
            'Aspirateur' => 700,
            'Eclairage' => 100,
        ];

        foreach ($postes as $nom => $puissanceMax) {
            $poste = new \Happster\Model\Poste;
            $poste->setNom($nom);
            $poste->setPuissanceMax($puissanceMax);
            $poste->setReglagePossible(true);
            $poste->setProducteur(false);
            $poste->save();
        }

    }

}

?>
