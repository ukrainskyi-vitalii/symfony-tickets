<?php

namespace App\Controller\Admin;

use App\Entity\RouteStation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ScheduleRouteStationCrudController extends RouteStationCrudController
{
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('route')
                ->setTemplatePath('admin/controllers/scheduleRouteStation/fields/custom_association_field.html.twig')
                ->setRequired(true),
        ];
    }
}
