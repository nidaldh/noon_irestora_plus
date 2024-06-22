<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\Options;
use Twilio\Values;

abstract class ParticipantOptions {
    /**
     * @param boolean $muted Indicates if the participant should be muted
     * @param boolean $hold The hold
     * @param string $holdUrl The hold_url
     * @param string $holdMethod The hold_method
     * @return UpdateParticipantOptions Options builder
     */
    public static function update($muted = Values::NONE, $hold = Values::NONE, $holdUrl = Values::NONE, $holdMethod = Values::NONE) {
        return new UpdateParticipantOptions($muted, $hold, $holdUrl, $holdMethod);
    }

    /**
     * @param string $statusCallback The status_callback
     * @param string $statusCallbackMethod The status_callback_method
     * @param string $statusCallbackEvent The status_callback_event
     * @param integer $timeout The timeout
     * @param boolean $record The record
     * @param boolean $muted The muted
     * @param string $beep The beep
     * @param boolean $startConferenceOnEnter The start_conference_on_enter
     * @param boolean $endConferenceOnExit The end_conference_on_exit
     * @param string $waitUrl The wait_url
     * @param string $waitMethod The wait_method
     * @param boolean $earlyMedia The early_media
     * @param integer $maxParticipants The max_participants
     * @param string $conferenceRecord The conference_record
     * @param string $conferenceTrim The conference_trim
     * @param string $conferenceStatusCallback The conference_status_callback
     * @param string $conferenceStatusCallbackMethod The
     *                                               conference_status_callback_method
     * @param string $conferenceStatusCallbackEvent The
     *                                              conference_status_callback_event
     * @return CreateParticipantOptions Options builder
     */
    public static function create($statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE) {
        return new CreateParticipantOptions($statusCallback, $statusCallbackMethod, $statusCallbackEvent, $timeout, $record, $muted, $beep, $startConferenceOnEnter, $endConferenceOnExit, $waitUrl, $waitMethod, $earlyMedia, $maxParticipants, $conferenceRecord, $conferenceTrim, $conferenceStatusCallback, $conferenceStatusCallbackMethod, $conferenceStatusCallbackEvent);
    }

    /**
     * @param boolean $muted Filter by muted participants
     * @param boolean $hold The hold
     * @return ReadParticipantOptions Options builder
     */
    public static function read($muted = Values::NONE, $hold = Values::NONE) {
        return new ReadParticipantOptions($muted, $hold);
    }
}

class UpdateParticipantOptions extends Options {
    /**
     * @param boolean $muted Indicates if the participant should be muted
     * @param boolean $hold The hold
     * @param string $holdUrl The hold_url
     * @param string $holdMethod The hold_method
     */
    public function __construct($muted = Values::NONE, $hold = Values::NONE, $holdUrl = Values::NONE, $holdMethod = Values::NONE) {
        $this->options['muted'] = $muted;
        $this->options['hold'] = $hold;
        $this->options['holdUrl'] = $holdUrl;
        $this->options['holdMethod'] = $holdMethod;
    }

    /**
     * Indicates if the participant should be muted
     * 
     * @param boolean $muted Indicates if the participant should be muted
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * The hold
     * 
     * @param boolean $hold The hold
     * @return $this Fluent Builder
     */
    public function setHold($hold) {
        $this->options['hold'] = $hold;
        return $this;
    }

    /**
     * The hold_url
     * 
     * @param string $holdUrl The hold_url
     * @return $this Fluent Builder
     */
    public function setHoldUrl($holdUrl) {
        $this->options['holdUrl'] = $holdUrl;
        return $this;
    }

    /**
     * The hold_method
     * 
     * @param string $holdMethod The hold_method
     * @return $this Fluent Builder
     */
    public function setHoldMethod($holdMethod) {
        $this->options['holdMethod'] = $holdMethod;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateParticipantOptions ' . implode(' ', $options) . ']';
    }
}

class CreateParticipantOptions extends Options {
    /**
     * @param string $statusCallback The status_callback
     * @param string $statusCallbackMethod The status_callback_method
     * @param string $statusCallbackEvent The status_callback_event
     * @param integer $timeout The timeout
     * @param boolean $record The record
     * @param boolean $muted The muted
     * @param string $beep The beep
     * @param boolean $startConferenceOnEnter The start_conference_on_enter
     * @param boolean $endConferenceOnExit The end_conference_on_exit
     * @param string $waitUrl The wait_url
     * @param string $waitMethod The wait_method
     * @param boolean $earlyMedia The early_media
     * @param integer $maxParticipants The max_participants
     * @param string $conferenceRecord The conference_record
     * @param string $conferenceTrim The conference_trim
     * @param string $conferenceStatusCallback The conference_status_callback
     * @param string $conferenceStatusCallbackMethod The
     *                                               conference_status_callback_method
     * @param string $conferenceStatusCallbackEvent The
     *                                              conference_status_callback_event
     */
    public function __construct($statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE) {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        $this->options['timeout'] = $timeout;
        $this->options['record'] = $record;
        $this->options['muted'] = $muted;
        $this->options['beep'] = $beep;
        $this->options['startConferenceOnEnter'] = $startConferenceOnEnter;
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        $this->options['waitUrl'] = $waitUrl;
        $this->options['waitMethod'] = $waitMethod;
        $this->options['earlyMedia'] = $earlyMedia;
        $this->options['maxParticipants'] = $maxParticipants;
        $this->options['conferenceRecord'] = $conferenceRecord;
        $this->options['conferenceTrim'] = $conferenceTrim;
        $this->options['conferenceStatusCallback'] = $conferenceStatusCallback;
        $this->options['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
    }

    /**
     * The status_callback
     * 
     * @param string $statusCallback The status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The status_callback_method
     * 
     * @param string $statusCallbackMethod The status_callback_method
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * The status_callback_event
     * 
     * @param string $statusCallbackEvent The status_callback_event
     * @return $this Fluent Builder
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        return $this;
    }

    /**
     * The timeout
     * 
     * @param integer $timeout The timeout
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * The record
     * 
     * @param boolean $record The record
     * @return $this Fluent Builder
     */
    public function setRecord($record) {
        $this->options['record'] = $record;
        return $this;
    }

    /**
     * The muted
     * 
     * @param boolean $muted The muted
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * The beep
     * 
     * @param string $beep The beep
     * @return $this Fluent Builder
     */
    public function setBeep($beep) {
        $this->options['beep'] = $beep;
        return $this;
    }

    /**
     * The start_conference_on_enter
     * 
     * @param boolean $startConferenceOnEnter The start_conference_on_enter
     * @return $this Fluent Builder
     */
    public function setStartConferenceOnEnter($startConferenceOnEnter) {
        $this->options['startConferenceOnEnter'] = $startConferenceOnEnter;
        return $this;
    }

    /**
     * The end_conference_on_exit
     * 
     * @param boolean $endConferenceOnExit The end_conference_on_exit
     * @return $this Fluent Builder
     */
    public function setEndConferenceOnExit($endConferenceOnExit) {
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        return $this;
    }

    /**
     * The wait_url
     * 
     * @param string $waitUrl The wait_url
     * @return $this Fluent Builder
     */
    public function setWaitUrl($waitUrl) {
        $this->options['waitUrl'] = $waitUrl;
        return $this;
    }

    /**
     * The wait_method
     * 
     * @param string $waitMethod The wait_method
     * @return $this Fluent Builder
     */
    public function setWaitMethod($waitMethod) {
        $this->options['waitMethod'] = $waitMethod;
        return $this;
    }

    /**
     * The early_media
     * 
     * @param boolean $earlyMedia The early_media
     * @return $this Fluent Builder
     */
    public function setEarlyMedia($earlyMedia) {
        $this->options['earlyMedia'] = $earlyMedia;
        return $this;
    }

    /**
     * The max_participants
     * 
     * @param integer $maxParticipants The max_participants
     * @return $this Fluent Builder
     */
    public function setMaxParticipants($maxParticipants) {
        $this->options['maxParticipants'] = $maxParticipants;
        return $this;
    }

    /**
     * The conference_record
     * 
     * @param string $conferenceRecord The conference_record
     * @return $this Fluent Builder
     */
    public function setConferenceRecord($conferenceRecord) {
        $this->options['conferenceRecord'] = $conferenceRecord;
        return $this;
    }

    /**
     * The conference_trim
     * 
     * @param string $conferenceTrim The conference_trim
     * @return $this Fluent Builder
     */
    public function setConferenceTrim($conferenceTrim) {
        $this->options['conferenceTrim'] = $conferenceTrim;
        return $this;
    }

    /**
     * The conference_status_callback
     * 
     * @param string $conferenceStatusCallback The conference_status_callback
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallback($conferenceStatusCallback) {
        $this->options['conferenceStatusCallback'] = $conferenceStatusCallback;
        return $this;
    }

    /**
     * The conference_status_callback_method
     * 
     * @param string $conferenceStatusCallbackMethod The
     *                                               conference_status_callback_method
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallbackMethod($conferenceStatusCallbackMethod) {
        $this->options['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        return $this;
    }

    /**
     * The conference_status_callback_event
     * 
     * @param string $conferenceStatusCallbackEvent The
     *                                              conference_status_callback_event
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallbackEvent($conferenceStatusCallbackEvent) {
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.CreateParticipantOptions ' . implode(' ', $options) . ']';
    }
}

class ReadParticipantOptions extends Options {
    /**
     * @param boolean $muted Filter by muted participants
     * @param boolean $hold The hold
     */
    public function __construct($muted = Values::NONE, $hold = Values::NONE) {
        $this->options['muted'] = $muted;
        $this->options['hold'] = $hold;
    }

    /**
     * Only show participants that are muted or unmuted
     * 
     * @param boolean $muted Filter by muted participants
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * The hold
     * 
     * @param boolean $hold The hold
     * @return $this Fluent Builder
     */
    public function setHold($hold) {
        $this->options['hold'] = $hold;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.ReadParticipantOptions ' . implode(' ', $options) . ']';
    }
}