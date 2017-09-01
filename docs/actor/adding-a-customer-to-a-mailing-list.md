# Adding a customer to a mailing list

This file documents how to add (or remove by changing the unsubscribed boolean) a customer to a mailing list.

```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $customer = new tabs\apiclient\Customer($id);

        // You'll need a marketing brand as mailing lists are marketing brand based.
        // In this example we'll use the first one.
        $mbs = tabs\apiclient\Collection::factory(
            'marketingbrand',
            new tabs\apiclient\MarketingBrand
        );
        $mb = $mbs->fetch()->first();

        // Get all of the mailing lists for the marketing brand
        $mailinglists = tabs\apiclient\Collection::factory(
            'emaillist',
            new tabs\apiclient\marketingbrand\EmailList(),
            $mb
        )->fetch();

        // Add a mailing list in if there isnt one
        if ($mailinglists->count() === 0) {
            $list = new \tabs\apiclient\marketingbrand\EmailList();
            $list->setListname('Mailing list')
                ->setParent($mb)
                ->create();
        } else {
            // Otherwise, get the first (as an example)
            $list = $mailinglists->first();
        }

        $customer->subscribeToMailingList($list);
        
        header('Location: index.php?id=' . $customer->getId());
        exit();
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}

```