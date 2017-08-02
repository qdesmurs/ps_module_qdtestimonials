<?php
class AdminQdTestimonialsController extends ModuleAdminController {
    public function __construct()
   {
        $this->table = 'qdtestimonials';
        $this->className = 'QdPost';
        $this->bootstrap = true;
        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
        $this->context = Context::getContext();

        $this->fields_list = array(
            'qdtestimonials_author' => array(
                'title' => $this->l('Author'),
            ),
            'qdtestimonials_content' => array(
                'title' => $this->l('Text'),
            ),
            'qdtestimonials_date' => array(
                'title' => $this->l('Date'),
                'type' => 'date',
                )
        );
        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Post'),
            ),
            'input' => array(
                array(
                'label' => $this->l('Author'),
                'type' => 'text',
                'name' => 'qdtestimonials_author',
                ),
                array(
                'label' => $this->l('Contenu'),
                'type' => 'textarea',
                'name' => 'qdtestimonials_content',
                ),
                array(
                'label' => $this->l('Date'),
                'type' => 'date',
                'name' => 'qdtestimonials_date',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right'
            )
        );
        parent::__construct();
   }
   public function renderList()
{
    $this->addRowAction('edit');
    $this->addRowAction('delete');
    $this->addRowAction('details');
    $this->bulk_actions = array(
        'delete' => array(
            'text' => $this->l('Delete selected'),
            'confirm' => $this->l('Delete selected items?')
        )
    );
    $this->fields_list = array(
        'id_qdtestimonials' => array(
            'title' => $this->l('Id')
        ),
        'qdtestimonials_author' => array(
            'title' => $this->l('Author'),
            'align' => 'center',
            'width' => 25
        ),
        'qdtestimonials_content' => array(
            'title' => $this->l('Contenu'),
            'width' => 'auto',
        ),
        'qdtestimonials_date' => array(
            'title' => $this->l('Date'),
            'width' => 'auto',
        ),
    );
    $lists = parent::renderList();
    parent::initToolbar();
    return $lists;
}
}
