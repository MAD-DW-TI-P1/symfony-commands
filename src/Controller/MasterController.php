<?php

namespace App\Controller;

use App\Entity\Master;
use App\Form\MasterType;
use App\Repository\MasterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/master')]
class MasterController extends AbstractController
{
    #[Route('/', name: 'app_master_index', methods: ['GET'])]
    public function index(MasterRepository $masterRepository): Response
    {
        return $this->render('master/index.html.twig', [
            'masters' => $masterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_master_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MasterRepository $masterRepository): Response
    {
        $master = new Master();
        $form = $this->createForm(MasterType::class, $master);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $masterRepository->save($master, true);

            return $this->redirectToRoute('app_master_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('master/new.html.twig', [
            'master' => $master,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_master_show', methods: ['GET'])]
    public function show(Master $master): Response
    {
        return $this->render('master/show.html.twig', [
            'master' => $master,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_master_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Master $master, MasterRepository $masterRepository): Response
    {
        $form = $this->createForm(MasterType::class, $master);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $masterRepository->save($master, true);

            return $this->redirectToRoute('app_master_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('master/edit.html.twig', [
            'master' => $master,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_master_delete', methods: ['POST'])]
    public function delete(Request $request, Master $master, MasterRepository $masterRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$master->getId(), $request->request->get('_token'))) {
            $masterRepository->remove($master, true);
        }

        return $this->redirectToRoute('app_master_index', [], Response::HTTP_SEE_OTHER);
    }
}
