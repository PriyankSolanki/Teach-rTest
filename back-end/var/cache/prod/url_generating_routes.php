<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'categories' => [[], ['_controller' => 'App\\Controller\\CategoriesController::getAllCategories'], [], [['text', '/api/categories']], [], [], []],
    'deleteCategories' => [['id'], ['_controller' => 'App\\Controller\\CategoriesController::deleteCategories'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'createCategories' => [[], ['_controller' => 'App\\Controller\\CategoriesController::createCategories'], [], [['text', '/api/categories']], [], [], []],
    'updateCategories' => [['id'], ['_controller' => 'App\\Controller\\CategoriesController::updateCategories'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'produits' => [[], ['_controller' => 'App\\Controller\\ProduitsController::getAllProduits'], [], [['text', '/api/produits']], [], [], []],
    'deleteProduits' => [['id'], ['_controller' => 'App\\Controller\\ProduitsController::deleteProduits'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/produits']], [], [], []],
    'createProduits' => [[], ['_controller' => 'App\\Controller\\ProduitsController::createProduits'], [], [['text', '/api/produits']], [], [], []],
    'updateProduits' => [['id'], ['_controller' => 'App\\Controller\\ProduitsController::updateProduits'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/produits']], [], [], []],
    'App\Controller\CategoriesController::getAllCategories' => [[], ['_controller' => 'App\\Controller\\CategoriesController::getAllCategories'], [], [['text', '/api/categories']], [], [], []],
    'App\Controller\CategoriesController::deleteCategories' => [['id'], ['_controller' => 'App\\Controller\\CategoriesController::deleteCategories'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'App\Controller\CategoriesController::createCategories' => [[], ['_controller' => 'App\\Controller\\CategoriesController::createCategories'], [], [['text', '/api/categories']], [], [], []],
    'App\Controller\CategoriesController::updateCategories' => [['id'], ['_controller' => 'App\\Controller\\CategoriesController::updateCategories'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'App\Controller\ProduitsController::getAllProduits' => [[], ['_controller' => 'App\\Controller\\ProduitsController::getAllProduits'], [], [['text', '/api/produits']], [], [], []],
    'App\Controller\ProduitsController::deleteProduits' => [['id'], ['_controller' => 'App\\Controller\\ProduitsController::deleteProduits'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/produits']], [], [], []],
    'App\Controller\ProduitsController::createProduits' => [[], ['_controller' => 'App\\Controller\\ProduitsController::createProduits'], [], [['text', '/api/produits']], [], [], []],
    'App\Controller\ProduitsController::updateProduits' => [['id'], ['_controller' => 'App\\Controller\\ProduitsController::updateProduits'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/produits']], [], [], []],
];
