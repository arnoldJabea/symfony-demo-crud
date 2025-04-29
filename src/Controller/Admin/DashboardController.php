<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator
            ->setController(UtilisateurCrudController::class)
            ->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Blog Arnold, Behnood, Maria');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home'),
            MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', Utilisateur::class),
            MenuItem::linkToCrud('Posts', 'fas fa-file-alt', Post::class),
        ];
       
    }
}
