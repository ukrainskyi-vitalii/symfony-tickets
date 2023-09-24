<?php

namespace App\Controller\Admin;

use App\Entity\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RouteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Route::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
