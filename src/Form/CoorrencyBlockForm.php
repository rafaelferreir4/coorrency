<?php

namespace Drupal\coorrency\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Coorrency block form.
 */
class CoorrencyBlockForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'coorrency_block_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['amount'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Amount'),
    ];

    $form['from'] = [
      '#type' => 'select',
      '#title' => $this->t('From'),
      '#options' => $this->_coorrency_get_currencies(),
      '#required' => TRUE,
      '#attached' => [
        'library' => [
          'coorrency/coorrency',
        ],
      ],
    ];

    $form['to'] = [
      '#type' => 'select',
      '#title' => $this->t('To'),
      '#options' => $this->_coorrency_get_currencies(),
      '#required' => TRUE,
    ];

    // Submit.
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Convert'),
    ];

    $form['coorrency'] = [
      '#type' => 'html_tag',
      '#tag' => 'div',
      '#attributes' => [
        'id' => ['coorrency-rate'],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $from = explode(' - ', $form_state->getValue('from'));
    $to = explode(' - ', $form_state->getValue('to'));

    $form_state->setRedirect(
      'coorrency.convert',
      [
        'from' => $from[1],
        'to' => $to[1],
      ]
    );
  }

  /**
   * Function to gather all the available currencies.
   */
  protected function _coorrency_get_currencies() {
    return [
      'Afghanistan - AFN' => 'Afghanistan - AFN',
      'Akrotiri and Dhekelia (UK) - EUR' => 'Akrotiri and Dhekelia (UK) - EUR',
      'Aland Islands (Finland) - EUR' => 'Aland Islands (Finland) - EUR',
      'Albania - ALL' => 'Albania - ALL',
      'Algeria - DZD' => 'Algeria - DZD',
      'American Samoa (USA) - USD' => 'American Samoa (USA) - USD',
      'Andorra - EUR' => 'Andorra - EUR',
      'Angola - AOA' => 'Angola - AOA',
      'Anguilla (UK) - XCD' => 'Anguilla (UK) - XCD',
      'Antigua and Barbuda - XCD' => 'Antigua and Barbuda - XCD',
      'Argentina - ARS' => 'Argentina - ARS',
      'Armenia - AMD' => 'Armenia - AMD',
      'Aruba (Netherlands) - AWG' => 'Aruba (Netherlands) - AWG',
      'Ascension Island (UK) - SHP' => 'Ascension Island (UK) - SHP',
      'Australia - AUD' => 'Australia - AUD',
      'Austria - EUR' => 'Austria - EUR',
      'Azerbaijan - AZN' => 'Azerbaijan - AZN',
      'Bahamas - BSD' => 'Bahamas - BSD',
      'Bahrain - BHD' => 'Bahrain - BHD',
      'Bangladesh - BDT' => 'Bangladesh - BDT',
      'Barbados - BBD' => 'Barbados - BBD',
      'Belarus - BYN' => 'Belarus - BYN',
      'Belgium - EUR' => 'Belgium - EUR',
      'Belize - BZD' => 'Belize - BZD',
      'Benin - XOF' => 'Benin - XOF',
      'Bermuda (UK) - BMD' => 'Bermuda (UK) - BMD',
      'Bhutan - BTN' => 'Bhutan - BTN',
      'Bolivia - BOB' => 'Bolivia - BOB',
      'Bonaire (Netherlands) - USD' => 'Bonaire (Netherlands) - USD',
      'Bosnia and Herzegovina - BAM' => 'Bosnia and Herzegovina - BAM',
      'Botswana - BWP' => 'Botswana - BWP',
      'Brazil - BRL' => 'Brazil - BRL',
      'British Indian Ocean Territory (UK) - USD' => 'British Indian Ocean Territory (UK) - USD',
      'British Virgin Islands (UK) - USD' => 'British Virgin Islands (UK) - USD',
      'Brunei - BND' => 'Brunei - BND',
      'Bulgaria - BGN' => 'Bulgaria - BGN',
      'Burkina Faso - XOF' => 'Burkina Faso - XOF',
      'Burundi - BIF' => 'Burundi - BIF',
      'Cabo Verde - CVE' => 'Cabo Verde - CVE',
      'Cambodia - KHR' => 'Cambodia - KHR',
      'Cameroon - XAF' => 'Cameroon - XAF',
      'Canada - CAD' => 'Canada - CAD',
      'Caribbean Netherlands (Netherlands) - USD' => 'Caribbean Netherlands (Netherlands) - USD',
      'Cayman Islands (UK) - KYD' => 'Cayman Islands (UK) - KYD',
      'Central African Republic - XAF' => 'Central African Republic - XAF',
      'Chad - XAF' => 'Chad - XAF',
      'Chatham Islands (New Zealand) - NZD' => 'Chatham Islands (New Zealand) - NZD',
      'Chile - CLP' => 'Chile - CLP',
      'China - CNY' => 'China - CNY',
      'Christmas Island (Australia) - AUD' => 'Christmas Island (Australia) - AUD',
      'Cocos (Keeling) Islands (Australia) - AUD' => 'Cocos (Keeling) Islands (Australia) - AUD',
      'Colombia - COP' => 'Colombia - COP',
      'Comoros - KMF' => 'Comoros - KMF',
      'Congo, Democratic Republic of the - CDF' => 'Congo, Democratic Republic of the - CDF',
      'Congo, Republic of the - XAF' => 'Congo, Republic of the - XAF',
      'Costa Rica - CRC' => 'Costa Rica - CRC',
      'Cote d\'Ivoire - XOF' => 'Cote d\'Ivoire - XOF',
      'Croatia - HRK' => 'Croatia - HRK',
      'Cuba - CUP' => 'Cuba - CUP',
      'Curacao (Netherlands) - ANG' => 'Curacao (Netherlands) - ANG',
      'Cyprus - EUR' => 'Cyprus - EUR',
      'Czech Republic - CZK' => 'Czech Republic - CZK',
      'Denmark - DKK' => 'Denmark - DKK',
      'Djibouti - DJF' => 'Djibouti - DJF',
      'Dominica - XCD' => 'Dominica - XCD',
      'Dominican Republic - DOP' => 'Dominican Republic - DOP',
      'Ecuador - USD' => 'Ecuador - USD',
      'Egypt - EGP' => 'Egypt - EGP',
      'El Salvador - USD' => 'El Salvador - USD',
      'Equatorial Guinea - XAF' => 'Equatorial Guinea - XAF',
      'Eritrea - ERN' => 'Eritrea - ERN',
      'Estonia - EUR' => 'Estonia - EUR',
      'Ethiopia - ETB' => 'Ethiopia - ETB',
      'Falkland Islands (UK) - FKP' => 'Falkland Islands (UK) - FKP',
      'Faroe Islands (Denmark) - DKK' => 'Faroe Islands (Denmark) - DKK',
      'Fiji - FJD' => 'Fiji - FJD',
      'Finland - EUR' => 'Finland - EUR',
      'France - EUR' => 'France - EUR',
      'French Guiana (France) - EUR' => 'French Guiana (France) - EUR',
      'French Polynesia (France) - XPF' => 'French Polynesia (France) - XPF',
      'Gabon - XAF' => 'Gabon - XAF',
      'Gambia - GMD' => 'Gambia - GMD',
      'Georgia - GEL' => 'Georgia - GEL',
      'Germany - EUR' => 'Germany - EUR',
      'Ghana - GHS' => 'Ghana - GHS',
      'Gibraltar (UK) - GIP' => 'Gibraltar (UK) - GIP',
      'Greece - EUR' => 'Greece - EUR',
      'Greenland (Denmark) - DKK' => 'Greenland (Denmark) - DKK',
      'Grenada - XCD' => 'Grenada - XCD',
      'Guadeloupe (France) - EUR' => 'Guadeloupe (France) - EUR',
      'Guam (USA) - USD' => 'Guam (USA) - USD',
      'Guatemala - GTQ' => 'Guatemala - GTQ',
      'Guernsey (UK) - GGP' => 'Guernsey (UK) - GGP',
      'Guinea - GNF' => 'Guinea - GNF',
      'Guinea-Bissau - XOF' => 'Guinea-Bissau - XOF',
      'Guyana - GYD' => 'Guyana - GYD',
      'Haiti - HTG' => 'Haiti - HTG',
      'Honduras - HNL' => 'Honduras - HNL',
      'Hong Kong (China) - HKD' => 'Hong Kong (China) - HKD',
      'Hungary - HUF' => 'Hungary - HUF',
      'Iceland - ISK' => 'Iceland - ISK',
      'India - INR' => 'India - INR',
      'Indonesia - IDR' => 'Indonesia - IDR',
      'International Monetary Fund (IMF) - XDR' => 'International Monetary Fund (IMF) - XDR',
      'Iran - IRR' => 'Iran - IRR',
      'Iraq - IQD' => 'Iraq - IQD',
      'Ireland - EUR' => 'Ireland - EUR',
      'Isle of Man (UK) - IMP' => 'Isle of Man (UK) - IMP',
      'Israel - ILS' => 'Israel - ILS',
      'Italy - EUR' => 'Italy - EUR',
      'Jamaica - JMD' => 'Jamaica - JMD',
      'Japan - JPY' => 'Japan - JPY',
      'Jersey (UK) - JEP' => 'Jersey (UK) - JEP',
      'Jordan - JOD' => 'Jordan - JOD',
      'Kazakhstan - KZT' => 'Kazakhstan - KZT',
      'Kenya - KES' => 'Kenya - KES',
      'Kiribati - AUD' => 'Kiribati - AUD',
      'Kosovo - EUR' => 'Kosovo - EUR',
      'Kuwait - KWD' => 'Kuwait - KWD',
      'Kyrgyzstan - KGS' => 'Kyrgyzstan - KGS',
      'Laos - LAK' => 'Laos - LAK',
      'Latvia - EUR' => 'Latvia - EUR',
      'Lebanon - LBP' => 'Lebanon - LBP',
      'Lesotho - LSL' => 'Lesotho - LSL',
      'Liberia - LRD' => 'Liberia - LRD',
      'Libya - LYD' => 'Libya - LYD',
      'Liechtenstein - CHF' => 'Liechtenstein - CHF',
      'Lithuania - EUR' => 'Lithuania - EUR',
      'Luxembourg - EUR' => 'Luxembourg - EUR',
      'Macau (China) - MOP' => 'Macau (China) - MOP',
      'Macedonia (FYROM) - MKD' => 'Macedonia (FYROM) - MKD',
      'Madagascar - MGA' => 'Madagascar - MGA',
      'Malawi - MWK' => 'Malawi - MWK',
      'Malaysia - MYR' => 'Malaysia - MYR',
      'Maldives - MVR' => 'Maldives - MVR',
      'Mali - XOF' => 'Mali - XOF',
      'Malta - EUR' => 'Malta - EUR',
      'Marshall Islands - USD' => 'Marshall Islands - USD',
      'Martinique (France) - EUR' => 'Martinique (France) - EUR',
      'Mauritania - MRO' => 'Mauritania - MRO',
      'Mauritius - MUR' => 'Mauritius - MUR',
      'Mayotte (France) - EUR' => 'Mayotte (France) - EUR',
      'Mexico - MXN' => 'Mexico - MXN',
      'Micronesia - USD' => 'Micronesia - USD',
      'Moldova - MDL' => 'Moldova - MDL',
      'Monaco - EUR' => 'Monaco - EUR',
      'Mongolia - MNT' => 'Mongolia - MNT',
      'Montenegro - EUR' => 'Montenegro - EUR',
      'Montserrat (UK) - XCD' => 'Montserrat (UK) - XCD',
      'Morocco - MAD' => 'Morocco - MAD',
      'Mozambique - MZN' => 'Mozambique - MZN',
      'Myanmar (Burma) - MMK' => 'Myanmar (Burma) - MMK',
      'Namibia - NAD' => 'Namibia - NAD',
      'Nauru - AUD' => 'Nauru - AUD',
      'Nepal - NPR' => 'Nepal - NPR',
      'Netherlands - EUR' => 'Netherlands - EUR',
      'New Caledonia (France) - XPF' => 'New Caledonia (France) - XPF',
      'New Zealand - NZD' => 'New Zealand - NZD',
      'Nicaragua - NIO' => 'Nicaragua - NIO',
      'Niger - XOF' => 'Niger - XOF',
      'Nigeria - NGN' => 'Nigeria - NGN',
      'Niue (New Zealand) - NZD' => 'Niue (New Zealand) - NZD',
      'Norfolk Island (Australia) - AUD' => 'Norfolk Island (Australia) - AUD',
      'Northern Mariana Islands (USA) - USD' => 'Northern Mariana Islands (USA) - USD',
      'North Korea - KPW' => 'North Korea - KPW',
      'Norway - NOK' => 'Norway - NOK',
      'Oman - OMR' => 'Oman - OMR',
      'Pakistan - PKR' => 'Pakistan - PKR',
      'Palau - USD' => 'Palau - USD',
      'Palestine - ILS' => 'Palestine - ILS',
      'Panama - USD' => 'Panama - USD',
      'Papua New Guinea - PGK' => 'Papua New Guinea - PGK',
      'Paraguay - PYG' => 'Paraguay - PYG',
      'Peru - PEN' => 'Peru - PEN',
      'Philippines - PHP' => 'Philippines - PHP',
      'Pitcairn Islands (UK) - NZD' => 'Pitcairn Islands (UK) - NZD',
      'Poland - PLN' => 'Poland - PLN',
      'Portugal - EUR' => 'Portugal - EUR',
      'Puerto Rico (USA) - USD' => 'Puerto Rico (USA) - USD',
      'Qatar - QAR' => 'Qatar - QAR',
      'Reunion (France) - EUR' => 'Reunion (France) - EUR',
      'Romania - RON' => 'Romania - RON',
      'Russia - RUB' => 'Russia - RUB',
      'Rwanda - RWF' => 'Rwanda - RWF',
      'Saba (Netherlands) - USD' => 'Saba (Netherlands) - USD',
      'Saint Barthelemy (France) - EUR' => 'Saint Barthelemy (France) - EUR',
      'Saint Helena (UK) - SHP' => 'Saint Helena (UK) - SHP',
      'Saint Kitts and Nevis - XCD' => 'Saint Kitts and Nevis - XCD',
      'Saint Lucia - XCD' => 'Saint Lucia - XCD',
      'Saint Martin (France) - EUR' => 'Saint Martin (France) - EUR',
      'Saint Pierre and Miquelon (France) - EUR' => 'Saint Pierre and Miquelon (France) - EUR',
      'Saint Vincent and the Grenadines - XCD' => 'Saint Vincent and the Grenadines - XCD',
      'Samoa - WST' => 'Samoa - WST',
      'San Marino - EUR' => 'San Marino - EUR',
      'Sao Tome and Principe - STD' => 'Sao Tome and Principe - STD',
      'Saudi Arabia - SAR' => 'Saudi Arabia - SAR',
      'Senegal - XOF' => 'Senegal - XOF',
      'Serbia - RSD' => 'Serbia - RSD',
      'Seychelles - SCR' => 'Seychelles - SCR',
      'Sierra Leone - SLL' => 'Sierra Leone - SLL',
      'Singapore - SGD' => 'Singapore - SGD',
      'Sint Eustatius (Netherlands) - USD' => 'Sint Eustatius (Netherlands) - USD',
      'Sint Maarten (Netherlands) - ANG' => 'Sint Maarten (Netherlands) - ANG',
      'Slovakia - EUR' => 'Slovakia - EUR',
      'Slovenia - EUR' => 'Slovenia - EUR',
      'Solomon Islands - SBD' => 'Solomon Islands - SBD',
      'Somalia - SOS' => 'Somalia - SOS',
      'South Africa - ZAR' => 'South Africa - ZAR',
      'South Georgia Island (UK) - GBP' => 'South Georgia Island (UK) - GBP',
      'South Korea - KRW' => 'South Korea - KRW',
      'South Sudan - SSP' => 'South Sudan - SSP',
      'Spain - EUR' => 'Spain - EUR',
      'Sri Lanka - LKR' => 'Sri Lanka - LKR',
      'Sudan - SDG' => 'Sudan - SDG',
      'Suriname - SRD' => 'Suriname - SRD',
      'Svalbard and Jan Mayen (Norway) - NOK' => 'Svalbard and Jan Mayen (Norway) - NOK',
      'Swaziland - SZL' => 'Swaziland - SZL',
      'Sweden - SEK' => 'Sweden - SEK',
      'Switzerland - CHF' => 'Switzerland - CHF',
      'Syria - SYP' => 'Syria - SYP',
      'Taiwan - TWD' => 'Taiwan - TWD',
      'Tajikistan - TJS' => 'Tajikistan - TJS',
      'Tanzania - TZS' => 'Tanzania - TZS',
      'Thailand - THB' => 'Thailand - THB',
      'Timor-Leste - USD' => 'Timor-Leste - USD',
      'Togo - XOF' => 'Togo - XOF',
      'Tokelau (New Zealand) - NZD' => 'Tokelau (New Zealand) - NZD',
      'Tonga - TOP' => 'Tonga - TOP',
      'Trinidad and Tobago - TTD' => 'Trinidad and Tobago - TTD',
      'Tristan da Cunha (UK) - GBP' => 'Tristan da Cunha (UK) - GBP',
      'Tunisia - TND' => 'Tunisia - TND',
      'Turkey - TRY' => 'Turkey - TRY',
      'Turkmenistan - TMT' => 'Turkmenistan - TMT',
      'Turks and Caicos Islands (UK) - USD' => 'Turks and Caicos Islands (UK) - USD',
      'Tuvalu - AUD' => 'Tuvalu - AUD',
      'Uganda - UGX' => 'Uganda - UGX',
      'Ukraine - UAH' => 'Ukraine - UAH',
      'United Arab Emirates - AED' => 'United Arab Emirates - AED',
      'United Kingdom - GBP' => 'United Kingdom - GBP',
      'United States of America - USD' => 'United States of America - USD',
      'Uruguay - UYU' => 'Uruguay - UYU',
      'US Virgin Islands (USA) - USD' => 'US Virgin Islands (USA) - USD',
      'Uzbekistan - UZS' => 'Uzbekistan - UZS',
      'Vanuatu - VUV' => 'Vanuatu - VUV',
      'Vatican City (Holy See) - EUR' => 'Vatican City (Holy See) - EUR',
      'Venezuela - VEF' => 'Venezuela - VEF',
      'Vietnam - VND' => 'Vietnam - VND',
      'Wake Island (USA) - USD' => 'Wake Island (USA) - USD',
      'Wallis and Futuna (France) - XPF' => 'Wallis and Futuna (France) - XPF',
      'Yemen - YER' => 'Yemen - YER',
      'Zambia - ZMW' => 'Zambia - ZMW',
    ];
  }

}
