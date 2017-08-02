<?php

class QdPost extends ObjectModel
{
    public $id_qdtestimonials;
    public $qdtestimonials_date;
    public $qdtestimonials_author;
    public $qdtestimonials_content;
    public static $definition = array(
        'table' => 'qdtestimonials',
        'primary' => 'id_qdtestimonials',
        'fields' => array(
            'qdtestimonials_date' => array('type' => self::TYPE_DATE, 'validate' => 'isString'),
            'qdtestimonials_author' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'qdtestimonials_content' => array('type' => self::TYPE_STRING, 'validate' => 'isString')
        ),
    );
}
