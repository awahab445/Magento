<?php

$installer = $this;

$installer->startSetup();

$installer->run("

CREATE TABLE {$this->getTable('vacancy/vacancy_store')} (
  `vacancy_id` smallint(6) NOT NULL default '0',
  `store_id` smallint(5) NOT NULL default '0',
  PRIMARY KEY (`vacancy_id`,`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 