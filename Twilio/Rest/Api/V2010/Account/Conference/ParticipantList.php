<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class ParticipantList extends ListResource {
    /**
     * Construct the ParticipantList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The unique sid that identifies this account
     * @param string $conferenceSid A string that uniquely identifies this
     *                              conference
     * @return \Twilio\Rest\Api\V2010\Account\Conference\ParticipantList 
     */
    public function __construct(Version $version, $accountSid, $conferenceSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'conferenceSid' => $conferenceSid,
        );
        
        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Conferences/' . rawurlencode($conferenceSid) . '/Participants.json';
    }

    /**
     * Create a new ParticipantInstance
     * 
     * @param string $from The from
     * @param string $to The to
     * @param array|Options $options Optional Arguments
     * @return ParticipantInstance Newly created ParticipantInstance
     */
    public function create($from, $to, $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'From' => $from,
            'To' => $to,
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
            'StatusCallbackEvent' => $options['statusCallbackEvent'],
            'Timeout' => $options['timeout'],
            'Record' => Serialize::booleanToString($options['record']),
            'Muted' => Serialize::booleanToString($options['muted']),
            'Beep' => $options['beep'],
            'StartConferenceOnEnter' => Serialize::booleanToString($options['startConferenceOnEnter']),
            'EndConferenceOnExit' => Serialize::booleanToString($options['endConferenceOnExit']),
            'WaitUrl' => $options['waitUrl'],
            'WaitMethod' => $options['waitMethod'],
            'EarlyMedia' => Serialize::booleanToString($options['earlyMedia']),
            'MaxParticipants' => $options['maxParticipants'],
            'ConferenceRecord' => $options['conferenceRecord'],
            'ConferenceTrim' => $options['conferenceTrim'],
            'ConferenceStatusCallback' => $options['conferenceStatusCallback'],
            'ConferenceStatusCallbackMethod' => $options['conferenceStatusCallbackMethod'],
            'ConferenceStatusCallbackEvent' => $options['conferenceStatusCallbackEvent'],
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new ParticipantInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['conferenceSid']
        );
    }

    /**
     * Streams ParticipantInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     * 
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream($options = array(), $limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);
        
        $page = $this->page($options, $limits['pageSize']);
        
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads ParticipantInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return ParticipantInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of ParticipantInstance records from the API.
     * Request is executed immediately
     * 
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of ParticipantInstance
     */
    public function page($options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'Muted' => Serialize::booleanToString($options['muted']),
            'Hold' => Serialize::booleanToString($options['hold']),
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));
        
        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );
        
        return new ParticipantPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a ParticipantContext
     * 
     * @param string $callSid The call_sid
     * @return \Twilio\Rest\Api\V2010\Account\Conference\ParticipantContext 
     */
    public function getContext($callSid) {
        return new ParticipantContext(
            $this->version,
            $this->solution['accountSid'],
            $this->solution['conferenceSid'],
            $callSid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.ParticipantList]';
    }
}