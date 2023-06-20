<?php

//use \PrestaShop\Module\Sleek\SleekOrm\SleekOrm;


class Sleek extends Module {

    public $SleekOrm;

    public function __construct(){

        $this->name = 'sleek';
        $this->tab = 'sleek';
        $this->version = '1.0.0';
        $this->author = 'Ragonesi Alessio';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '8.99.99',
        ];
        $this->bootstrap = false;

        parent::__construct();

        $this->displayName = $this->l('Sleek');
        $this->description = $this->l('Create outfits and link products to them');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }

        //$this->SleekOrm = SleekOrm::getInstance();

    }


    public function install(){


          //$this->SleekOrm->createTable() &&
        //$this->installTab() &&
            return    $this->registerHook('displayFooterProduct') && 
                parent::install();

    }

    public function uninstall(){


          
                //$this->SleekOrm->deleteTable() &&
        return  $this->uninstallTab() && 
                parent::uninstall();
    }


    public function hookDisplayFooterProduct(array $params)
    {
        //$orm = SleekOrm::getInstance();
        //return $orm->createTable() . "<br>" . $orm->deleteTable();
        return "<h1> hello World </h1>";
    }


    private function installTab()
    {

        $languages = Language::getLanguages();
        $tab = new Tab();
        $tab->class_name = 'SleekAdmin';
        $tab->module = $this->name;
        $tab->id_parent = (int) Tab::getIdFromClassName('AdminCatalog');
        foreach ($languages as $lang) {
            $tab->name[$lang['id_lang']] = 'Sleek Outfits';
        }
        try {
            $tab->save();
        } catch (Exception $e) {
            return false;
        }

        return true;


    }

    private function uninstallTab()
    {

        $tab = (int) Tab::getIdFromClassName('SleekAdmin');
        if ($tab) {
            $mainTab = new Tab($tab);
            try {
                $mainTab->delete();
            } catch (Exception $e) {
                echo $e->getMessage();

                return false;
            }
        }

        return true;

    }

}