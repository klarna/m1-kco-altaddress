<?php
/**
 * Copyright 2018 Klarna Bank AB (publ)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @category   Klarna
 * @package    Klarna_KcoAltAddress
 * @author     Fei Chen <fei.chen@klarna.com>
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
        $store     = $object->getStore();
        $attachmentData = $this->_prepareAttachmentData($store);
        if($attachmentData){
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
        $store     = $object->getStore();
        $attachmentData = $this->_prepareAttachmentData($store);
        if($attachmentData){
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
        if($this->_getHelper()->isAltAddressEnabled($store)){
            return array(
                'shipping_method'   => $this->_getHelper()->getShippingMethod($store),
                'shipping_type'     => $this->_getHelper()->getShippingType($store),
                'first_name'        => $this->_getHelper()->getFirstName($store),
                'last_name'         => $this->_getHelper()->getLastName($store),
                'street_address'    => $this->_getHelper()->getStreetAddress($store),
                'street_number'     => $this->_getHelper()->getStreetNumber($store),
                'postal_code'       => $this->_getHelper()->getPostalCode($store),
                'city'              => $this->_getHelper()->getCity($store),
                'country'           => $this->_getHelper()->getCountry($store),
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