<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 22/02/2016
 * Time: 15:21
 */

namespace Site;

use Symfony\Component\Yaml\Yaml;
/*


*/

/**
 * Class Application
 * @package Site
 */
class Application
{

    /** @var */
    protected $environment;

    /**
     * Application constructor.
     * @param $environment dev ou prod
     */
    public function __construct($environment)
    {
        $this->environment = $environment;

        $this->config();

    }

    private function config(){

        $filename = __DIR__ . '/../../config/' . $this->environment . '/config.yml';
        $array = Yaml::parse(file_get_contents($filename));

        print Yaml::dump($array);
        echo '<pre>';
        print_r($array);
        echo '</pre>';

    }

    /**
     * Lancement de l'application globale
     */
    public function run(){

        $formation = new \App\Controller\formation;

        try {

            $formation->homepageAction();

        } catch(\Exception $e) {

            echo 'Message: ' .$e->getMessage();

        }
    }
}


