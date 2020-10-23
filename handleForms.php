<?php
require 'vendor/autoload.php';
  use \Mailjet\Resources;
      
  
  $allInputs = array();
  $htmlMessage = "";
  foreach($_POST as $key=>$value){
      
      if($value !== ""){
        $htmlMessage .= $key .': ' . $value . '<br>';
      }else{
          //echo "Error " . $value; 
      }
  }

  SendEmail("", "Email from site", $htmlMessage, $_FILES['file']['temp_name']);
  function SendEmail($subject, $textPart, $htmlPart,$file){
    if(!empty($file)){
      $encodeFile = base64_encode(file_get_contents(basename($file)));
    }
    
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
              'Email' => "adeniltonxavier14@gmail.com",
              'Name' => "Adenilton"
            ]
          ],
          'Subject' => $subject,
          'TextPart' => $textPart,
          'HTMLPart' => $htmlPart,
          'CustomID' => "1555bb",
          'Attachments' => [
            [
                'ContentType' => "application/pdf",
                'Filename' => $file === "" ? null : $file,
                'Base64Content' =>  $encodeFile
            ]
          ]
        ]
    ]
            ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && var_dump($response->getData());
  }
