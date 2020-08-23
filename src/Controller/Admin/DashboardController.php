<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        //$routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        //return $this->redirect($routeBuilder->setController(OneOfYourCrudController::class)->generateUrl());
        // you can also redirect to different pages depending on the current user
        /*
        if ('jane' === $this->getUser()->getUsername()) {
            return $this->redirect('...');
        }
        */

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Time to Buy')
            ->setFaviconPath('images/favicons/favicon.ico')
        ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            //MenuItem::section('Blog'),
            //MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
            //MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

            //MenuItem::section('Users'),
            //MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];
    }
}
