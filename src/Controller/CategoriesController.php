<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoriesRepository;
use App\Entity\Categories;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

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
        // Supprimez la categorie
        $em->remove($categorie);
        $em->flush();

        return new JsonResponse(['message' => 'Catégorie supprimée avec succès.'], Response::HTTP_OK);
        
    }


    //POST
    #[Route('/api/categories', name:"createCategories", methods: ['POST'])]
    public function createCategories(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): JsonResponse 
    {
        $data = $request->getContent();
        $decodedData = json_decode($data, true);

        if (empty($decodedData['nom'])) {
            return new JsonResponse(['erreur' => 'La requête doit comporter une clé \'nom\''], Response::HTTP_BAD_REQUEST);
        }

        $nomLength = strlen($decodedData['nom']);
        if ($nomLength > 255 || $nomLength < 1) {
            return new JsonResponse(['erreur' => 'La taille de \'nom\' ne doit pas dépasser 255 caractères.'],Response::HTTP_BAD_REQUEST);
        }
        $categorie = $serializer->deserialize($data, Categories::class, 'json');
        $em->persist($categorie);
        $em->flush();

        $jsonCategories = $serializer->serialize($categorie, 'json');
        return new JsonResponse($jsonCategories, Response::HTTP_CREATED, [], true);
   }

   
    //PUT
    #[Route('/api/categories/{id}', name:"updateCategories", methods: ['PUT'])]
    public function updateCategories(int $id,Request $request, SerializerInterface $serializer, EntityManagerInterface $em, CategoriesRepository $categoriesRepository ): JsonResponse 
    {
        $currentCategorie = $categoriesRepository->find($id);
        $updateCategorie = $serializer->deserialize($request->getContent(), Categories::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $currentCategorie]);
        if (empty($updateCategorie->getNom())) {
            return new JsonResponse(['erreur' => 'La requête doit comporter une clé \'nom\''], Response::HTTP_BAD_REQUEST);
        }
        if(strlen($updateCategorie->getNom())>255){
            return new JsonResponse(['erreur' => 'La taille de \'nom\' ne doit pas dépasser 255 caractères.'],Response::HTTP_BAD_REQUEST);
        }
        $em->persist($updateCategorie);
        $em->flush();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
   }
   

}
