<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('acquisition', "create table if not exists `acquisition` (   `id` INT unsigned not null auto_increment , primary key (`id`), `call_back` VARCHAR(40) , `seller_name` VARCHAR(40) not null , unique(`seller_name`), `phone` VARCHAR(40) not null , `purchase_notes` TEXT , `priority` VARCHAR(40) not null default 'Normal' , `location_city` VARCHAR(150) , `location_state` TEXT , `pickup_date` DATE , `pickup_time` TIME , `street_address` VARCHAR(200) , `category` VARCHAR(40) not null , `ref_listing` VARCHAR(40) , `photo_1` VARCHAR(40) , `photo_2` VARCHAR(40) , `photo_3` VARCHAR(40) , `photo_4` VARCHAR(40) , `photo_5` VARCHAR(40) , `photo_6` VARCHAR(40) ) CHARSET utf8", $silent);
		setupTable('inventory', "create table if not exists `inventory` (   `id` INT unsigned not null auto_increment , primary key (`id`), `item` VARCHAR(40) , `status` VARCHAR(40) , `description` TEXT , `item_cost` DECIMAL(10,2) default '0.00' , `price_high` DECIMAL(10,2) default '0.00' , `price_low` DECIMAL(10,2) default '0.00' , `item_number` VARCHAR(40) , `ref_listing` VARCHAR(40) , `inventory_photo` VARCHAR(40) , `last_update` BLOB , `location` INT(6) ) CHARSET utf8", $silent);
		setupTable('repairs', "create table if not exists `repairs` (   `id` INT unsigned not null auto_increment , primary key (`id`), `repair_status` VARCHAR(40) not null , `item` INT unsigned , `perform` TEXT , `repair_notes` TEXT , `cost` DECIMAL(10,2) default '0.00' , `batch_number` VARCHAR(40) not null , `photo_1` VARCHAR(40) , `photo_2` VARCHAR(40) , `last_update` BLOB ) CHARSET utf8", $silent);
		setupIndexes('repairs', array('item'));
		setupTable('shipping', "create table if not exists `shipping` (   `id` INT unsigned not null auto_increment , primary key (`id`), `register_id` INT unsigned , `client_name` INT unsigned , `phone` INT unsigned , `email` INT unsigned , `company` VARCHAR(40) , `shipping_gateway` VARCHAR(40) not null , `street_address` VARCHAR(200) not null , `city` VARCHAR(40) not null , `state` VARCHAR(40) not null , `zip` VARCHAR(40) not null , `country` VARCHAR(40) not null , `ship_width` VARCHAR(40) , `ship_length` VARCHAR(40) , `ship_height` VARCHAR(40) , `distance_unit` VARCHAR(40) , `ship_weight` VARCHAR(40) , `ship_mass_unit` VARCHAR(40) default 'lb' , `tracking_number` VARCHAR(60) ) CHARSET utf8", $silent);
		setupIndexes('shipping', array('register_id'));
		setupTable('register', "create table if not exists `register` (   `id` INT unsigned not null auto_increment , primary key (`id`), `client_name` VARCHAR(40) not null , `seller` INT unsigned , `date` DATETIME , `phone` VARCHAR(40) , `email` VARCHAR(80) ) CHARSET utf8", $silent);
		setupIndexes('register', array('seller'));
		setupTable('expenses', "create table if not exists `expenses` (   `id` INT unsigned not null auto_increment , primary key (`id`), `category` VARCHAR(40) not null , `account` VARCHAR(40) not null , `price` DECIMAL(10,2) not null default '0.00' , `decription` TEXT , `date` DATE not null , `from_account` VARCHAR(40) not null , `account_detail` TINYBLOB , `check_number` VARCHAR(40) , `photo` VARCHAR(40) ) CHARSET utf8", $silent);
		setupTable('employees', "create table if not exists `employees` (   `id` INT unsigned not null auto_increment , primary key (`id`), `first` VARCHAR(40) , `last` VARCHAR(40) , `street_addr` VARCHAR(200) , `city` VARCHAR(40) , `state` VARCHAR(40) , `hire_date` DATE , `notes` TEXT , `last_update` BLOB ) CHARSET utf8", $silent);
		setupTable('register_items', "create table if not exists `register_items` (   `id` INT unsigned not null auto_increment , primary key (`id`), `previous_order` INT unsigned , `item_name` INT unsigned , `cost` INT unsigned default '0.00' , `ref_img` INT unsigned ) CHARSET utf8", $silent);
		setupIndexes('register_items', array('previous_order','item_name'));


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>