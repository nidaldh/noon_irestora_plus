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
use Twilio\Version;

/**
 * @property string accountSid
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string iceServers
 * @property string password
 * @property string ttl
 * @property string username
 */
class TokenInstance extends InstanceResource {
    /**
     * Initialize the TokenInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The unique sid that identifies this account
     * @return \Twilio\Rest\Api\V2010\Account\TokenInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'dateCreated' => Deserialize::dateTime($payload['date_created']),
            'dateUpdated' => Deserialize::dateTime($payload['date_updated']),
            'iceServers' => $payload['ice_servers'],
            'password' => $payload['password'],
            'ttl' => $payload['ttl'],
            'username' => $payload['username'],
        );
        
        $this->solution = array(
            'accountSid' => $accountSid,
        );
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
        return '[Twilio.Api.V2010.TokenInstance]';
    }
}