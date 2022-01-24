<?php

namespace App\Controller;

use App\Repository\LibraryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private LibraryRepository $libraryRepository;

    public function __construct(LibraryRepository $libraryRepository) {
        $this->libraryRepository = $libraryRepository;
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $librairies = $this->libraryRepository->findAll();

        return $this->render('default/index.html.twig', [
            'libraries' => $librairies,
        ]);
    }
}
