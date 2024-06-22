<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Api\V2010\Account\Sip\IpAccessControlList;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class IpAddressTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->sip
                                     ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->ipAddresses->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'get',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json'
        ));
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "end": 0,
                "first_page_uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json?PageSize=50&Page=0",
                "ip_addresses": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "Mon, 20 Jul 2015 17:27:10 +0000",
                        "date_updated": "Mon, 20 Jul 2015 17:27:10 +0000",
                        "friendly_name": "aaa",
                        "ip_access_control_list_sid": "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "ip_address": "192.1.1.2",
                        "sid": "IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses/IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
                    }
                ],
                "last_page_uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json?PageSize=50&Page=0",
                "next_page_uri": null,
                "num_pages": 1,
                "page": 0,
                "page_size": 50,
                "previous_page_uri": null,
                "start": 0,
                "total": 1,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json?PageSize=50&Page=0"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->sip
                                           ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->ipAddresses->read();
        
        $this->assertGreaterThan(0, count($actual));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "end": 0,
                "first_page_uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json?PageSize=50&Page=0",
                "ip_addresses": [],
                "last_page_uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json?PageSize=50&Page=0",
                "next_page_uri": null,
                "num_pages": 1,
                "page": 0,
                "page_size": 50,
                "previous_page_uri": null,
                "start": 0,
                "total": 1,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json?PageSize=50&Page=0"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->sip
                                           ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->ipAddresses->read();
        
        $this->assertNotNull($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->sip
                                     ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->ipAddresses->create("friendlyName", "ipAddress");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'FriendlyName' => "friendlyName",
            'IpAddress' => "ipAddress",
        );
        
        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses.json',
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
                "date_created": "Mon, 20 Jul 2015 17:27:10 +0000",
                "date_updated": "Mon, 20 Jul 2015 17:27:10 +0000",
                "friendly_name": "aaa",
                "ip_access_control_list_sid": "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "ip_address": "192.1.1.2",
                "sid": "IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses/IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->sip
                                           ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->ipAddresses->create("friendlyName", "ipAddress");
        
        $this->assertNotNull($actual);
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->sip
                                     ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->ipAddresses("IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'get',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses/IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Mon, 20 Jul 2015 17:27:10 +0000",
                "date_updated": "Mon, 20 Jul 2015 17:27:10 +0000",
                "friendly_name": "aaa",
                "ip_access_control_list_sid": "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "ip_address": "192.1.1.2",
                "sid": "IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses/IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->sip
                                           ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->ipAddresses("IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        
        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->sip
                                     ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->ipAddresses("IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses/IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Mon, 20 Jul 2015 17:27:10 +0000",
                "date_updated": "Mon, 20 Jul 2015 17:27:10 +0000",
                "friendly_name": "aaa",
                "ip_access_control_list_sid": "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "ip_address": "192.1.1.2",
                "sid": "IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses/IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->sip
                                           ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->ipAddresses("IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        
        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->sip
                                     ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->ipAddresses("IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'delete',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SIP/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAddresses/IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->sip
                                           ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->ipAddresses("IPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        
        $this->assertTrue($actual);
    }
}