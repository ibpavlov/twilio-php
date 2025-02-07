<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Supersim\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class SmsCommandTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->supersim->v1->smsCommands->create("HSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "payload");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Sim' => "HSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", 'Payload' => "payload", ];

        $this->assertRequest(new Request(
            'post',
            'https://supersim.twilio.com/v1/SmsCommands',
            null,
            $values
        ));
    }

    public function testCreateCommandMinimalResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "payload": "checkin: firmware update",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "sim_sid": "HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "queued",
                "direction": "to_sim",
                "url": "https://supersim.twilio.com/v1/SmsCommands/HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->supersim->v1->smsCommands->create("HSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "payload");

        $this->assertNotNull($actual);
    }

    public function testCreateCommandFullResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "payload": "Report location: (52.520008, 13.404954)",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "sim_sid": "HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "queued",
                "direction": "to_sim",
                "url": "https://supersim.twilio.com/v1/SmsCommands/HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->supersim->v1->smsCommands->create("HSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "payload");

        $this->assertNotNull($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->supersim->v1->smsCommands("HCXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://supersim.twilio.com/v1/SmsCommands/HCXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "payload": "content of the command",
                "sim_sid": "HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "queued",
                "direction": "to_sim",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://supersim.twilio.com/v1/SmsCommands/HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->supersim->v1->smsCommands("HCXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->supersim->v1->smsCommands->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://supersim.twilio.com/v1/SmsCommands'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sms_commands": [],
                "meta": {
                    "first_page_url": "https://supersim.twilio.com/v1/SmsCommands?Status=queued&Sim=HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0",
                    "key": "sms_commands",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://supersim.twilio.com/v1/SmsCommands?Status=queued&Sim=HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->supersim->v1->smsCommands->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://supersim.twilio.com/v1/SmsCommands?Status=queued&Sim=HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0",
                    "key": "sms_commands",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://supersim.twilio.com/v1/SmsCommands?Status=queued&Sim=HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0"
                },
                "sms_commands": [
                    {
                        "sid": "HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "payload": "content of the command",
                        "sim_sid": "HSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "queued",
                        "direction": "from_sim",
                        "date_created": "2015-07-30T20:00:00Z",
                        "date_updated": "2015-07-30T20:00:00Z",
                        "url": "https://supersim.twilio.com/v1/SmsCommands/HCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->supersim->v1->smsCommands->read();

        $this->assertGreaterThan(0, \count($actual));
    }
}