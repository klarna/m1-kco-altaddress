<?php
/**
 * This file is part of the Klarna KCO AltAddress module
 *
 * (c) Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */


class Klarna_KcoAltAddress_Model_Checkout_Attachment_OtherShippingAddress extends Klarna_Kco_Model_Checkout_Attachment_Abstract
{

    /**
     * @param Klarna_Kco_Model_Api_Builder_Abstract $checkout
     *
     * @return $this
     */
    public function collect($checkout)
    {
        $object = $checkout->getObject();
        $store = $object->getStore();
        $attachmentData = $this->_prepareAttachmentData($store);
        if ($attachmentData) {
            $checkout->addAttachmentData(
                array(
                    'other_delivery_address' => $attachmentData,
                )
            );
        }
        return $this;
    }


    /**
     * @param Klarna_Kco_Model_Api_Builder_Abstract $checkout
     *
     * @return $this
     */
    public function fetch($checkout)
    {
        $object = $checkout->getObject();
        $store = $object->getStore();
        $attachmentData = $this->_prepareAttachmentData($store);
        if ($attachmentData) {
            $checkout->addAttachmentData(
                array(
                    'other_delivery_address' => $attachmentData,
                )
            );
        }
        return $this;
    }

    /**
     * @param $store
     *
     * @return array|bool
     */
    protected function _prepareAttachmentData($store)
    {
        if ($this->_getHelper()->isAltAddressEnabled($store)) {
            return array(
                'shipping_method' => $this->_getHelper()->getShippingMethod($store),
                'shipping_type' => $this->_getHelper()->getShippingType($store),
                'first_name' => $this->_getHelper()->getFirstName($store),
                'last_name' => $this->_getHelper()->getLastName($store),
                'street_address' => $this->_getHelper()->getStreetAddress($store),
                'street_number' => $this->_getHelper()->getStreetNumber($store),
                'postal_code' => $this->_getHelper()->getPostalCode($store),
                'city' => $this->_getHelper()->getCity($store),
                'country' => $this->_getHelper()->getCountry($store),
            );
        }
        return false;
    }

    /**
     * @return Mage_Core_Helper_Abstract
     */
    protected function _getHelper()
    {
        return Mage::helper('klarna_altaddress');
    }
}