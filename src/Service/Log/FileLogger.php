<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 18/02/2016
 * Time: 10:04
 */

namespace Service\Log;



class FileLogger
{
    private $chemin = __DIR__ . '/../../../logs';
    private $fileLog;
    private $message;

    /**
     * @param $type
     * @param $errtxt
     * @throws \Exception
     */
    public function logAction($type, $errtxt)
    {

        $this->logCreerChemain();
        $this->fileLog = $this->chemin . '/'.$type.'.txt';
        $this->message = date('[ Y-M-d H:i:s ] -> ') . $errtxt . PHP_EOL;

        $this->log($type);

    }

    /**
     * @param type
     * @throws \Exception
     */
    public function log()
    {
        // ajouter un retour à la ligne au fichier
        // remplace fopen et toute son artillerie
        if (!file_put_contents(
            $this->fileLog,
            $this->message,
            FILE_APPEND | LOCK_EX
        )) {
            throw new \Exception("Vous ne pouvez pas écrire dans le fichier $this->fileLog!");
        }

    }

    protected function logCreerChemain()
    {

        if (!file_exists($this->chemin)) {
            if (!mkdir($this->chemin)) {
                throw new \Exception("Le repertoire logs ne peut pas être créé !");
            }
        }

    }

}


