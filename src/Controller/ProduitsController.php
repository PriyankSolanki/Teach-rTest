<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitsRepository;
use App\Repository\CategoriesRepository;
use App\Entity\Produits;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use DateTime;
use DateTimeZone;

class ProduitsController extends AbstractController
{
    //GET
    #[Route('/api/produits', name: 'produits', methods: ['GET'])]
    public function getAllProduits(ProduitsRepository $produitsRepository, SerializerInterface $serializer): JsonResponse
    {
        $produits = $produitsRepository->findAll();
        $jsonProduits = $serializer->serialize($produits, 'json');
        return new JsonResponse($jsonProduits,Response::HTTP_OK,[],true);
    }

    //DELETE
    #[Route('/api/produits/{id}', name: 'deleteProduits', methods: ['DELETE'])]
    public function deleteProduits(int $id, ProduitsRepository $produitsRepository, EntityManagerInterface $em): JsonResponse 
    {
        $produit = $produitsRepository->find($id);
        if (!$produit) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }
       
        // Supprimez la categorie
        $em->remove($produit);
        $em->flush();

        return new JsonResponse(['message' => 'Catégorie supprimée avec succès.'], Response::HTTP_OK);
        
    }

    //POST
    #[Route('/api/produits', name:"createProduits", methods: ['POST'])]
    public function createProduits(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, CategoriesRepository $categoriesRepository): JsonResponse 
    {
        $data = $request->getContent();
        $decodedData = json_decode($data, true);

        //champs obligatoire
        $keyNeeded = ['nom', 'description', 'prix'];
        foreach($keyNeeded as $key){
            if (empty($decodedData[$key])) {
                return new JsonResponse(['erreur' => 'La requête doit comporter les clés [\'nom\', \'description\', \'prix\']'], Response::HTTP_BAD_REQUEST);
            }
        }
        
        //gestion type string
        $keyString = ['nom', 'description'];
        foreach($keyString as $key){
            $stringLength = strlen($decodedData[$key]);
            if ($stringLength > 255) {
                return new JsonResponse(['erreur' => 'La taille de '.$key.' ne doit pas dépasser 255 caractères.'],Response::HTTP_BAD_REQUEST);
            }
        }

        //gestion prix
        if (is_numeric($decodedData['prix'])) {
            $prix = (float) $decodedData['prix'];
            if($prix < 0 ){
                return new JsonResponse(['erreur' => 'Le prix doit être positif.'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return new JsonResponse(['erreur' => 'Le prix doit être un nombre.'], Response::HTTP_BAD_REQUEST);
        }
        
        //date creation
        $dateCreation = new DateTime('now', new DateTimeZone('Europe/Paris'));
        //prix arrondi
        $decodedData['prix'] = round((float) $decodedData['prix'], 2);
        //gestion categorie
        if(!empty($decodedData['idCategorie'])){
            $idCategorie = $decodedData['idCategorie'];
            $categorie = $categoriesRepository->find($idCategorie);
            if(!$categorie){
                return new JsonResponse(['erreur' => 'La categorie '.$idCategorie.' est inéxistante'], Response::HTTP_BAD_REQUEST);
            }
        }else{
            $categorie = null;
        }
        
        
        $produit = $serializer->deserialize($data, Produits::class, 'json');
        $produit->setDateCreation($dateCreation);
        $produit->setPrix($decodedData['prix']);
        $produit->setCategorie($categorie);
        $em->persist($produit);
        $em->flush();

        $jsonProduit = $serializer->serialize($produit, 'json');
        return new JsonResponse($jsonProduit, Response::HTTP_CREATED, [], true);
   }


    //PUT
    #[Route('/api/produits/{id}', name:"updateProduits", methods: ['PUT'])]
    public function updateProduits(int $id,Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ProduitsRepository $produitsRepository, CategoriesRepository $categoriesRepository ): JsonResponse 
    {
        $currentProduit = $produitsRepository->find($id);
        if (!$currentProduit) {
            return new JsonResponse(['erreur' => 'Produit non trouvé.'], Response::HTTP_NOT_FOUND);
        }
        $updateProduit = $serializer->deserialize($request->getContent(), Produits::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $currentProduit]);

        $data = $request->getContent();
        $decodedData = json_decode($data, true);
        //champs obligatoire
        $keyNeeded = ['nom', 'description', 'prix'];
        foreach($keyNeeded as $key){
            if (empty($decodedData[$key])) {
                return new JsonResponse(['erreur' => 'La requête doit comporter les clés [\'nom\', \'description\', \'prix\']'], Response::HTTP_BAD_REQUEST);
            }
        }

        if (!empty($decodedData['dateCreation'])) {
            return new JsonResponse(['erreur' => 'Vous ne pouvez pas modifier la date de création.'], Response::HTTP_BAD_REQUEST);
        }
        
        //gestion type string
        $keyString = ['nom', 'description'];
        foreach($keyString as $key){
            $stringLength = strlen($decodedData[$key]);
            if ($stringLength > 255) {
                return new JsonResponse(['erreur' => 'La taille de '.$key.' ne doit pas dépasser 255 caractères.'],Response::HTTP_BAD_REQUEST);
            }
        }

        //gestion prix
        if (is_numeric($decodedData['prix'])) {
            $prix = (float) $decodedData['prix'];
            if($prix < 0 ){
                return new JsonResponse(['erreur' => 'Le prix doit être positif.'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return new JsonResponse(['erreur' => 'Le prix doit être un nombre.'], Response::HTTP_BAD_REQUEST);
        }
        
        //prix arrondi
        $decodedData['prix'] = round((float) $decodedData['prix'], 2);
        //gestion categorie
        if(!empty($decodedData['idCategorie'])){
            $idCategorie = $decodedData['idCategorie'];
            $categorie = $categoriesRepository->find($idCategorie);
            if(!$categorie){
                return new JsonResponse(['erreur' => 'La categorie '.$idCategorie.' est inéxistante'], Response::HTTP_BAD_REQUEST);
            }
        }else{
            $categorie = null;
        }

        $updateProduit->setPrix($decodedData['prix']);
        $updateProduit->setCategorie($categorie);
        $em->persist($updateProduit);
        $em->flush();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
