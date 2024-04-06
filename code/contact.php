<?php 
    require_once(__DIR__ . '/vendor/autoload.php');
    use \Mailjet\Resources;
    define('API_PUBLIC_KEY', 'a7f85f895f78e47c018dcf03cb8a9627');
    define('API_PRIVATE_KEY', '2cf1d3e7cd08b496bbf093919eba0fe4');
    $mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY,true,['version' => 'v3.1']);


    if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])){
        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "portfolio@gmail.com",
                'Name' => "mathis"
                ],
                'To' => [
                [
                    'Email' => "mat.91dd@gmail.com",
                    'Name' => "mathis"
                ]
                ],
                'Subject' => "SUJECT",
                'TextPart' => "$email, $message", 
            ]
            ]
        ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            
            $response->success();
            echo "Email envoyé avec succès !";
        }
        else{
            echo "Email non valide";
        }

    } else {
        header('Location: index.php');
        die();
    }
