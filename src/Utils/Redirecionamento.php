<?php

namespace APP\Utils;

class Redirecionamento{

    public static function redirecionamento(
        string|array $mensagem,
        string $type = 'sucesso',
        string $url = '../View/mensagem.php'
    ) {
        session_start();
        if (is_array($mensagem)) {
            $html = '';
            foreach($mensagem as $msg){
                $html .= "<li>$msg</li>";
            }
            $_SESSION['msg_atencao'] = $html;
        }else{
            if($type == 'sucesso'){
                $_SESSION['msg_sucesso'] = $mensagem;
            }else{
                $_SESSION['msg_erro'] = $mensagem;
            }
        }
        header("location:$url");
        exit;
    }
}

?>