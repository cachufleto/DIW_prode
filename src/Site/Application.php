<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 22/02/2016
 * Time: 15:21
 */

namespace Site;

use Service\container\container;
use Symfony\Component\Yaml\Yaml;
use Service\Log\FileLogger;

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
     * @param string $environment dev ou prod
     */
    public function __construct($environment)
    {
        $this->environment = $environment;

        $this->config();

    }

    private function config()
    {

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
    public function run()
    {
        $log = new FileLogger();
        $container = new container;
        $container->add('logger', $log);

        $routeName = (!empty($_GET['page']))? $_GET['page'] : 'accueil';

        try {

            if (!array_key_exists($routeName, $this->routing['routes'])) {
                throw new \Exception('Ce chemin n\'existe pas');
            }

            $controllerClass = $this->routing['routes'][$routeName]['controller'];
            $controllerMethod = $this->routing['routes'][$routeName]['action'];


            $formation = new $controllerClass;
            $formation->setContainer($container);


            $formation->{$controllerMethod}();

        } catch (\Exception $e) {

            header('Location:ERREUR.php');
            //echo 'Message: ' .$e->getMessage();
            exit();
           // var_dump($e);

        }
    }
}


