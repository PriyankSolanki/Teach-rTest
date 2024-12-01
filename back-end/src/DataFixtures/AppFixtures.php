<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Produits;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {

       
          // Étape 1 : Créer des catégories
          $categories = [];
          for ($i = 1; $i <= 5; $i++) {
              $categorie = new Categories();
              $categorie->setNom('Categorie ' . $i);
              $manager->persist($categorie);
              $categories[] = $categorie; // Stocker la catégorie pour l'utiliser plus tard
          }
  
          // Étape 2 : Créer des produits et les associer à une catégorie
          for ($i = 1; $i <= 5; $i++) {
            $produit = new Produits();
            $produit->setNom('Produit ' . $i);
            $produit->setDescription('Produit');
            $produit->setPrix(12.3);

            // Ajouter une date (par exemple, une date aléatoire sur les 30 derniers jours)
            $date = new \DateTime();
            $date->modify('-' . mt_rand(0, 30) . ' days');
            $produit->setDateCreation($date);

            // Associer une catégorie aléatoire
            $categorie = $categories[array_rand($categories)];
            $produit->setCategorie($categorie);

            $manager->persist($produit);
        }

        $manager->flush();
    }
}
