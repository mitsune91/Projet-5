<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;
use App\Form\CategoryType;

class CategoryController extends AbstractController
{
    /**
     *
     * @Route("/category/admin_category" , name="admin_category")
     */
    public function adminCategory(CategoryRepository $repo)
    {
        $category = $repo->findAll();
        return $this->render('category/adminCategory.html.twig', [
            'categories' => $category
        ]);
    }

    /**
     * @Route("/admin/add_category", name="add_category")
     */
    public function addCategory(Request $request, ObjectManager $manager
    )
    {
        $category = new category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($category);
            $manager->flush();
            return $this->redirectToRoute('admin_category', ['id' => $category->getId()]
            );
        }
        return $this->render('category/createCategory.html.twig', ['formCategory' => $form->createView()]);
    }

}
