-- add plugin entry in the plugin table
INSERT IGNORE INTO plugins (name, version) 
VALUES ('unipark', 'v1.0.0');

-- Add new style QualtricsSurvey
INSERT IGNORE INTO `styles` (`name`, `id_type`, id_group, description) VALUES ('uniparkSurvey', '2', (select id from styleGroup where `name` = 'Form' limit 1), 'Visualize a Unipark survey. It is shown in iFrame.');

INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`)
VALUES (get_style_id('uniparkSurvey'), get_field_id('css'), '', 'Allows to assign CSS classes to the root item of the style.');

INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`)
VALUES (get_style_id('uniparkSurvey'), get_field_id('css_mobile'), '', 'Allows to assign `mobile` CSS classes to the root item of the style.');

INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`) 
VALUES (get_style_id('uniparkSurvey'), get_field_id('condition'), '', 'The field `condition` allows to specify a condition. Note that the field `condition` is of type `json` and requires\n1. valid json syntax (see https://www.json.org/)\n2. a valid condition structure (see https://github.com/jwadhams/json-logic-php/)\n\nOnly if a condition resolves to true the sections added to the field `children` will be rendered.\n\nIn order to refer to a form-field use the syntax `"@__form_name__#__from_field_name__"` (the quotes are necessary to make it valid json syntax) where `__form_name__` is the value of the field `name` of the style `formUserInput` and `__form_field_name__` is the value of the field `name` of any form-field style.');

INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`, `hidden`) 
VALUES (get_style_id('uniparkSurvey'), get_field_id('jquery_builder_json'), '', 'This field contains the JSON structure for the jquery builder. The field should be hidden', 1);

INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`)
VALUES (get_style_id('uniparkSurvey'), get_field_id('css'), '', 'Allows to assign CSS classes to the root item of the style.');

INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`) 
VALUES (get_style_id('uniparkSurvey'), get_field_id('data_config'), '', 'In this ***JSON*** field we can configure a data retrieve params from the DB, either `static` or `dynamic` data. Example: 
   ```
   [
  	{
  		"type": "static|dynamic",
  		"table": "table_name | #url_param1",
 		"retrieve": "first | last | all",
  		"fields": [
  			{
  				"field_name": "name | #url_param2",
  				"field_holder": "@field_1",
  				"not_found_text": "my field was not found"				
  			}
  		]
  	}
  ]
  ```
  If the page supports parameters, then the parameter can be accessed with `#` and the name of the paramer. Example `#url_param_name`. 
  
  In order to inlcude the retrieved data in the markdown field, include the `field_holder` that wa defined in the markdown text.
  
  We can access multiple tables by adding another element to the array. The retrieve data from the column can be: `first` entry, `last` entry or `all` entries (concatenated with ;)');
  
INSERT IGNORE INTO `fields` (`id`, `name`, `id_type`, `display`) VALUES (NULL, 'table_name', get_field_type_id('text'), '0');
  
INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`)
VALUES (get_style_id('uniparkSurvey'), get_field_id('table_name'), '', 'Set the name of the table where we want to save some incoming data from the Unipark Survey');

INSERT IGNORE INTO `styles_fields` (`id_styles`, `id_fields`, `default_value`, `help`)
VALUES (get_style_id('uniparkSurvey'), get_field_id('url'), '', 'Set the `url` of the Unipark survey');

-- register hook get_csp_rules
INSERT IGNORE INTO `hooks` (`id_hookTypes`, `name`, `description`, `class`, `function`, `exec_class`, `exec_function`) VALUES ((SELECT id FROM lookups WHERE lookup_code = 'hook_overwrite_return' LIMIT 0,1), 'unipark-addCspRule', 'Add csp rule for Unipark iframe', 'BasePage', 'getCspRules', 'UniparkHooks', 'setCspRules');

INSERT IGNORE INTO lookups (type_code, lookup_code, lookup_value, lookup_description) values ('transactionBy', 'by_unipark_survey', 'By Unipark survey', 'The action was done by an Unipark survey');
