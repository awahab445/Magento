<?php
class Kega_Store_Model_Resource_Eav_Mysql4_Setup extends Mage_Eav_Model_Entity_Setup
{
	
	/**
	 * @return array
	 */
	public function getDefaultEntities()
    {
		return array(
			'store' => array(
				'entity_model'          =>'store/store',
				'attribute_model'   	=> 'store/resource_eav_attribute',
				'table'                 => 'store/entity',
//				'increment_model'       => 'eav/entity_increment_numeric',
//				'increment_per_store'   => false,
				'attributes' => array(
					'name' => array(
						'type'          => 'varchar',
						'label'         => 'Title',
						'required'      => true,
						'user_defined'  => true,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'sort_order'    => 10,
					),
					'address' => array(
						'type'          => 'varchar',
						'label'         => 'Address',
						'default'       => '',
						'required'      => true,
						'user_defined'  => true,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'sort_order'    => 20,
					),
					'district' => array(
						'type'          => 'varchar',
						'label'         => 'District',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'sort_order'    => 30,
					),
					'city' => array(
						'type'          => 'varchar',
						'label'         => 'City',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'sort_order'    => 40,
					),
					'state' => array(
						'type'          => 'varchar',
						'label'         => 'State',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'sort_order'    => 50,
					),
					'zipcode' => array(
						'type'          => 'varchar',
						'label'         => 'Zipcode',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 60,
					),
					'phone' => array(
						'type'          => 'varchar',
						'label'         => 'Phone',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 70,
					),
					'fax' => array(
						'label'         => 'Fax',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 80,
					),
					'email' => array(
						'label'         => 'Email',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 90,
					),
					'lng' => array(
						'type'          => 'varchar',
						'label'         => 'Google Lng',
						'default'       => '',
						'required'      => true,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 91,
					),
					'lat' => array(
						'type'          => 'varchar',
						'label'         => 'Google Lat',
						'default'       => '',
						'required'      => true,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 92,
					),
					'hours' => array(
						'type'          => 'varchar',
						'label'         => 'Hours',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 93,
					),
					'website_url' => array(
						'label'         => 'Website url',
						'default'       => '',
						'required'      => false,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 100,
					),
					'custom_url' => array(
						'label'         => 'Custom url',
						'default'       => '',
						'required'      => true,
						'user_defined'  => false,
						'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
						'sort_order'    => 110,
						'unique'        => true
					),
					'description' => array(
                        'type'              => 'text',
                        'label'             => 'Description',
                        'input'             => 'textarea',
                        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                        'visible'           => true,
                        'required'          => false,
                        'user_defined'      => false,
                        'default'           => '',
                        'searchable'        => false,
                        'filterable'        => false,
                        'comparable'        => false,
                        'unique'            => false,
                    ),
                    'is_active' => array(
                        'type'              => 'int',
                        'backend'           => '',
                        'frontend'          => '',
                        'label'             => 'Is Active',
                        'input'             => 'select',
                        'class'             => '',
                        'source'            => 'eav/entity_attribute_source_boolean',
                        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                        'visible'           => true,
                        'required'          => false,
                        'user_defined'      => false,
                        'default'           => '1',
                        'searchable'        => false,
                        'filterable'        => false,
                        'comparable'        => false,
                        'visible_on_front'  => false,
                        'unique'            => false,
                    ),
				),
			),
		);
	}
}