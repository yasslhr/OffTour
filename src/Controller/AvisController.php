<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisAddType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(AvisRepository $avisRepository): Response
    {
        $avis = $avisRepository->findAll();
        return $this->render('avis/index.html.twig', [
            'avis' => $avis,
        ]);
    }

    #[Route('/ajouter', name: 'add_avis')]
    #[Security('is_granted("ROLE_USER")')]
    public function ajouter(Request $request, EntityManagerInterface $em): Response
    {
        $addAvis = new Avis();
        $AvisForm = $this->createForm(AvisAddType::class, $addAvis);

        $AvisForm->handleRequest($request);

        if ($AvisForm->isSubmitted() && $AvisForm->isValid()) {
            $em->persist($addAvis);
            $em->flush();

            $this->addFlash('success', 'Votre avis a bien été ajouté');
            $this->addFlash('debug', 'La condition pour la redirection a été satisfaite');

            return $this->redirectToRoute('app_lieu');
        } else {
            $this->addFlash('debug', 'La condition pour la redirection n\'a pas été satisfaite');
        }

        return $this->render('avis/ajouter.html.twig', [
            'AvisForm' => $AvisForm->createView(),
        ]);
    }
}
