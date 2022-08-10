<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/. */
?>
<?php
require_once __DIR__ . "/../../../../../../component/BaseComponent.php";
require_once __DIR__ . "/UniparkSurveyView.php";
require_once __DIR__ . "/UniparkSurveyModel.php";
require_once __DIR__ . "/UniparkSurveyController.php";

/**
 * The class to define the asset select component.
 */
class UniparkSurveyComponent extends BaseComponent
{
    /* Constructors ***********************************************************/

    /**
     * The constructor creates an instance of the Model class and the View
     * class and passes them to the constructor of the parent class.
     *
     * @param array $services
     *  An associative array holding the different available services. See the
     *  class definition BasePage for a list of all services.
     * @param int $id
     *  The id of the section to which this style is assigned.
     * @param array $params
     *  The list of get parameters to propagate.
     * @param number $id_page
     *  The id of the parent page
     * @param array $entry_record
     *  An array that contains the entry record information.
     */
    public function __construct($services, $id, $params, $id_page, $entry_record)
    {
        $model = new UniparkSurveyModel($services, $id, $params, $id_page, $entry_record);
        $controller = new UniparkSurveyController($model);
        $view = new UniparkSurveyView($model, $controller);        
        parent::__construct($model, $view, $controller);
    }
}
?>
