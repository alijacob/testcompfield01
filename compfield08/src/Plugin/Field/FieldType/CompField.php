<?php

namespace Drupal\compfield08\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'address' field type.
 *
 * @FieldType(
 *   id = "Compound",
 *   module = "compfield08",
 *   label = @Translation("Compound"),
 *   description = @Translation("Compound field."),
 *   category = @Translation("Compound"),
 *   default_widget = "CompDefaultWidget"
 * )
 */
class CompField extends FieldItemBase {

  /**
   * Field type properties definition.
   * 
   * Inside this method we defines all the fields (properties) that our 
   * custom field type will have.
   * 
   * Here there is a list of allowed property types: https://goo.gl/sIBBgO
   */
  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];

    $properties['spantext'] = DataDefinition::create('string')
      ->setLabel(t('Span Text'));

    $properties['sidebar_title'] = DataDefinition::create('string')
      ->setLabel(t('Sidebar Title'));
    
    $properties['title'] = DataDefinition::create('string')
      ->setLabel(t('Title'));
      
    $properties['thumb_url'] = DataDefinition::create('string')
      ->setLabel(t('Thumb Url'));  
    
    $properties['exp_lvl'] = DataDefinition::create('integer')
      ->setLabel(t('Exp Lvl'));
      
    return $properties;
  }

  /**
   * Field type schema definition.
   * 
   * Inside this method we defines the database schema used to store data for 
   * our field type.
   * 
   * Here there is a list of allowed column types: https://goo.gl/YY3G7s
   */
  public static function schema(StorageDefinition $storage) {

    $columns = [];
    $columns['spantext'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['sidebar_title'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['title'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['thumb_url'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['exp_lvl'] = [
      'type' => 'int',
      'unsigned' => TRUE,
      'size' => 'tiny',
    ];

    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * Define when the field type is empty. 
   * 
   * This method is important and used internally by Drupal. Take a moment
   * to define when the field fype must be considered empty.
   */
  public function isEmpty() {

    $isEmpty = 
      empty($this->get('spantext')->getValue()) &&
      empty($this->get('sidebar_title')->getValue()) &&
      empty($this->get('title')->getValue()) &&
      empty($this->get('thumb_url')->getValue()) &&
      empty($this->get('exp_lvl')->getValue());

    return $isEmpty;
  }

} // class


