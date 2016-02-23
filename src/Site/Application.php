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
    protected $conf;
    protected $routing;

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

        $this->conf = Yaml::parse(file_get_contents($filename));

        //print Yaml::dump($array);
        //var_dump($this->conf);

        $filename = __DIR__ . '/../../config/' . $this->environment . '/routing.yml';
        $this->routing = Yaml::parse(file_get_contents($filename));

        //var_dump($this->routing);

    }

    /**
     * Lancement de l'application globale
     */
    public function run(){

        $this->log = new Logger;

        $routeName = (!empty($_GET['page']))? $_GET['page'] : 'accueil';
        $routeName = ($this->routing['routes'][$routeName])? $routeName : 'accueil';

        $controllerClass = $this->routing['routes'][$routeName]['controller'];
        $controllerMethod = $this->routing['routes'][$routeName]['action'];

        $formation = new $controllerClass;
        $formation->setLoger($this->log);

        try {

            $formation->{$controllerMethod}();

        } catch(\Exception $e) {

            echo 'Message: ' .$e->getMessage();

        }
    }
}


