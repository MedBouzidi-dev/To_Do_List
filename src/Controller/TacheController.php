<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Tache;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TacheRepository;

final class TacheController extends AbstractController
{
#[Route('/taches', name: 'app_taches')]
public function index(TacheRepository $tacheRepository): Response
{
    $taches = $tacheRepository->findAll();

    return $this->render('tache/index.html.twig', [
        'taches' => $taches,
    ]);
}

}
