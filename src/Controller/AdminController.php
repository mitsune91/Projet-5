<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Form\CategoryType;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Guide;
use App\Repository\GuideRepository;
use App\Form\GuideType;



class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(CategoryRepository $categoryRepository,UserRepository $userRepository,GuideRepository $guideRepository, CommentRepository $commentRepository)
    {
        $category = $categoryRepository->findAll();
        $comment = $commentRepository->findAll();
        $user = $userRepository->findAll();
        $guide = $guideRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'categories'=> $category,
            'guides'=>$guide,
            'users' =>$user,
            'comments' => $comment
        ]);
    }

}
