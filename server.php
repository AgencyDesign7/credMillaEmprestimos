<?php

<?php
  require 'vendor/autoload.php';
  use \Mailjet\Resources;
  $mj = new \Mailjet\Client('4e0d95807ff1222e5832a478b02c7215','98284faab495f55dc32fda7a1af1ab02',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "emilia.sampaio@credmilla.com",
          'Name' => "Emilia"
        ],
        'To' => [
          [
            'Email' => "emilia.sampaio@credmilla.com",
            'Name' => "Emilia"
          ]
        ],
        'Subject' => "Greetings from Mailjet.",
        'TextPart' => "My first Mailjet email",
        'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());


  https://github.com/mailjet/mailjet-apiv3-php/releases


  <?php
/*
This call sends a message to one recipient.
*/

require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "pilot@mailjet.com",
                'Name' => "Mailjet Pilot"
            ],
            'To' => [
                [
                    'Email' => "passenger1@mailjet.com",
                    'Name' => "passenger 1"
                ]
            ],
            'Subject' => "Your email flight plan!",
            'TextPart' => "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!"
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success() && var_dump($response->getData());



KEY API = 4e0d95807ff1222e5832a478b02c7215
?>