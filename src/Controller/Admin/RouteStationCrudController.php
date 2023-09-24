<?php

namespace App\Controller\Admin;

use App\Entity\RouteStation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RouteStationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RouteStation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('route')->setRequired(true),
            AssociationField::new('station')->setRequired(true),
            IntegerField::new('routeOrder')->setRequired(true),
        ];
    }
}
