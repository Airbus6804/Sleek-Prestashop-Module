<?php


namespace PrestaShop\Module\Sleek\SleekOrm;

use Db;
use PrestaShop\Module\Sleek\SleekImageUploadService\SleekImageUploadService;

class SleekOrm {

    //Singleton
    private static $instance = null;

    private $tableName = "sleekOutfits";
    private $table;
    private $idColumn = "id";
    private $outfitNameColumn = "outfitName";
    private $outfitDescriptionColumn = "outfitDescription";
    private $imagePictureColumn = "outfitImage";
    private $spotsColumn = "outfitSpots";
    
    private function __construct(){
        $this->table  = _DB_PREFIX_ . $this->tableName;
    }
    
    public static function getInstance(){
        if(self::$instance == null){
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

    //Getters 
    public function getTableName()
    {
        return $this->tableName;
    }


    public function test(){

        return "Hello World in singleton " . _DB_PREFIX_ . SleekImageUploadService::test();

    }

    public function createTable()
    {
        $sql = "CREATE TABLE $this->table (
                    $this->idColumn int,
                    $this->outfitNameColumn varchar(50),
                    $this->outfitDescriptionColumn varchar(500),
                    $this->imagePictureColumn TEXT,
                    $this->spotsColumn TEXT
                )
            ";

        return Db::getInstance()->execute($sql);
    }

    public function deleteTable(){
        $sql = "DROP TABLE $this->table";

        //return Db::getInstance()->execute($sql); 
        return true;
    }   
}