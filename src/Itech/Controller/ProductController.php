<?php

namespace Itech\Controller;

use Itech\Model\Product;
use Itech\Repository\ProductManager;
use Itech\Repository\DBA;
use Simplex\Service\Hydrator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Simplex\Templating;
use Simplex\Service\Form;

class ProductController
{
    /**
     * @var ProductManager
     */
    private ProductManager $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager((new DBA())->getPDO());
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $products = $this->productManager->getProducts();
        //dd($products);
        $templating = new Templating();

        return new Response(
            $templating->render('Itech::index.php', ['products' => $products]),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    public function add(Request $request): Response
    {
        if ($request->getMethod() === Request::METHOD_POST) {

            /** @var Product $user */
            $product = Form::handleSubmit($request);
            $product->setCreated_by($_SESSION['security']['user']['id']);
            $this->productManager->addProduct($product);
        }
        $templating = new Templating();
        $productsById = $this->productManager->findProductsByAuthor($_SESSION['security']['user']['id']);
        return new Response(
            $templating->render('Itech::products.php', ['products' => $productsById]),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    public function delete(Request $request): Response
    {
        if ($request->getMethod() === Request::METHOD_POST) {

            /** @var Product $user */
            $product = Form::handleSubmit($request);
            
            $this->productManager->delete($product->getId());
        }
        $templating = new Templating();
        $productsById = $this->productManager->findProductsByAuthor($_SESSION['security']['user']['id']);
        return new Response(
            $templating->render('Itech::products.php', ['products' => $productsById]),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    public function update(Request $request): Response
    {
        $productData = [];
        if ($request->getMethod() === Request::METHOD_POST) {
            //dd($_POST);
            /** @var Product $user */
            $productid = $_POST['Itech']['Product']['id'];
            $productData = $this->productManager->findProductById($productid);
            //dd($productData);
            //$this->productManager->delete($product);
        }
        $templating = new Templating();
        
        return new Response(
            $templating->render('Itech::update.php', ['product' => $productData]),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    public function update_product(Request $request): Response
    {
        
        if ($request->getMethod() === Request::METHOD_POST) {
            $product = Form::handleSubmit($request);
            
            $this->productManager->updateProduct($product);
        }
        $templating = new Templating();
        $productsById = $this->productManager->findProductsByAuthor($_SESSION['security']['user']['id']);
        return new Response(
            $templating->render('Itech::products.php', ['products' => $productsById]),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    public function products(Request $request): Response
    {
        
        $templating = new Templating();
        $productsById = $this->productManager->findProductsByAuthor($_SESSION['security']['user']['id']);
        return new Response(
            $templating->render('Itech::products.php', ['products' => $productsById]),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }
}