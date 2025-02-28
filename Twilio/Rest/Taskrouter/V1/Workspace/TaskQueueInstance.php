<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string assignmentActivitySid
 * @property string assignmentActivityName
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string friendlyName
 * @property integer maxReservedWorkers
 * @property string reservationActivitySid
 * @property string reservationActivityName
 * @property string sid
 * @property string targetWorkers
 * @property string taskOrder
 * @property string url
 * @property string workspaceSid
 * @property array links
 */
class TaskQueueInstance extends InstanceResource {
    protected $_taskQueuesStatistics = null;
    protected $_taskQueueStatistics = null;

    /**
     * Initialize the TaskQueueInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The workspace_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueInstance 
     */
    public function __construct(Version $version, array $payload, $workspaceSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'assignmentActivitySid' => $payload['assignment_activity_sid'],
            'assignmentActivityName' => $payload['assignment_activity_name'],
            'dateCreated' => Deserialize::dateTime($payload['date_created']),
            'dateUpdated' => Deserialize::dateTime($payload['date_updated']),
            'friendlyName' => $payload['friendly_name'],
            'maxReservedWorkers' => $payload['max_reserved_workers'],
            'reservationActivitySid' => $payload['reservation_activity_sid'],
            'reservationActivityName' => $payload['reservation_activity_name'],
            'sid' => $payload['sid'],
            'targetWorkers' => $payload['target_workers'],
            'taskOrder' => $payload['task_order'],
            'url' => $payload['url'],
            'workspaceSid' => $payload['workspace_sid'],
            'links' => $payload['links'],
        );
        
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueContext Context for
     *                                                               this
     *                                                               TaskQueueInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TaskQueueContext(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a TaskQueueInstance
     * 
     * @return TaskQueueInstance Fetched TaskQueueInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the TaskQueueInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return TaskQueueInstance Updated TaskQueueInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Deletes the TaskQueueInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the taskQueuesStatistics
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueuesStatisticsList 
     */
    protected function getTaskQueuesStatistics() {
        return $this->proxy()->taskQueuesStatistics;
    }

    /**
     * Access the taskQueueStatistics
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueStatisticsList 
     */
    protected function getTaskQueueStatistics() {
        return $this->proxy()->taskQueueStatistics;
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
        return '[Twilio.Taskrouter.V1.TaskQueueInstance ' . implode(' ', $context) . ']';
    }
}