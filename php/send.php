// API access key from Google API's Console                 

    //$registrationIds = ["Los ids de los telefonos"];


    // preparando mensagem da notificação
                    
                    $msg = array(
                        "title" => "Chegou um novo pedido",
                        'body' => "Chegou um novo pedido para voce, efetue a entrega o quanto antes."
                    );
                    
                    $dados = array(
                        "refresh" => true //envia variável que quiser exemplo com um bolean
                    );
                    
                    $fields = array(
                        'to'  => '/topics/teste', //caso queira enviar para um dispositivo único trocar pelo key do dispositivo
                        'notification'              => $msg,
                        'data'          => $dados
                    );
                    
                    $headers = array('Content-Type: application/json', 'Authorization:key=informeachavedoseuappaqui'
);
                    var_dump($fields);
                    $fields = json_encode($fields);
                    
                    
                    $ch = curl_init();
                    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                    curl_setopt( $ch,CURLOPT_POST, true );
                    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch,CURLOPT_POSTFIELDS, $fields );
                    $result = curl_exec($ch );
                    curl_close( $ch );

                    echo $result; 