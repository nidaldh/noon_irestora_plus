<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Chat\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ServiceTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->chat->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'get',
            'https://chat.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "consumption_report_interval": 100,
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "default_channel_creator_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "default_channel_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "default_service_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "links": {},
                "notifications": {},
                "post_webhook_url": "post_webhook_url",
                "pre_webhook_url": "pre_webhook_url",
                "reachability_enabled": false,
                "read_status_enabled": false,
                "sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "typing_indicator_timeout": 100,
                "url": "http://www.example.com",
                "webhook_filters": [
                    "webhook_filters"
                ],
                "webhook_method": "webhook_method",
                "webhooks": {}
            }
            '
        ));
        
        $actual = $this->twilio->chat->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        
        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->chat->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'delete',
            'https://chat.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));
        
        $actual = $this->twilio->chat->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        
        $this->assertTrue($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->chat->v1->services->create("friendlyName");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'FriendlyName' => "friendlyName",
        );
        
        $this->assertRequest(new Request(
            'post',
            'https://chat.twilio.com/v1/Services',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "consumption_report_interval": 100,
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "default_channel_creator_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "default_channel_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "default_service_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "links": {},
                "notifications": {},
                "post_webhook_url": "post_webhook_url",
                "pre_webhook_url": "pre_webhook_url",
                "reachability_enabled": false,
                "read_status_enabled": false,
                "sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "typing_indicator_timeout": 100,
                "url": "http://www.example.com",
                "webhook_filters": [
                    "webhook_filters"
                ],
                "webhook_method": "webhook_method",
                "webhooks": {}
            }
            '
        ));
        
        $actual = $this->twilio->chat->v1->services->create("friendlyName");
        
        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->chat->v1->services->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'get',
            'https://chat.twilio.com/v1/Services'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://ip-messaging.twilio.com/v1/Services?Page=0&PageSize=50",
                    "key": "services",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 0,
                    "previous_page_url": null,
                    "url": "https://ip-messaging.twilio.com/v1/Services"
                },
                "services": []
            }
            '
        ));
        
        $actual = $this->twilio->chat->v1->services->read();
        
        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://ip-messaging.twilio.com/v1/Services?Page=0&PageSize=50",
                    "key": "services",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 1,
                    "previous_page_url": null,
                    "url": "https://ip-messaging.twilio.com/v1/Services"
                },
                "services": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "consumption_report_interval": 100,
                        "date_created": "2015-07-30T20:00:00Z",
                        "date_updated": "2015-07-30T20:00:00Z",
                        "default_channel_creator_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "default_channel_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "default_service_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "friendly_name",
                        "links": {},
                        "notifications": {},
                        "post_webhook_url": "post_webhook_url",
                        "pre_webhook_url": "pre_webhook_url",
                        "reachability_enabled": false,
                        "read_status_enabled": false,
                        "sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "typing_indicator_timeout": 100,
                        "url": "http://www.example.com",
                        "webhook_filters": [
                            "webhook_filters"
                        ],
                        "webhook_method": "webhook_method",
                        "webhooks": {}
                    }
                ]
            }
            '
        ));
        
        $actual = $this->twilio->chat->v1->services->read();
        
        $this->assertGreaterThan(0, count($actual));
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->chat->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'post',
            'https://chat.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "consumption_report_interval": 100,
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "default_channel_creator_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "default_channel_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "default_service_role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "links": {},
                "notifications": {},
                "post_webhook_url": "post_webhook_url",
                "pre_webhook_url": "pre_webhook_url",
                "reachability_enabled": false,
                "read_status_enabled": false,
                "sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "typing_indicator_timeout": 100,
                "url": "http://www.example.com",
                "webhook_filters": [
                    "webhook_filters"
                ],
                "webhook_method": "webhook_method",
                "webhooks": {}
            }
            '
        ));
        
        $actual = $this->twilio->chat->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        
        $this->assertNotNull($actual);
    }
}