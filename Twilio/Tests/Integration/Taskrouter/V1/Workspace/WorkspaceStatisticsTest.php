<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Taskrouter\V1\Workspace;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class WorkspaceStatisticsTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->taskrouter->v1->workspaces("WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                         ->statistics()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'get',
            'https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Statistics'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "url": "https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Statistics",
                "cumulative": {
                    "avg_task_acceptance_time": 0.0,
                    "start_time": "2008-01-02T00:00:00Z",
                    "reservations_accepted": 0,
                    "reservations_canceled": 0,
                    "reservations_created": 0,
                    "reservations_rejected": 0,
                    "reservations_rescinded": 0,
                    "reservations_timed_out": 0,
                    "end_time": "2008-01-02T00:00:00Z",
                    "tasks_canceled": 0,
                    "tasks_created": 0,
                    "tasks_deleted": 0,
                    "tasks_moved": 0,
                    "tasks_timed_out_in_workflow": 0
                },
                "realtime": {
                    "activity_statistics": [
                        {
                            "friendly_name": "Offline",
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "workers": 1
                        },
                        {
                            "friendly_name": "Idle",
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "workers": 0
                        },
                        {
                            "friendly_name": "80fa2beb-3a05-11e5-8fc8-98e0d9a1eb73",
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "workers": 0
                        },
                        {
                            "friendly_name": "Reserved",
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "workers": 0
                        },
                        {
                            "friendly_name": "Busy",
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "workers": 0
                        },
                        {
                            "friendly_name": "817ca1c5-3a05-11e5-9292-98e0d9a1eb73",
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "workers": 0
                        }
                    ],
                    "longest_task_waiting_age": 0,
                    "longest_task_waiting_sid": null,
                    "tasks_by_status": {
                        "assigned": 0,
                        "pending": 0,
                        "reserved": 0
                    },
                    "total_tasks": 0,
                    "total_workers": 1
                },
                "workspace_sid": "WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));
        
        $actual = $this->twilio->taskrouter->v1->workspaces("WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                               ->statistics()->fetch();
        
        $this->assertNotNull($actual);
    }
}