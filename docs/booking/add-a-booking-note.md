# Adding a booking note

This file documents how to add a note to a booking.

```php

try {
    if (filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));

        // Get the clients tabs user
        $me = tabs\apiclient\client\Client::getClient()->whoami();
        $note = new \tabs\apiclient\Note();

        // Get a note type
        $noteTypes = tabs\apiclient\Collection::factory(
            'notetype',
            new \tabs\apiclient\Notetype()
        );
        $noteTypes->fetch();

        // Populate the note
        $note->setSubject('Adipiscing rhubarb')
            ->setCreatedby($me)
            ->setNotetype($noteTypes->first())
            ->addNotetext('Lorem ipsum dolor sit amet');

        $note->create();

        $b->addNote($note);

        header('Location: index.php?id=' . $b->getId());
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
