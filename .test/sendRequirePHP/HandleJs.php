<?php

class HandleJs
{

    /**
     * Método responsável por gerar uma requisição de post para qualquer servidor que
     * precisarmos.
     * 
     * @param array $cont
     * @param string $local
     * @return response
     */
    public function post($content, $local)
    {
        $postData = http_build_query(array('teste' => 'chegou ai?'));

        //inicia o cURL
        $ch = curl_init();

        //determina para onde será enviada a requisição
        curl_setopt($ch, CURLOPT_URL, $local);
        curl_setopt($ch, CURLOPT_POST, 1);

        //envia a requisição
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //fecha a conexão com o servidor externo
        curl_close($ch);

        var_dump(file_get_contents('./texto.txt'));
        die;
    }
}
