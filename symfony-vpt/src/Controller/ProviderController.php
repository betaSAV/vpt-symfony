<?php
namespace App\Controller;

use App\Entity\Proveedor;
use App\Form\ProveedorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProviderController extends AbstractController
{
    /**
     * @Route("/", name="proveedor_index")
     */
    public function index(): Response
    {
        $proveedores = $this->getDoctrine()
            ->getRepository(Proveedor::class)
            ->findAll();

        return $this->render('proveedor/index.html.twig', [
            'proveedores' => $proveedores,
        ]);
    }

    /**
     * @Route("/proveedor/new", name="proveedor_new")
     */
    public function new(Request $request): Response
    {
        $proveedor = new Proveedor();
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($proveedor);
            $entityManager->flush();

            return $this->redirectToRoute('proveedor_index');
        }

        return $this->render('proveedor/new.html.twig', [
            'proveedor' => $proveedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/proveedor/edit/{id}", name="proveedor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $proveedor = $entityManager->getRepository(Proveedor::class)->find($id);

        if (!$proveedor) {
            throw $this->createNotFoundException(
                'No se encontró el proveedor con id ' . $id
            );
        }
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proveedor_index');
        }

        return $this->render('proveedor/edit.html.twig', [
            'proveedor' => $proveedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/proveedor/delete/{id}", name="proveedor_delete", methods={"DELETE"})
     */
    public function delete(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $proveedor = $entityManager->getRepository(Proveedor::class)->find($id);

        if (!$proveedor) {
            throw $this->createNotFoundException(
                'No se encontró el proveedor con id ' . $id
            );
        }

        if ($this->isCsrfTokenValid('delete' . $proveedor->getId(), $request->request->get('_token'))) {
            $entityManager->remove($proveedor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proveedor_index');
    }
}