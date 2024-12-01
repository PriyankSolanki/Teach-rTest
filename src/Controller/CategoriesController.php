<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoriesRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends AbstractController
{
    //GET
    #[Route('api/categories', name: 'categories', methods: ['GET'])]
    public function getAllCategories(CategoriesRepository $categoriesRepository, SerializerInterface $serializer) : JsonResponse
    {
        $categories = $categoriesRepository->findAll();
        $jsonCategories = $serializer->serialize($categories, 'json');
        return new JsonResponse($jsonCategories,Response::HTTP_OK,[],true);
    }

    //DELETE
    #[Route('/api/categories/{id}', name: 'deleteCategories', methods: ['DELETE'])]
    public function deleteCategories(int $id, CategoriesRepository $categoriesRepository, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse 
    {
        $categorie = $categoriesRepository->find($id);
        if (!$categorie) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }
        // Verifiez si des produits sont associes
        $produitsAssocies = $categorie->getProduits();
        if (count($produitsAssocies) > 0) {
            $data = [
                'erreur' => 'Impossible de supprimer cette catégorie, des produits y sont associés.',
                'produits_associes' => $serializer->normalize($produitsAssocies, 'json')
            ];
            return new JsonResponse($data, Response::HTTP_BAD_REQUEST);
        }
        // Supprimez la categorie
        $em->remove($categorie);
        $em->flush();

        return new JsonResponse(['message' => 'Catégorie supprimée avec succès.'], 200);
        
    }
}
