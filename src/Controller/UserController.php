<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/adminUser.html.twig",name="admin_user")
     */
    public function adminUser(UserRepository $repo)
    {
        $users = $repo->findAll();
        return $this->render('user/adminUser.html.twig', [
            'users' => $users
        ]);
    }
}
