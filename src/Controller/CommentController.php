<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommentRepository;

class CommentController extends AbstractController
{
    /**
     * @Route("/admin/adminComment",name="admin_comment")
     */
    public function adminComment( CommentRepository $repo)
    {
        $comment = $repo->findAll();
        return $this->render('comment/adminComment.html.twig', [
            'comments' => $comment
        ]);
    }
}
