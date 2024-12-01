<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitsRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

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

        return new JsonResponse(['message' => 'Catégorie supprimée avec succès.'], 200);
        
    }
}
