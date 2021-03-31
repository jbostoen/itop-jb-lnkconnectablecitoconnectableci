<?php

/**
 * @copyright   Copyright (c) 2019-2021 Jeffrey Bostoen
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2.6.210331
 *
 * iTop module definition file
 */
 
SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'jb-lnkconnectablecitoconnectableci/2.6.210331',
	array(
		// Identification
		//
		'label' => 'Datamodel: IP Devices',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'itop-config-mgmt/2.6.0',
			'itop-endusers-devices/2.6.0'
		),
		'mandatory' => false,
		'visible' => true,
		'installer' => 'LnkConnectableCIToConnectableCIInstaller',

		// Components
		//
		'datamodel' => array(
			'model.jb-lnkconnectablecitoconnectableci.php'
		),
		'webservice' => array(
			
		),
		'data.struct' => array(
			// add your 'structure' definition XML files here,
		),
		'data.sample' => array(
			// add your sample data XML files here,
		),
		
		// Documentation
		//
		'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
		'doc.more_information' => '', // hyperlink to more information, if any 

		// Default settings
		//
		'settings' => array(
			// Module specific settings go here, if any
		),
	)
	
	
	
);



if(!class_exists('LnkConnectableCIToConnectableCIInstaller')) {

	// Module installation handler
	//
	class LnkConnectableCIToConnectableCIInstaller extends ModuleInstallerAPI {
		
		/**
		 * Handler called before creating or upgrading the database schema
		 * @param $oConfiguration Config The new configuration of the application
		 * @param $sPreviousVersion string Previous version number of the module (empty string in case of first install)
		 * @param $sCurrentVersion string Current version number of the module
		 *
		 */
		public static function BeforeDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion) {
			
			if($sPreviousVersion != '' && version_compare($sPreviousVersion, '2.6.210322', '<=')) {
			
				// The connection type of historical links (from initial version in jb-ipdevices) was seen from perspective of networkdevice_id
				self::MoveColumnInDB('lnkConnectableCIToConnectableCI', 'networkdevice_id', 'lnkConnectableCIToConnectableCI', 'device1_id');
				self::MoveColumnInDB('lnkConnectableCIToConnectableCI', 'network_port', 'lnkConnectableCIToConnectableCI', 'device1_port');
				
				self::MoveColumnInDB('lnkConnectableCIToConnectableCI', 'connectableci_id', 'lnkConnectableCIToConnectableCI', 'device2_id');
				self::MoveColumnInDB('lnkConnectableCIToConnectableCI', 'device_port', 'lnkConnectableCIToConnectableCI', 'device2_port');
				
			}
			
		}
		
	}

}
