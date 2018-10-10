<?php
class Plugin {
	public function __construct(){echo "TEST";}
}

class PluginSystem {
	protected static $conf = null;

	
	function __construct() {
		
	}
	

	
	public static function checkPluginSystem(){
		if(is_dir(Conf::_PLUGIN_DIR)){
			$aDir = array_diff(scandir(Conf::_PLUGIN_DIR),array(".",".."));

			foreach($aDir as $dir){
				/**
				* Find structure xml file.
				* Check Activate Plugins.
				**/
				$sStrucFile = "structure.xml";
				$sDir = Conf::_PLUGIN_DIR . "/". $dir;
				if(is_dir($sDir)){
					foreach(scandir($sDir) as $v){
						if($v == "structure.xml"){
							$oxml = simplexml_load_file($sDir."/".$v);
							print_r($oxml);
						}
					}
				}
			}
			//PluginHelper::getOperateDB();
		}else{
			echo "plugin folder dose'nt exists.";
		}

	}	
}

class PluginHelper{

	public static function getPlugin(){
	}

	public static function getDocument(){
	}

	public static function getOperateDB($sql=""){
		if($sql != "" || !empty($sql)){
			$db = new Database();
			try{
				$stmt = $db->query($sql);
				print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
			}catch(PDOException $e){
				echo "ERROR";
				echo $e->getMessage();
			}
		}else{
			throw new Exception("Please Check your query.");
		}
	}
}
class PluginFactory{
}
?>