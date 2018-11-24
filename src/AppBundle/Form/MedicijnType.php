<?php
/**
 * Created by PhpStorm.
 * User: 302567762
 * Date: 21-11-2018
 * Time: 14:27
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicijnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $medicijn = $options['medicijn'];
       if ($medicijn != null){
               $builder
                   ->add('naam', TextType::class, array(
                       'data' => $medicijn['naam'],
                   ))
                   ->add('werking', TextareaType::class, array(
                       'attr' => array('cols' => '50', 'rows' => '3'),
                       'data' => $medicijn['werking'],

                   ))
                   ->add('bijwerking', TextareaType::class, array(
                       'attr' => array('cols' => '50', 'rows' => '3'),
                       'data' => $medicijn['bijwerking'],
                   ))
                   ->add('id', HiddenType::class, array(
                       'data' => $medicijn['id'],
                   ));
           } else {
           $builder
               ->add('naam', TextType::class)
               ->add('werking', TextareaType::class, array(
                   'attr' => array('cols' => '50', 'rows' => '3'),

               ))
               ->add('bijwerking', TextareaType::class, array(
                   'attr' => array('cols' => '50', 'rows' => '3'),
               ));
       }
       }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Medicijn',
            'medicijn' => null,
         ]);
    }
}