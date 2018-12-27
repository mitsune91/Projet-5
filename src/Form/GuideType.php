<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Guide;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Author')
            ->add('Title')
            ->add('Content', CKEditorType::class)
            ->add('Image',FileType::class,array( 'data_class' => null))
            ->add('category', EntityType::class,['class'=>Category::class,'choice_label'=>'title'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Guide::class,
        ]);
    }
}
