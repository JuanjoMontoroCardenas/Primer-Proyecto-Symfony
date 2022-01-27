<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Category;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{product_name}/{category_id}", name="product")
     */
    public function createProduct(ManagerRegistry $doctrine, string $product_name, int $category_id): Response
    {
        $entityManager = $doctrine->getManager();

        $product = new Product();
        $product->setName($product_name);
        $category = $doctrine->getRepository(Category::class)->find($category_id);
        $product->setCategory($category);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        $products = $category->getProducts();

        return $this->render('product/index.html.twig', [
            'product' => $product,
            'products' => $products,
            'category' => $category->getName(),
        ]);
    }
}
