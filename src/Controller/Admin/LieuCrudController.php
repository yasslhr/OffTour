<?php

namespace App\Controller\Admin;

use App\Entity\Lieu;
use App\Entity\Ville;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LieuCrudController extends AbstractCrudController
{
    public const LIEU_BASE_PATH = 'uploads/images/lieu/';
    public const LIEU_UPLOAD_DIR = 'public/uploads/images/lieu/';
    public static function getEntityFqcn(): string
    {
        return Lieu::class;

    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            ImageField::new('image')
                ->setBasePath(self::LIEU_BASE_PATH)
                ->setUploadDir(self::LIEU_UPLOAD_DIR),
            DateField::new('date'),
            TextField::new('localisation'),
            TextField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR')
                ->setNumDecimals( 2 )
                ->setStoredAsCents(false),
            AssociationField::new('Ville'),
            ];
    }

    private function getDoctrine()
    {
    }

}
