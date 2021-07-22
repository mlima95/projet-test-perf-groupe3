<?php

namespace App\Form;

use App\Entity\CallCenter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CallCenterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ccCallCenterId')
            ->add('ccRecStartDate')
            ->add('ccRecEndDate')
            ->add('ccName')
            ->add('ccClass')
            ->add('ccEmployees')
            ->add('ccSqFt')
            ->add('ccHours')
            ->add('ccManager')
            ->add('ccMktId')
            ->add('ccMktClass')
            ->add('ccMktDesc')
            ->add('ccMarketManager')
            ->add('ccDivision')
            ->add('ccDivisionName')
            ->add('ccCompany')
            ->add('ccCompanyName')
            ->add('ccStreetNumber')
            ->add('ccStreetName')
            ->add('ccStreetType')
            ->add('ccSuiteNumber')
            ->add('ccCity')
            ->add('ccCounty')
            ->add('ccState')
            ->add('ccZip')
            ->add('ccCountry')
            ->add('ccGmtOffset')
            ->add('ccTaxPercentage')
            ->add('ccClosedDateSk')
            ->add('ccOpenDateSk')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CallCenter::class,
        ]);
    }
}
