<?php

namespace App\Controller;

use App\Repository\CarCategoryRepository;
use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CarRepository $carRepository, CarCategoryRepository $carCategoryRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $cars = $carRepository->findAll();
        $categories = $carCategoryRepository->findAll();
        $paginationCars = $paginator->paginate($cars, $request->query->getInt('page', 1), 20);
        return $this->render('home/index.html.twig', [
            'cars' => $paginationCars,
            'categories' => $categories,
        ]);
    }

    #[Route('/car', methods: ['GET'], name: 'car')]
    public function searchCar(Request $request, CarCategoryRepository $carCategoryRepository, CarRepository $carRepository, PaginatorInterface $paginator): Response
    {
        $search = $request->query->get('name');
        $cars = $carRepository->searchByName($search);
        $categories = $carCategoryRepository->findAll();
        $paginationCars = $paginator->paginate($cars, $request->query->getInt('page', 1), 20);
        return $this->render('home/index.html.twig', [
            'cars' => $paginationCars,
            'categories' => $categories,
        ]);
    }

    #[Route('/car_category', methods: ['GET'], name: 'car_category')]
    public function filteredCategory(Request $request, CarCategoryRepository $carCategoryRepository, CarRepository $carRepository, PaginatorInterface $paginator): Response
    {
        $search = $request->query->get('name');
        $category = $carCategoryRepository->findBy(['name' => $search]);
        $cars = $carRepository->findBy(['carCategory' => $category]);
        $categories = $carCategoryRepository->findAll();
        $paginationCars = $paginator->paginate($cars, $request->query->getInt('page', 1), 20);
        return $this->render('home/index.html.twig', [
            'cars' => $paginationCars,
            'categories' => $categories,
        ]);
    }

    #[Route('/car/{id}', methods: ['GET'], name: 'car_show')]
    public function showCar(CarRepository $carRepository, $id): Response
    {
        $car = $carRepository->find($id);
        return $this->render('home/show.html.twig', [
            'car' => $car,
        ]);
    }
}
