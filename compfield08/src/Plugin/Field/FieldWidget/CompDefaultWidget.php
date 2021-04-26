<?php

namespace Drupal\compfield08\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'AddressDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "CompDefaultWidget",
 *   module = "compfield08",
 *   label = @Translation("Address select"),
 *   field_types = {
 *     "Compound"
 *   }
 * )
 */
class CompDefaultWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   * 
   * Inside this method we can define the form used to edit the field type.
   * 
   * Here there is a list of allowed element types: https://goo.gl/XVd4tA
   */
  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {

    // Span Text

    $element['spantext'] = [
      '#type' => 'textfield',
      '#title' => t('Span Text'),

      // Set here the current value for this field, or a default value (or 
      // null) if there is no a value
      '#default_value' => isset($items[$delta]->spantext) ? 
          $items[$delta]->spantext : null,

      '#empty_value' => '',
      '#placeholder' => t('Span Text'),
    ];

    // Sidebar Title

    $element['sidebar_title'] = [
      '#type' => 'textfield',
      '#title' => t('Sidebar Title'),
      '#default_value' => isset($items[$delta]->sidebar_title) ? 
          $items[$delta]->sidebar_title : null,
      '#empty_value' => '',
      '#placeholder' => t('Sidebar Title'),
    ];

    //Title

    $element['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($items[$delta]->title) ? 
          $items[$delta]->title : null,
      '#empty_value' => '',
      '#placeholder' => t('Title'),
    ];
    
    //Thumb Url
    
    $element['thumb_url'] = [
      '#type' => 'url',
      '#title' => t('Thumb Url'),
      '#default_value' => isset($items[$delta]->thumb_url) ? 
          $items[$delta]->thumb_url : null,
      '#empty_value' => '',
      '#placeholder' => t('Thumb Url'),
    ];
    
    //exp lvl - unsigned integer from 1 - 5
    
    $element['exp_lvl'] = [
      '#type' => 'number',
      '#title' => t('Exp Lvl'),
      //'#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : NULL,
      '#default_value' => isset($items[$delta]->exp_level) ? $items[$delta]->exp_level : null,
      //'#empty_value' => 2,
      //'#placeholder' => t('Exp Lvl'),
      '#min' => 1,
      '#max' => 5,
    ];
    
    return $element;
  }

} // class


