<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use App\Form\PersonFormType;
use App\Repository\PersonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Attribute\IsCsrfTokenValid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PersonController extends AbstractController
{
    public function __construct(
        private readonly PersonRepository $personRepository
    ) {
    }

    #[Route('/', name: 'home', methods: ['GET'])]
    #[Route('/people', name: 'app_person_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('app/person/index.html.twig', [
            'people' => $this->personRepository->findPeople(),
        ]);
    }

    #[Route('/person/new', name: 'app_person_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $person = new Person();

        $form = $this->createForm(PersonFormType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->personRepository->add($person, true);

            $this->addFlash('success', 'person.created_successfully');

            return $this->redirectToRoute('app_person_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('app/person/new.html.twig', [
            'person' => $person,
            'form' => $form,
        ]);
    }

    #[Route('/person/{id}', name: 'app_person_show', methods: ['GET'])]
    public function show(Person $person): Response
    {
        return $this->render('app/person/show.html.twig', [
            'person' => $person,
        ]);
    }

    #[Route('/person/{id}/edit', name: 'app_person_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Person $person): Response
    {
        $form = $this->createForm(PersonFormType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->personRepository->add($person, true);

            $this->addFlash('success', 'person.updated_successfully');

            return $this->redirectToRoute('app_person_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('app/person/edit.html.twig', [
            'person' => $person,
            'form' => $form,
        ]);
    }

    #[Route('/person/{id}', name: 'app_person_delete', methods: ['POST'])]
    public function delete(Request $request, Person $person): Response
    {
        if ($this->isCsrfTokenValid('delete'.$person->getId(), $request->request->get('_token'))) {
            $this->personRepository->remove($person, true);

            $this->addFlash('success', 'person.deleted_successfully');
            
            return $this->redirectToRoute('app_person_index', [], Response::HTTP_SEE_OTHER);
        }
        
        $this->addFlash('danger', 'person.deleted_error');
        
        return $this->redirectToRoute('app_person_show', ['id' => $person->getId()], Response::HTTP_SEE_OTHER);
    }
}
