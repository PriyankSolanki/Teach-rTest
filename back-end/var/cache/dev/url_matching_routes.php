<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/categories' => [
            [['_route' => 'categories', '_controller' => 'App\\Controller\\CategoriesController::getAllCategories'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'createCategories', '_controller' => 'App\\Controller\\CategoriesController::createCategories'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/produits' => [
            [['_route' => 'produits', '_controller' => 'App\\Controller\\ProduitsController::getAllProduits'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'createProduits', '_controller' => 'App\\Controller\\ProduitsController::createProduits'], null, ['POST' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/(?'
                    .'|categories/([^/]++)(?'
                        .'|(*:72)'
                    .')'
                    .'|produits/([^/]++)(?'
                        .'|(*:100)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        72 => [
            [['_route' => 'deleteCategories', '_controller' => 'App\\Controller\\CategoriesController::deleteCategories'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'updateCategories', '_controller' => 'App\\Controller\\CategoriesController::updateCategories'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        100 => [
            [['_route' => 'deleteProduits', '_controller' => 'App\\Controller\\ProduitsController::deleteProduits'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'updateProduits', '_controller' => 'App\\Controller\\ProduitsController::updateProduits'], ['id'], ['PUT' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
