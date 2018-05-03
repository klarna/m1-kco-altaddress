<?php
/**
 * This file is part of the Klarna KCO AltAddress module
 *
 * (c) Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

/**
 * other shipping address type option
 */
class Klarna_KcoAltAddress_Model_System_Config_Source_Shipping_Type
{
    /**
     * Get other shipping address type option
     *
     * @return array
     */
    public function toOptionArray()
    {
        $helper   = Mage::helper('klarna_kco');
        $options  = array(
            array(
                'label' => $helper->__('normal'),
                'value' => 'normal'
            ),
            array(
                'label' => $helper->__('express'),
                'value' => 'express'
            )
        );
        return $options;
    }
}
