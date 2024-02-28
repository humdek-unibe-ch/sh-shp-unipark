<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/. */
?>
<?php
require_once __DIR__ . "/../../../../../../component/style/StyleView.php";

/**
 * The view class of the asset select component.
 */
class UniparkSurveyView extends StyleView
{

    /* Private Properties *****************************************************/

    /**
     * The url of the Unipark survey that will be used in the iFrame
     */
    private $url;


    /* Constructors ***********************************************************/

    /**
     * The constructor.
     *
     * @param object $model
     *  The model instance of the component.
     */
    public function __construct($model)
    {
        parent::__construct($model);
        $this->url = $this->model->get_db_field('url', '');
    }

    /* Private Methods ********************************************************/


    /* Public Methods *********************************************************/

    /**
     * Render the footer view.
     */
    public function output_content()
    {
        if (!$this->model->get_data_saved()) {
            require __DIR__ . "/tpl_uniparkSurvey_iframe.php";
        }
    }

    /**
     * Get js include files required for this component. This overrides the
     * parent implementation.
     *
     * @retval array
     *  An array of js include files the component requires.
     */
    public function get_js_includes($local = array())
    {
        if (empty($local)) {
            if (DEBUG) {
                $local = array(__DIR__ . "/js/iframeResizer.min.js", __DIR__ . "/js/uniparkSurvey.js");
            } else {
                $local = array(__DIR__ . "/../../../../js/ext/unipark.min.js?v=" . rtrim(shell_exec("git describe --tags")));
            }
        }
        return parent::get_js_includes($local);
    }

    /**
     * Get css include files required for this component. This overrides the
     * parent implementation.
     *
     * @retval array
     *  An array of css include files the component requires.
     */
    public function get_css_includes($local = array())
    {
        if (empty($local)) {
            if (DEBUG) {
                $local = array(__DIR__ . "/css/uniparkSurvey.css");
            } else {
                $local = array(__DIR__ . "/../../../../css/ext/unipark.min.css?v=" . rtrim(shell_exec("git describe --tags")));
            }
        }
        return parent::get_css_includes($local);
    }
}
?>
