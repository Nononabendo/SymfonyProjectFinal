<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Category;
use App\Entity\Product;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    #[Route('/nos-produits', name: 'products')]






    
    public function index(Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        dd($request);
        $form->handleRequest($request);

        // $form2 = $this->createForm(SearchType::class, $search);
        // $form2->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           
            $products = $this->em->getRepository(Product::class)->findWithSearch($search); 
            
        } else {
            $products = $this->em->getRepository(Product::class)->findAll();
            $this->redirectToRoute('products');
            //dd($products);
        }
        
        // if ($form2->isSubmitted() && $form2->isValid()) {
        //     $products = $this->em->getRepository(Product::class)->findWithSearch($search);
        // } else {
        //     $products = $this->em->getRepository(Product::class)->findAll();
        //     $this->redirectToRoute('products');
        // }
        $search->string = $request->get('q', '');
        // dd($search->string);
        $search->categories = $request->get('categories', []);
        $search->productName = $request->get('productName', '');
        $search->categoryName = $request->get('categoryName', '');
        $products = $this->em->getRepository(Product::class)->findWithSearch($search);
        $search = $request->query->get('search');

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'search' => $search,
            'form' => $form->createView()
        ]);
    }

    #[Route('/produit/{slug}', name: 'product')]
    public function show($slug): Response
    {
        $product = $this->em->getRepository(Product::class)->findOneBySlug($slug);
        $products = $this->em->getRepository(Product::class)->findByIsBest(1);

        if (!$product) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'products' => $products,
        ]);
    }
}
