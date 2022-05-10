<?php

use App\File\Upload;

require __DIR__ . '/vendor/autoload.php';

if (isset($_FILES) && !empty($_FILES)) {


    // INSTANCIA DE UPLOADES
    $obUpload = new Upload($_FILES['arquivo']);

    // ALTERA NOME DO ARQUIVO PARA SUA PREFERENCIA
    //$obUpload->setName('nomeArquivo-com-nomeAlterado');

    // GERA UM NOME ALEATÓRIO
    $obUpload->generateNewName();

    // MOVE OS ARQUIVOS DE UPLOAD
    // P1 CAMINHO DA PASTA
    /**
     * P2 DECIDE SE O ARQUIVO COM MESMO NOME VAI SER SOBRE ESCRITO
     * POR PADRÃO VEM TRUE, OU SEJA VAI SER SOBRE ESCRITO
     * CASO SEJA FALSO OS ARQUIVOS COM MESMO NOME SERÃO CONCATENADOS COM INCREMENTAÇÃO
     * EX: ARQUIVO.PNG, ARQUIVO-2.PNG, ARQUIVO-3.PNG E ASSIM POR DIANTE
     */
    /**
     *  P3 QUANDO NÃO PASSA PARAMENTRO ACEITA QUALQUER TIPO DE ARQUIVO
     * SE DESEJAR PODE PASSAR UM ARRAY COM OS PARAMETROS DESEJADOS
     */
    $sucesso = $obUpload->upload(__DIR__ . '/files', false, ['png', 'jpeg', 'pdf']);

    if ($sucesso) {
        echo 'Aquivo enviado' . $obUpload->getBasename();
    } else {
        echo 'error';
    }
}








include __DIR__ . '/includes/formulario.php';
