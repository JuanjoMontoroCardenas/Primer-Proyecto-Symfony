<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Category;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{category_name}", name="category")
     */
    public function createCategory(ManagerRegistry $doctrine, string $category_name): Response
    {
        $entityManager = $doctrine->getManager();

        $category = new Category();
        $category->setName($category_name);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($category);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$category->getId());
    }

    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
