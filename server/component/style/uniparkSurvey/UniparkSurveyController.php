<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/. */
?>
<?php
require_once __DIR__ . "/../../../../../../component/BaseController.php";
/**
 * The controller class of the chat component.
 */
class UniparkSurveyController extends BaseController
{
    /* Constructors ***********************************************************/

    /**
     * The constructor
     *
     * @param object $model
     *  The model instance of the component.
     */
    public function __construct($model)
    {
        parent::__construct($model);
        if(isset($_POST['method']) && isset($_POST['data']))
        {
            $this->model->save_data($_POST['data']);
        }
    }
}
?>
