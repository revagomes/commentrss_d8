<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 6/26/14
 * Time: 1:54 PM
 */

namespace Drupal\commentrss\Form;

use Drupal\Core\Form\ConfigFormBase;

class CommentrssAdminForm extends ConfigFormBase {

    public function getFormId() {

        return 'commentrss_admin_form';
    }

    public function buildForm(array $form, array &$form_state) {

        $form['commentrss_site'] = array(
            '#type' => 'radios',
            '#title' => $this->t('Enable aggregated feed for comments on all content on the entire website, and expose on pages'),
            '#options' => array(
                COMMENTRSS_SITE_DISABLED => t('Disabled'),
                COMMENTRSS_SITE_FRONT_PAGE => t('Enabled, expose only on front page'),
                COMMENTRSS_SITE_FRONT_AND_NODE_PAGE => $this->t('Enabled, expose on front page and <a href="@url">default content listing</a> page', array('@url' => url('node'))),
                COMMENTRSS_SITE_ALL_PAGES => t('Enabled, expose on all pages'),
            ),
            '#description' => $this->t('Where should the site comment feed be exposed, if at all enabled. If enabled, feed will be accessible at @url.', array('@url' => url('crss', array('absolute' => TRUE)))),
            '#default_value' => \Drupal::config('commentrss.settings')->get('site'),
        );
        $form['commentrss_node'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Enable individual comment feeds for each post on the website'),
            '#description' => $this->t('Feeds will be accessible on @url type of URLs.', array('@url' => url('crss/node/...', array('absolute' => TRUE)))),
            '#default_value' => \Drupal::config('commentrss.settings')->get('node'),
        );
        $form['commentrss_term'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Enable individual comment feeds for each taxonomy term listing on the website'),
            '#description' => $this->t('Feeds will be accessible at @url type of URLs. Only supports one term, no composition.', array('@url' => url('crss/term/...', array('absolute' => TRUE)))),
            '#default_value' => \Drupal::config('commentrss.settings')->get('term'),
            '#access' => FALSE,
        );

        return $form;
    }


} 