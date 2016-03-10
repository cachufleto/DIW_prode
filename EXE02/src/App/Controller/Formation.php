<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 17/02/2016
 * Time: 16:34
 */

namespace App\Controller;

// use facile l'acces à la class par le name space
// il peut être utilisée sous forme de alias
use \Service\Log\FileLogger as Logger;


class Formation
{
    /** @nom string  */
    protected $nom = 'DIWoo';
    /** @date string  */
    protected $date = '2016/02/15';
    /** @stagiers int  */
    protected $stagiers = 12;
    /** @thematique string  */
    protected $thematique = 'PHPOO';

    /**
     * @param mixed $thematique
     */
    public function setThematique($thematique)
    {
        $this->thematique = $thematique;
    }

    /* ******************************************************************** */

    public function homepageAction()
    {

        $message =  ' Formation '.$this->nom;
        // optimisation de l'appel de la class
        // $log = new \Service\Log\FileLogger;
        $log = new Logger;
        $log->LogAction('Debug', $message);
    }


    public function inscriptionAction()
    {

    }

    public function listeAction()
    {

    }
}

