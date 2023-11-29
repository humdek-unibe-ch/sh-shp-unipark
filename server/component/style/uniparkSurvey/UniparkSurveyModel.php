<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/. */
?>
<?php
require_once __DIR__ . "/../../../../../../component/style/StyleModel.php";
/**
 * This class is used to prepare all data related to the cmsPreference component such
 * that the data can easily be displayed in the view of the component.
 */
class UniparkSurveyModel extends StyleModel
{
    /* Private Properties *****************************************************/

    /**
     * Flag if the data was saved. 
     */
    private $data_saved = false;

    /**
     * The teable name where the data will be saved
     */
    private $table_name;



    /* Constructors ***********************************************************/

    /**
     * The constructor fetches all profile related fields from the database.
     *
     * @param array $services
     *  An associative array holding the different available services. See the
     *  class definition basepage for a list of all services.
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
        parent::__construct($services, $id, $params, $id_page, $entry_record);
        $this->table_name = $this->get_db_field('table_name', $this->section_name);
    }

    /* Private Methods *********************************************************/


    /* Public Methods *********************************************************/

    /**
     * Save the data
     * @param array $data
     * The data that will be saved
     * @return array
     * Return the result
     */
    public function save_data($data){
        $res = $this->user_input->save_external_data(transactionBy_by_unipark_survey, $this->table_name, $data);
        $this->data_saved = $res['res'];
    }

    /**
     * Getter - get data_Saved proeprty
     * @return boolean;
     * Return true if the data was saved
     */
    public function get_data_saved(){
        return $this->data_saved;
    }

    
}
