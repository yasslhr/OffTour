<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Form\AvisAddType;
use App\Repository\LieuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class LieuController extends AbstractController
{
    #[Route('/lieu', name: 'app_lieu')]
    public function Lieu(LieuRepository $lieuRepository): Response {

        $lieu = $lieuRepository->findAll();
        return $this->render('lieu/index.html.twig', [
            'lieu' => $lieu,
        ]);
    }

}
