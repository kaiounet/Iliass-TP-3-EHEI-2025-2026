<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\Product;
use App\Form\Type\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: 'product_show')]
    public function show(int $id = 1, Request $request): Response
    {
        $product = new Product();
        $product->setTitle("Premium Wireless Headphones");
        $product->setPrice(129.99);
        $product->setDescription("Experience superior sound quality with our premium wireless headphones. Features active noise cancellation, 30-hour battery life, and premium comfort padding.");
        $product->setFeatures(['Brand' => 'AudioTech', 'Color' => 'Matte Black', 'Connectivity' => 'Bluetooth 5.0', 'Battery Life' => '30 hours']);
        $product->setImageUrl("images/placeholder.webp");

        $form = $this->createForm(ProductType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // Logique d'ajout au panier ici...
            $this->addFlash('success', 'Product added to cart!');

            return $this->redirectToRoute('product_show', ['id' => $id]);
        }

        return $this->render('product/show.html.twig', ['product' => $product, 'form' => $form->createView(),]);
    }
}
