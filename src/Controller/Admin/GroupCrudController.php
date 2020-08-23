<?php

namespace App\Controller\Admin;

use App\Entity\Group;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class GroupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Group::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            UrlField::new('api_url'),
        ];
    }

    public function delete(AdminContext $context)
    {
        $entityInstance = $context->getEntity()->getInstance();

        if ($entityInstance instanceof Group) {
            if ($entityInstance->getUsers()->count() > 0) {
                $this->addFlash('error', 'You cannot delete group with users.');

                $crudUrlGenerator = $this->get(CrudUrlGenerator::class);

                return $this->redirect($crudUrlGenerator->build()
                    ->setController(GroupCrudController::class)
                    ->setAction('index')
                    ->generateUrl());
            }
        }

        return parent::delete($context);
    }
}
