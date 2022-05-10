<?php

use App\File\Upload;

require __DIR__ . '/vendor/autoload.php';

if (isset($_FILES)) {

    // MULTIPLOS ARQUIVOS
    $uploads = Upload::createMultiUpload($_FILES['arquivo']);

    // ENVIO DE MULTIPLOS ARQUIVOS
    foreach ($uploads as  $obUpload) {

        // NOMES ALEATÓRIOS
        $obUpload->generateNewName();

        // MOVE ARQUIVOS DE UPLOAD
        $sucesso = $obUpload->Upload(__DIR__ . '/files', false);
    }
}



include __DIR__ . '/includes/formulario-multi.php';
