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
            || !Configuration::updateValue('QDTESTIMONIALS_NAME', 'hello world')
        ) {
            return false;
        }
        return true;
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

}
