<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class CustomerTest extends ApiClientClassTest
{

    /**
     * Test creating a new customer
     *
     * @return null
     */
    public function testNewCustomer()
    {
        $customer = \tabs\core\Customer::factory('Mr', 'Wyett');
        $this->assertEquals('Mr', $customer->getLegalentity()->getTitle());
        $this->assertEquals('Wyett', $customer->getLegalentity()->getSurname());
    }

    /**
     * Test get customer
     *
     * @return null
     */
    public function testGetCustomer()
    {
        $customerNode = array(
           'type' => 'Person',
           'language' => 'English',
           'inactive' => false,
           'companyname' => '',
           'actors' => array(
               array(
                   'type' => 'Customer',
                   'tabscode' => 'CUS1234',
               ),
               array(
                   'type' => 'Owner',
                   'tabscode' => 'GTHU78',
               ),
               array(
                   'type' => 'Cleaner',
                   'tabscode' => 'GTHU78',
               ),
               array(
                   'type' => 'Keyholder',
                   'tabscode' => 'GTHU78',
               ),
               array(
                   'type' => 'Supplier',
                   'tabscode' => 'GTHU78',
               ),
               array(
                   'type' => 'TabsUser',
                   'tabscode' => 'GTHU78',
               ),
               array(
                   'type' => 'OwnerEnquirer',
                   'tabscode' => 'GTHU78',
               ),
           ),
           'name' =>
                array(
                   'firstname' => 'Thomas',
                   'surname' => 'Thornley',
                   'title' => 'Mr',
                   'salutation' => 'Tom',
                ),
           'contacts' =>
                array(
                    array(
                       'type' => 'C',
                       'contactmethod' => 'Phone',
                       'subtype' => 'home',
                       'value' => '01603 888999',
                       'comment' => '',
                       'invalid' => false,
                    ),
                    array(
                       'type' => 'C',
                       'contactmethod' => 'Email',
                       'subtype' => '',
                       'value' => 'tom@thornley.com',
                       'comment' => '',
                       'invalid' => false,
                       'contactpreferences' =>
                            array(
                                array(
                                    'role' => 'Customer',
                                    'reason' => 'Booking Confirmation'
                                )
                            )
                    ),
                    array(
                       'type' => 'P',
                       'addr1' => '55 Banana Street',
                       'addr2' => '',
                       'addr3' => '',
                       'town' => 'Fictional Town',
                       'county' => 'Norfolk',
                       'postcode' => 'NR22 2JG',
                       'country' => 'United Kingdom',
                       'latitude' => 52.617954,
                       'longitude' => 1.652729,
                       'invalid' => false,
                       'contactpreferences' =>
                            array(
                                array(
                                    'role' => 'Customer',
                                    'reason' => 'Booking Confirmation'
                                )
                            )
                    ),
            ),
            'bankaccounts' => array(
                array(
                    'accountnumber' => '12345678',
                    'accountname' => 'Mr Smith',
                    'bankname' => 'Barclays',
                    'addr1' => '10 High St',
                    'addr2' => '',
                    'town' => 'Dereham',
                    'county' => 'Norfolk',
                    'postcode' => 'NR20 5SD',
                    'sortcode' => '221349',
                    'paymentreference' => 'PR20193',
                    'rollnumber' => '2',
                ),
            ),
        );
        $customer = \tabs\core\Customer::createCustomerFromNode($customerNode);

        $this->assertEquals('Thornley', $customer->getLegalentity()->getSurname());
        $this->assertEquals('01603 888999', $customer->getLegalentity()->getContactentities()[0]->getValue());
    }

}
