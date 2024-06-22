<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Version;

/**
 * @property string accountSid
 * @property integer averageWaitTime
 * @property integer currentSize
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string friendlyName
 * @property integer maxSize
 * @property string sid
 * @property string uri
 */
class QueueInstance extends InstanceResource {
    protected $_members = null;

    /**
     * Initialize the QueueInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The account_sid
     * @param string $sid Fetch by unique queue Sid
     * @return \Twilio\Rest\Api\V2010\Account\QueueInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'averageWaitTime' => $payload['average_wait_time'],
            'currentSize' => $payload['current_size'],
            'dateCreated' => Deserialize::dateTime($payload['date_created']),
            'dateUpdated' => Deserialize::dateTime($payload['date_updated']),
            'friendlyName' => $payload['friendly_name'],
            'maxSize' => $payload['max_size'],
            'sid' => $payload['sid'],
            'uri' => $payload['uri'],
        );
        
        $this->solution = array(
            'accountSid' => $accountSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\QueueContext Context for this
     *                                                     QueueInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new QueueContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a QueueInstance
     * 
     * @return QueueInstance Fetched QueueInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the QueueInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return QueueInstance Updated QueueInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Deletes the QueueInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the members
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Queue\MemberList 
     */
    protected function getMembers() {
        return $this->proxy()->members;
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.QueueInstance ' . implode(' ', $context) . ']';
    }
}