# Getting specific data about a special offer

In this example, we will view more specific data related to a special offer.

```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $offer = new \tabs\apiclient\SpecialOffer($id);
        $offer->get();

        echo '<p>' . $offer->getType() . '</p>';
        echo '<p>Active: ' . ($offer->getActive() ? 'yes' : 'no') . '</p>';
        echo '<p>Archived: ' . ($offer->getArchived() ? 'yes' : 'no') . '</p>';
        echo '<p>Advertise: ' . ($offer->getAdvertise() ? 'yes' : 'no') . '</p>';
        echo '<p>Description: ' . $offer->getDescription() . '</p>';
        echo '<p>Office description: ' . $offer->getOfficedescription() . '</p>';
        echo '<p>Minimum holiday length: ' . $offer->getMinimumholidaylength() . '</p>';
        echo '<p>Maximum holiday length: ' . $offer->getMaximumholidaylength() . '</p>';
        echo '<p>Minimum occupancy: ' . $offer->getMinimumoccupancy() . '</p>';
        echo '<p>Maximum occupancy: ' . $offer->getMaximumoccupancy() . '</p>';
        echo '<p>Minimum days before: ' . $offer->getMinimumdaysbeforeholiday() . '</p>';
        echo '<p>Maximum days before: ' . $offer->getMaximumdaysbeforeholiday() . '</p>';
        
        if ($offer->getBookingperiods()->count() > 0) {
            $offer->getBookingperiods()->sort(function($a, $b) {
                return $b->getFromdate() > $a->getFromdate();
            });

            echo '<p>This has booking periods from ' . $offer->getBookingperiods()->first()->getFromdate()->format('Y-m-d');
            echo ' to ' . $offer->getBookingperiods()->first()->getTodate()->format('Y-m-d') . '</p>';
        }
        
        if ($offer->getHolidayperiods()->count() > 0) {
            $offer->getHolidayperiods()->sort(function($a, $b) {
                return $b->getFromdate() > $a->getFromdate();
            });

            echo '<p>This has holiday periods from ' . $offer->getHolidayperiods()->first()->getFromdate()->format('Y-m-d');
            echo ' to ' . $offer->getHolidayperiods()->first()->getTodate()->format('Y-m-d') . '</p>';
        }

        if ($offer->getBrandings()->count() > 0) {
            echo '<h4>This offer applies to the following brandings:</h4>';
            foreach ($offer->getBrandings() as $sb) {
                echo '<p>' . $sb->getBranding()->getName() . ': Active - ' . $sb->boolToStr($sb->getActive()) . '</p>';
            }
        }

        if ($offer->getPropertybrandings()->count() > 0) {
            echo '<h4>This offer applies to the following property brandings:</h4>';
            foreach ($offer->getPropertybrandings() as $spb) {
                echo '<p>' . $spb->getPropertybranding()->getParent()->getName() . ': ' . (string) $spb->getPropertybranding()->getBranding()->getName() . '</p>';
            }
        }

        if ($offer->getSaleschannels()->count() > 0) {
            echo '<h4>This offer applies to the following sales channels:</h4>';
            foreach ($offer->getSaleschannels() as $sc) {
                echo '<p>' . $sc->getSaleschannel()->getSaleschannel() . '</p>';
            }
        }

        if ($offer->getPromotions()->count() > 0) {
            echo '<h4>This offer applies to the promotions:</h4>';
            foreach ($offer->getPromotions() as $p) {
                echo '<p>' . $p->getPromotioncode() . '</p>';
            }
        }

        if ($offer->getAttributes()->count() > 0) {
            echo '<h4>This offer applies to the promotions:</h4>';
            foreach ($offer->getAttributes() as $a) {
                echo '<p>' . $a->getAttribute()->getDescription() . ' with value of ' . $a->getValue()->toString() . '</p>';
            }
        }
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}

```
