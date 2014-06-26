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

} 