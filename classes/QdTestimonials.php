<?php

class QdTestimonials extends Module{
    public function __construct(){
        $this->name = $this->l('qdtestimonials');
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Jean-Jeannine De La Tourette';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Testimonials');
        $this->description = $this->l('testi null');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        if (!Configuration::get('QDTESTIMONIALS_NAME'))
           $this->warning = $this->l('No name provided');
    }
    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        if (!parent::install()
            || !$this->installDb()
            || !$this->installTab()
        ) {
            return false;
        }
        return true;
    }
    public function installTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminQdTestimonials';
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'Qd Testimonials';
        }
        $tab->id_parent = 0;
        $tab->module = $this->name;
        return $tab->add();
    }
    public function uninstall(){
        $tab = new Tab((int)Tab::getIdFromClassName('AdminQdTestimonials'));
        $tab->delete();
        if (!parent::uninstall()
            || !Configuration::deleteByName('qdtestimonials_NAME')
            || !$this->uninstallDb()
        ){
            return false;
        }
        return true;
    }
    public  function installDb()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'qdtestimonials` (
            `id_qdtestimonials` int(11) NOT NULL AUTO_INCREMENT,
            `qdtestimonials_author` varchar(50) NOT NULL,
            `qdtestimonials_content` varchar(200) NOT NULL,
            `qdtestimonials_date` datetime NOT NULL,
            PRIMARY KEY (`id_qdtestimonials`))';
        return Db::getInstance()->execute($sql);
    }
    public function uninstallDb()
    {
      $sql = 'DROP TABLE '._DB_PREFIX_.'qdtestimonials';
      DB::getInstance()->execute($sql);
      return true;
    }
}
