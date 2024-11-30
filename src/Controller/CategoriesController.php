<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoriesRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends AbstractController
{
    #[Route('api/categories', name: 'app_categories', methods: ['GET'])]
    public function getAllCategories(CategoriesRepository $categoriesRepository, SerializerInterface $serializer) : JsonResponse
    {
        $categories = $categoriesRepository->findAll();
        $jsonCategories = $serializer->serialize($categories, 'json');
        return new JsonResponse($jsonCategories,Response::HTTP_OK,[],true);
    }
}
