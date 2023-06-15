<?php
require_once('../vendor/autoload.php');

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);
$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
$sendSmtpEmail['subject'] = $_POST['subject'];
$sendSmtpEmail['htmlContent'] = $_POST['message'];
$sendSmtpEmail['sender'] = array('name' => $_POST['name'], 'email' => $_POST['email']);
$sendSmtpEmail['to'] = array(
    array('email' => 'sanelavuc@gmail.com', 'name' => 'Sanela Vuc')
);
$sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}
?>
