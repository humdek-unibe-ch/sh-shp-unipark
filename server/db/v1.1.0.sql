-- update plugin version
UPDATE `plugins`
SET version = 'v1.1.0'
WHERE `name` = 'unipark';

-- delete field `jquery_builder_json`
DELETE FROM `fields`
WHERE `name` = 'jquery_builder_json';