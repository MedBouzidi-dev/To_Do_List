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
#[Route('/taches/ajouter', name: 'app_ajout_tache')]
public function nouveau(EntityManagerInterface $em): Response
{
    $tache = new Tache();
    $tache->setTitre('Mon premier tache');
    $tache->setDescription('Ceci est le contenu de mon premier article créé avec Doctrine.');
    $tache->setDeteCreation(new \DateTime());

    $em->persist($tache);
    $em->flush();

    return new Response("tache créé avec l'id : " . $tache->getId());
}
#[Route('/taches', name: 'app_taches')]
public function index(TacheRepository $tacheRepository): Response
{
    $taches = $tacheRepository->findAll();

    return $this->render('tache/index.html.twig', [
        'taches' => $taches,
    ]);
}

}
