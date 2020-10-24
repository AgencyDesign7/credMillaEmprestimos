<?php
require 'vendor/autoload.php';
  use \Mailjet\Resources;
  
  if(!empty($_POST)){

  
  $allInputs = array();
  $htmlMessage = "";
  foreach($_POST as $key=>$value){
      
      if($value !== ""){
        $htmlMessage .= $key .': ' . $value . '<br><br>';
      }
  }
  if(!empty($_FILES['file'])){
    $target_dir = "./uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  }else{
    $target_file = "";
  }
  
  SendEmail($_POST['Request'],"", $htmlMessage, $target_file);
}
function SendEmail($Subject,$textPart, $htmlPart,$file){
  if(!empty($file)){
    $encodeFile = base64_encode(file_get_contents($file));
  }else{
    $encodeFile = "";
  }
  if(!empty($file)){
    $fileName = "Curriculo ".$_POST['Nome'];
  }else{
    $fileName = "";
  }
  $mj = new \Mailjet\Client('4e0d95807ff1222e5832a478b02c7215','98284faab495f55dc32fda7a1af1ab02',true,['version' => 'v3.1']);
  if(!empty($file)){
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
          'Subject' => $Subject,
          'TextPart' => $textPart,
          'HTMLPart' => $htmlPart,
          'CustomID' => "1555bb",
          'Attachments' => [
            [
                'ContentType' => "application/pdf",
                'Filename' => $fileName,
                'Base64Content' =>  $encodeFile
            ]
          ]
        ]
    ]
            ];
  }else{
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
          'Subject' => $Subject,
          'TextPart' => $textPart,
          'HTMLPart' => $htmlPart,
          'CustomID' => "1555bb"
        ]
    ]
            ];
  }

  $response = $mj->post(Resources::$Email, ['body' => $body]);
  if(intval($response->success()) === intval(1)){
    header('location: ./sucess.php');
  }else{
    header('location: ./error.php');
  }
  
  // $response->success() && var_dump($response->getData());
}
