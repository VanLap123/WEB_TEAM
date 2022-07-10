<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function showProductAction(ProductRepository $repo): Response
    {
        $product = $repo->showAllProduct();
        return $this->render('product/index.html.twig',[
            'product'=> $product
        ]);
    }
   /**
   * @Route("/product/add", name="addProduct")
   */
public function addProductAction(ManagerRegistry $res, SluggerInterface $slugger, Request $req, ValidatorInterface $valid): Response
  {
        $product = new Product();
        $productForm =$this->createForm(ProductType::class, $product);

        $productForm->handleRequest($req);
        $entity = $res->getManager();

        if ($productForm->isSubmitted() && $productForm->isValid()) {
            $data = $productForm->getData();
            $product->setProName($data->getProName());
            $product->setPrice($data-> getPrice());
            $product->setOldPrice($data->getOldPrice());
            $product->setProDesc($data-> getProDesc());
            $product->setProQty($data->getProQty());
            
            $imgFile = $productForm->get('Pro_Image')->getData();
            if ($imgFile) {
                $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgFile->guessExtension();
                try {
                    $imgFile->move(
                        $this->getParameter('image_pro'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    echo $e;
                }
                $product->setProImage($newFilename);
      }
      $entity->persist($product);
      $entity->flush();
      return $this->redirectToRoute("app_product");
    }
    return $this->render('product/Add_Pro.html.twig', [
      'form' => $productForm->createView()
    ]);
  }
      
      /**
     * @Route("/delete_pro/{id}", name="deleteProduct")
     */
    public function deleteCategoryFunction(ProductRepository $repo, ManagerRegistry $doc, $id): Response
    {
        $product = $repo->find($id);
 
        if (!$product) {
            throw
            $this->createNotFoundException('Invalid ID ' . $id);
        }
        $entity = $doc->getManager();
        $entity->remove($product);
        $entity->flush();
        return $this->redirectToRoute("app_product");
    }
}

  

