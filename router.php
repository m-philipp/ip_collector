<?php



/**
 * Class Router
 *
 * Containing most of the supportive functionality for the API.
 */
class Router
{

    /**
     * return the current Version.
     * @return string $version the Version of this API
     * @author Martin Philipp <mail@martin-philipp.de>
     */
    static public function getVersion()
    {
        //header($_SERVER["SERVER_PROTOCOL"]." 418 I’m a teapot");
        return array("version" => "0.0.1");
    }
	
	public static function kickStart($page, $vars = '') {
		$params = array();
		
		if(!empty($vars))
			$params = $vars;
		
        $params['bp'] = getConfig()->get('global')->basepath;
		$params['content'] = getTemplate()->get($page, $params);
        getTemplate()->display('layout.php', $params);
	}
	
    public static function home()
    {
		self::kickStart('home.php');
    }
	
    public static function view()
    {
		$vars = array();		
		// TODO pack some actual IP's in $vars		
		$vps = (int) getConfig()->get('global')->viewsPerSite;
		
		$wildcard = '%';
		
		$offset = 0;
		if(isset($_GET['page']) && is_numeric($_GET['page'])){
			$offset = (((int)$_GET['page'])-1) * $vps;
		}
		
		
		if(!empty($_GET['name'])){
			$wildcard = $_GET['name'];
		}
		
		
		
		$vars['vps'] = $vps;
        $vars['ips'] = getDatabase()->all('SELECT ip, name, timestamp FROM ips WHERE name LIKE :wildcard ORDER BY timestamp DESC LIMIT '.$offset.', '.$vps, array(':wildcard' => $wildcard));
		$vars['countips'] = (int) getDatabase()->one('SELECT COUNT(ip) FROM ips WHERE name LIKE :wildcard', array(':wildcard' => $wildcard))['COUNT(ip)'];
		
		
		
		
		self::kickStart('view.php', $vars);
    }
	
    public static function imprint()
    {
		self::kickStart('imprint.php');
    }
	
    public static function defaultCollect()
    {
		self::collect('default');
	}
	
    public static function collect($name)
    {
		$ip = $_SERVER['REMOTE_ADDR'];
		
        getDatabase()->execute('INSERT INTO ips(ip, name) VALUES(:ip, :name)',
            array(
                ":ip" => $ip,
                ':name' => $name
            ));

			
		self::kickStart('collected.php', array('ip' => $ip, 'name' => $name));
    }
}


?>
