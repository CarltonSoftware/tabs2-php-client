# Requesting a brochure

This example demonstrates how to request a new brochure.


```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        // Create a mock customer object.  We're assuming here that this
        // is a true customer record.  You will need to create a customer
        // if not.
        $customer = new \tabs\apiclient\Customer($id);

        // We need to specify a brochure to get so we'll just get the first one 
        // as an example
        $brochures = \tabs\apiclient\Collection::factory(
            'brochure',
            new \tabs\apiclient\Brochure()
        );
        
        $brochure = $brochures->fetch()->first();

        // Now we have the brochure we'll need to to the brochure request
        $br = new brochure\BrochureRequest();
        $br->setCustomer($customer)
        
            // Notify that the customer wants to subscribe to a newsletter or not
            ->setEmailOptin(false)

            // We set the brochure by setting the parent object 
            // to be brochure
            ->setParent($brochure)

            // Optionally we can set the source marketing brand
            // ->setSourceMarketingBrand($smb)
            ;

        // Create the brochure request
        $br->create();
        
        header('Location: index.php?id=' . $customer->getId());
        exit();
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}

```