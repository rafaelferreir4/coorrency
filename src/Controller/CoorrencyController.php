<?php

namespace Drupal\coorrency\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Utility\SafeMarkup;

/**
 * Controller routines for Coorrency pages.
 */
class CoorrencyController extends ControllerBase {

  /**
   * Constructs coorrency page with arguments.
   * This callback is mapped to the path
   * 'coorrency/convert/{from}/{to}'.
   *
   * @param string $from
   *   The base currency.
   * @param string $to
   *   The currency to compare.
   */
  public function convert($from, $to) {
    // Default settings.
    $config = \Drupal::config('coorrency.settings');
    // Page title.
    // The parameter below (coorrency.page_title) come from the YML file:
    // /config/install/coorrency.settings.yml.
    $page_title = $config->get('coorrency.page_title');

    // Page title.
    $element['#title'] = SafeMarkup::checkPlain($page_title);

    // Loading the XML.
    $coorrency_xml = simplexml_load_file('http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%20in%20(%22' . $from . $to . '%22)&env=store://datatables.org/alltableswithkeys');
    $coorrency_rate = (array) $coorrency_xml->results->rate->Rate;

    // Rate value.
    $element['#rate'] = $coorrency_rate[0];

    // Theme function.
    $element['#theme'] = 'coorrency';

    return $element;
  }

}
