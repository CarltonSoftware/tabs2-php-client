# Accessing customer data

This file documents how to request customer data.

```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        $customer = new tabs\apiclient\Customer($id);
        $customer->get();

        echo '<h3>Customer</h3>';
        echo sprintf('<p>%s</p>', htmlspecialchars((string) $customer));
        
        if ($customer->getBankaccounts()->count() > 0) {
            $collection = $customer->getBankaccounts();
            
            include __DIR__ . '/../collection.php';
        }

        echo '<h3>Notes</h3>';
        if ($customer->getNotes()->count() > 0) {
            foreach ($customer->getNotes() as $note) {                
                echo sprintf(
                    '<p>%s</p>',
                    $note->getNote()
                );
            }
        }
        echo sprintf(
            '<p><a href="add-note.php?id=%s">Add new note</a></p>',
            $customer->getId()
        );

        if ($customer->getDocuments()->count() > 0) {
            echo '<h3>Documents</h3>';
            foreach ($customer->getDocuments()->getElements() as $doc) {                
                echo sprintf(
                    '<p><a href="../document/viewing-a-document.php?id=%s">%s</a></p>',
                    $doc->getDocument()->getId(),
                    $doc->getDocument()->getName()
                );
            }
        }
        echo sprintf(
            '<p><a href="add-document.php?id=%s">Add new document</a></p>',
            $customer->getId()
        );

        if ($customer->getContactdetails()->count() > 0) {
            echo '<h3>Contact Details</h3>';
            
            $collection = $customer->getContactdetails();
            
            include __DIR__ . '/../collection.php';
        }
        echo sprintf(
            '<p><a href="add-email.php?id=%s">Add new email</a></p>',
            $customer->getId()
        );
        echo sprintf(
            '<p><a href="add-phonenumber.php?id=%s">Add new phone number</a></p>',
            $customer->getId()
        );

        if ($customer->getPayments()->count() > 0) {
            echo '<h3>Payments</h3>';
            
            $collection = $customer->getPayments();
            
            include __DIR__ . '/../collection.php';
        }
        echo sprintf(
            '<p><a href="add-payment.php?id=%s">Add payment</a></p>',
            $customer->getId()
        );
    
        echo sprintf(
            '<p><a href="adding-a-customer-to-a-mailing-list.php?id=%s">Subscribe to a mailing list</a></p>',
            $customer->getId()
        );

        if ($customer->getMarketingbrands()->count() > 0) {
            echo '<h3>Marketing brands</h3>';
            echo '<ul>';
            foreach ($customer->getMarketingbrands() as $cmb) {
                echo '<li>' . $cmb->getMarketingbrand()->getName() . ' ' . ($cmb->getNocontact() ? ' - No contact' : ' - Contact allowed');
                if ($cmb->getEmaillists()->count() > 0) {
                    echo '<ul>';
                    foreach ($cmb->getEmaillists() as $cmbeml) {
                        echo '<li>' . $cmbeml->getMarketingbrandemaillist()->getListname() . ' ' . ($cmbeml->getUnsubscribed() ? ' - Unsubscribed' : ' - Subscribed') . '</li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            echo '</ul>';
        }
        
        echo sprintf(
            '<p><a href="add-enquiry.php?id=%s">Add enquiry</a></p>',
            $customer->getId()
        );

        $collection = $customer->getEnquiries();
        include __DIR__ . '/../collection.php';

        $bookings = $customer->getBookings();
        if ($bookings->getTotal() > 0) {
            ?>
            <h3>Bookings</h3>
            <table>
                <tr>
                    <th>Ref</th>
                    <th>Status</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
                <?php
                    foreach ($bookings as $booking) {
                        echo sprintf(
                            '<tr><td><a href="../booking/index.php?id=%u">%s</a></td>' .
                            '<td>%s</td><td>%s</td><td>%s</td></tr>',
                            $booking->getId(),
                            $booking->getBookref(),
                            $booking->getStatus(),
                            $booking->getFromdate()->format('Y-m-d'),
                            $booking->getTodate()->format('Y-m-d')
                        );
                    }
                ?>
            </table>
            <?php
        }

    } else {
        // Create a customer collection
        $collection = tabs\apiclient\Collection::factory(
            'customer',
            new \tabs\apiclient\Customer
        );
        
        // Filter for customers with the name of 'Smith'
        $collection->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'))
            ->addFilter('inactive', false)
            ->addFilter('surname', 'Smith')
            ->fetch();
        
        // Output
        include __DIR__ . '/../collection.php';
    }

} catch(Exception $e) {
    echo $e->getMessage();
}


```

* [Creating a new customer](creating-a-customer.html)
* [Adding documents to actors](add-document.html)
* [Adding an email address](add-email.html)
* [Adding a phone number](add-phonenumber.html)
* [Requesting a Brochure](requesting-a-brochure.html)
* [Authenticating an Actor](authenticating-an-actor.html)
* [Subscribing to a mailing list](adding-a-customer-to-a-mailing-list.html)