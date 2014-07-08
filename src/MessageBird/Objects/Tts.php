<?php

namespace MessageBird\Objects;

/**
 * Class Tts
 *
 * @package MessageBird\Objects
 */
class Tts extends Base
{
    /**
     * An unique random ID which is created on the MessageBird
     * platform and is returned upon creation of the object.
     *
     * @var string
     */
    protected $id;

    /**
     * The body of the TTS message.
     *
     * @var string
     */
    public $body;

    /**
     * A client reference. Here you can put your own reference,
     * like your internal reference.
     *
     * @var string
     */
    public $reference;

    /**
     * The language in which the message needs to be read to the recipient.
     * Possible values are: nl-nl, de-de, en-gb, en-us, fr-fr
     *
     * @var string
     */
    public $language = 'en-gb';

    /**
     * The voice in which the messages needs to be read to the recipient
     * Possible values are: male, female
     *
     * @var string
     */
    public $voice = 'female';

    /**
     * How many times needs the message to be repeated?
     *
     * @var int
     */
    public $repeat = 1;

    /**
     * What to do when a machine picks up the phone?
     * Possible values are:
     *  - continue: do not check, just play the message
     *  - delay: if a machine answers, wait until the machine stops talking
     *  - hangup: hangup when a machine answers
     *
     * @var string
     */
    public $ifMachine = 'continue';

    /**
     * The scheduled date and time of the message in RFC3339 format (Y-m-d\TH:i:sP)
     *
     * @var string
     */
    public $scheduledDatetime;

    /**
     * The date and time of the creation of the message in RFC3339 format (Y-m-d\TH:i:sP)
     * @var string
     */
    protected $createdDatetime;

    /**
     * An array of recipients
     *
     * @var array
     */
    public $recipients = array ();

    /**
     * Get the created id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $object
     *
     * @return $this|void
     */
    public function loadFromArray ($object)
    {
        parent::loadFromArray($object);

        if (!empty($this->recipients->items)) {
            foreach($this->recipients->items AS &$item) {
                $Recipient = new Recipient();
                $Recipient->loadFromArray($item);

                $item = $Recipient;
            }
        }

        return $this;
    }
}