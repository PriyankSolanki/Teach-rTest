<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitsRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProduitsController extends AbstractController
{
    #[Route('/api/produits', name: 'app_produits', methods: ['GET'])]
    public function getAllProduits(ProduitsRepository $produitsRepository, SerializerInterface $serializer): JsonResponse
    {
        $produits = $produitsRepository->findAll();
        $jsonProduits = $serializer->serialize($produits, 'json');
        return new JsonResponse($jsonProduits,Response::HTTP_OK,[],true);
    }
}
