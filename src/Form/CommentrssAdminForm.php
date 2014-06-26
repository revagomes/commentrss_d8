<?php

/**
 * @file
 * Contains \Drupal\commentrss\Form\CommentrssAdminForm.
 */

namespace Drupal\commentrss\Form;

use Drupal\Core\Form\ConfigFormBase;
// use Drupal\Core\Routing\UrlGeneratorInterface;

/**
 * Configure Comment RSS settings.
 */
class CommentrssAdminForm extends ConfigFormBase {

  /**
   * The urlGenerator service.
   *
   * @var \Drupal\Core\Routing\UrlGeneratorInterface
   */
  protected $urlGenerator;

  /**
   * Constructs a new CommentRssConfigForm object.
   *
   * @param \Drupal\Core\Routing\UrlGeneratorInterface $url_generator
   *   The url generator service.
   */
  // TODO: make it work with UrlGeneratorInterface (services.yml alredy implemented)
  // public function __construct(UrlGeneratorInterface $url_generator) {
  //   $this->urlGenerator = $url_generator;
  // }

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'commentrss_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {

    $config = \Drupal::config('commentrss.settings');

    $form['site'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Enable aggregated feed for comments on all content on the entire website, and expose on pages'),
      '#options' => array(
        COMMENTRSS_SITE_DISABLED => $this->t('Disabled'),
        COMMENTRSS_SITE_FRONT_PAGE => $this->t('Enabled, expose only on front page'),
        COMMENTRSS_SITE_FRONT_AND_NODE_PAGE => t('Enabled, expose on front page and <a href="@url">default content listing</a> page', array('@url' => url('node'))),
        COMMENTRSS_SITE_ALL_PAGES => $this->t('Enabled, expose on all pages'),
      ),
      '#description' => $this->t('Where should the site comment feed be exposed, if at all enabled. If enabled, feed will be accessible at @url.', array('@url' => url('crss', array('absolute' => TRUE)))),
      '#default_value' => $config->get('site'),
    );
    $form['node'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Enable individual comment feeds for each post on the website'),
      '#description' => $this->t('Feeds will be accessible on @url type of URLs.', array('@url' => url('crss/node/...', array('absolute' => TRUE)))),
      '#default_value' => $config->get('node'),
    );
    $form['term'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Enable individual comment feeds for each taxonomy term listing on the website'),
      '#description' => $this->t('Feeds will be accessible at @url type of URLs. Only supports one term, no composition.', array('@url' => url('crss/term/...', array('absolute' => TRUE)))),
      '#default_value' => $config->get('term'),
      '#access' => FALSE,
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {

    $config = \Drupal::config('commentrss.settings');
    $values = $form_state['values'];
    $entries = array();

    // Stores all the form values.
    foreach ($values as $key => $value) {
      $entries[$key] = $value;
    }

    // Adds the new settings to the config values.
    foreach ($entries as $key => $value) {
      if (isset($value)) {
        $config->set($key, $value);
      }
    }

    // Save the submitted entries.
    $config->save();

    parent::submitForm($form, $form_state);
  }
}
