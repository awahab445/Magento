{"columns":[{"field":"product.entity_id","alias":"id"},{"field":"product.type","alias":"type"},{"field":"status","alias":"status"},{"field":"sku","alias":"sku"},{"field":"name","alias":"name"},{"field":"short_description","alias":"short_description","default_multiselect":"1"},{"field":"description","alias":"description","default_multiselect":"1"},{"field":"price","alias":"price","format":"%.4f"},{"field":"special_price","alias":"special_price","format":"%.4f"},{"field":"special_from_date","alias":"special_from_date","format":"d-m-y H:i"},{"field":"special_to_date","alias":"special_to_date","format":"d-m-y H:i"},{"field":"labels","alias":"labels","default_multiselect":"1","separator":";"},{"field":"category.name","alias":"categories","default_multiselect":"1","separator":";","delimiter":">"},{"field":"const.value","alias":"types","default_multiselect":"1"},{"field":"const.value","alias":"sizes","default_multiselect":"1"},{"field":"const.value","alias":"upsell","default_multiselect":"1"},{"field":"const.value","alias":"category_filter_positions","default_multiselect":"1"},{"field":"const.value","alias":"images","default_multiselect":"1"},{"field":"const.value","alias":"attributes","default_multiselect":"1"},{"field":"zie_materiaal","alias":"attr_zie_materiaal"},{"field":"zie_merk","alias":"attr_zie_merk"},{"field":"zie_kleur","alias":"attr_zie_kleur","default_multiselect":"1","separator":";"},{"field":"zie_voering","alias":"attr_zie_voering"},{"field":"zie_voetwijdte","alias":"attr_zie_voetwijdte"},{"field":"zie_zool","alias":"attr_zie_zool"},{"field":"zie_binnenzool","alias":"attr_zie_binnenzool"},{"field":"zie_hakhoogte_cm","alias":"attr_zie_hakhoogte_cm"},{"field":"zie_schoensoort","alias":"attr_zie_schoensoort"},{"field":"zie_schachtwijdte","alias":"attr_zie_schachtwijdte"}],"options":{"csv":{"delimiter":",","enclosure":"\"","escape":"\\","multivalue_separator":";"},"encoding":{"from":"UTF-8","to":"","illegal_char":""},"log":{"min_level":"SUCCESS"},"remote":{"type":"","host":"","port":"","username":"","password":"","path":""},"export":{"image_files":"0","image_https":"0","invalid_values":"0","internal_values":"0","configurable_qty_as_sum":"0","add_tax":"0","markup":"","skip_out_of_stock":"0","skip_configurable_simples":"0"}},"conditions":{"type":"urapidflow\/rule_condition_combine","attribute":null,"operator":null,"value":"1","is_value_processed":null,"aggregator":"any","conditions":[{"type":"urapidflow\/rule_condition_product","attribute":"type_id","operator":"==","value":["configurable"],"is_value_processed":false},{"type":"urapidflow\/rule_condition_product","attribute":"category_ids","operator":"==","value":"8","is_value_processed":false}]}}