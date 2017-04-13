<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");
	include("{$currDir}/incHeader.php");

	/* application schema as created in AppGini */
	$schema = array(   
		'acquisition' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'call_back' => array('appgini' => 'VARCHAR(40) '),
			'seller_name' => array('appgini' => 'VARCHAR(40) not null unique '),
			'phone' => array('appgini' => 'VARCHAR(40) not null '),
			'purchase_notes' => array('appgini' => 'TEXT '),
			'priority' => array('appgini' => 'VARCHAR(40) not null default \'Normal\' '),
			'location_city' => array('appgini' => 'VARCHAR(150) '),
			'location_state' => array('appgini' => 'TEXT '),
			'pickup_date' => array('appgini' => 'DATE '),
			'pickup_time' => array('appgini' => 'TIME '),
			'street_address' => array('appgini' => 'VARCHAR(200) '),
			'category' => array('appgini' => 'VARCHAR(40) not null '),
			'ref_listing' => array('appgini' => 'VARCHAR(40) '),
			'photo_1' => array('appgini' => 'VARCHAR(40) '),
			'photo_2' => array('appgini' => 'VARCHAR(40) '),
			'photo_3' => array('appgini' => 'VARCHAR(40) '),
			'photo_4' => array('appgini' => 'VARCHAR(40) '),
			'photo_5' => array('appgini' => 'VARCHAR(40) '),
			'photo_6' => array('appgini' => 'VARCHAR(40) ')
		),
		'inventory' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'item' => array('appgini' => 'VARCHAR(40) '),
			'status' => array('appgini' => 'VARCHAR(40) '),
			'description' => array('appgini' => 'TEXT '),
			'item_cost' => array('appgini' => 'DECIMAL(10,2) default \'0.00\' '),
			'price_high' => array('appgini' => 'DECIMAL(10,2) default \'0.00\' '),
			'price_low' => array('appgini' => 'DECIMAL(10,2) default \'0.00\' '),
			'item_number' => array('appgini' => 'VARCHAR(40) '),
			'ref_listing' => array('appgini' => 'VARCHAR(40) '),
			'inventory_photo' => array('appgini' => 'VARCHAR(40) '),
			'last_update' => array('appgini' => 'BLOB '),
			'location' => array('appgini' => 'INT(6) ')
		),
		'repairs' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'repair_status' => array('appgini' => 'VARCHAR(40) not null '),
			'item' => array('appgini' => 'INT unsigned '),
			'perform' => array('appgini' => 'TEXT '),
			'repair_notes' => array('appgini' => 'TEXT '),
			'cost' => array('appgini' => 'DECIMAL(10,2) default \'0.00\' '),
			'batch_number' => array('appgini' => 'VARCHAR(40) not null '),
			'photo_1' => array('appgini' => 'VARCHAR(40) '),
			'photo_2' => array('appgini' => 'VARCHAR(40) '),
			'last_update' => array('appgini' => 'BLOB ')
		),
		'shipping' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'register_id' => array('appgini' => 'INT unsigned '),
			'client_name' => array('appgini' => 'INT unsigned '),
			'phone' => array('appgini' => 'INT unsigned '),
			'email' => array('appgini' => 'INT unsigned '),
			'company' => array('appgini' => 'VARCHAR(40) '),
			'shipping_gateway' => array('appgini' => 'VARCHAR(40) not null '),
			'street_address' => array('appgini' => 'VARCHAR(200) not null '),
			'city' => array('appgini' => 'VARCHAR(40) not null '),
			'state' => array('appgini' => 'VARCHAR(40) not null '),
			'zip' => array('appgini' => 'VARCHAR(40) not null '),
			'country' => array('appgini' => 'VARCHAR(40) not null '),
			'ship_width' => array('appgini' => 'VARCHAR(40) '),
			'ship_length' => array('appgini' => 'VARCHAR(40) '),
			'ship_height' => array('appgini' => 'VARCHAR(40) '),
			'distance_unit' => array('appgini' => 'VARCHAR(40) '),
			'ship_weight' => array('appgini' => 'VARCHAR(40) '),
			'ship_mass_unit' => array('appgini' => 'VARCHAR(40) default \'lb\' '),
			'tracking_number' => array('appgini' => 'VARCHAR(60) ')
		),
		'register' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'client_name' => array('appgini' => 'VARCHAR(40) not null '),
			'seller' => array('appgini' => 'INT unsigned '),
			'date' => array('appgini' => 'DATETIME '),
			'phone' => array('appgini' => 'VARCHAR(40) '),
			'email' => array('appgini' => 'VARCHAR(80) ')
		),
		'expenses' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'category' => array('appgini' => 'VARCHAR(40) not null '),
			'account' => array('appgini' => 'VARCHAR(40) not null '),
			'price' => array('appgini' => 'DECIMAL(10,2) not null default \'0.00\' '),
			'decription' => array('appgini' => 'TEXT '),
			'date' => array('appgini' => 'DATE not null '),
			'from_account' => array('appgini' => 'VARCHAR(40) not null '),
			'account_detail' => array('appgini' => 'TINYBLOB '),
			'check_number' => array('appgini' => 'VARCHAR(40) '),
			'photo' => array('appgini' => 'VARCHAR(40) ')
		),
		'employees' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'first' => array('appgini' => 'VARCHAR(40) '),
			'last' => array('appgini' => 'VARCHAR(40) '),
			'street_addr' => array('appgini' => 'VARCHAR(200) '),
			'city' => array('appgini' => 'VARCHAR(40) '),
			'state' => array('appgini' => 'VARCHAR(40) '),
			'hire_date' => array('appgini' => 'DATE '),
			'notes' => array('appgini' => 'TEXT '),
			'last_update' => array('appgini' => 'BLOB ')
		),
		'register_items' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'previous_order' => array('appgini' => 'INT unsigned '),
			'item_name' => array('appgini' => 'INT unsigned '),
			'cost' => array('appgini' => 'INT unsigned default \'0.00\' '),
			'ref_img' => array('appgini' => 'INT unsigned ')
		)
	);

	$table_captions = getTableList();

	/* function for preparing field definition for comparison */
	function prepare_def($def){
		$def = trim($def);
		$def = strtolower($def);

		/* ignore length for int data types */
		$def = preg_replace('/int\w*\([0-9]+\)/', 'int', $def);

		/* make sure there is always a space before mysql words */
		$def = preg_replace('/(\S)(unsigned|not null|binary|zerofill|auto_increment|default)/', '$1 $2', $def);

		/* treat 0.000.. same as 0 */
		$def = preg_replace('/([0-9])*\.0+/', '$1', $def);

		/* treat unsigned zerofill same as zerofill */
		$def = str_ireplace('unsigned zerofill', 'zerofill', $def);

		/* ignore zero-padding for date data types */
		$def = preg_replace("/date\s*default\s*'([0-9]{4})-0?([1-9])-0?([1-9])'/i", "date default '$1-$2-$3'", $def);

		return $def;
	}

	/* process requested fixes */
	$fix_table = (isset($_GET['t']) ? $_GET['t'] : false);
	$fix_field = (isset($_GET['f']) ? $_GET['f'] : false);

	if($fix_table && $fix_field && isset($schema[$fix_table][$fix_field])){
		$field_added = $field_updated = false;

		// field exists?
		$res = sql("show columns from `{$fix_table}` like '{$fix_field}'", $eo);
		if($row = db_fetch_assoc($res)){
			// modify field
			$qry = "alter table `{$fix_table}` modify `{$fix_field}` {$schema[$fix_table][$fix_field]['appgini']}";
			sql($qry, $eo);
			$field_updated = true;
		}else{
			// create field
			$qry = "alter table `{$fix_table}` add column `{$fix_field}` {$schema[$fix_table][$fix_field]['appgini']}";
			sql($qry, $eo);
			$field_added = true;
		}
	}

	foreach($table_captions as $tn => $tc){
		$eo['silentErrors'] = true;
		$res = sql("show columns from `{$tn}`", $eo);
		if($res){
			while($row = db_fetch_assoc($res)){
				if(!isset($schema[$tn][$row['Field']]['appgini'])) continue;
				$field_description = strtoupper(str_replace(' ', '', $row['Type']));
				$field_description = str_ireplace('unsigned', ' unsigned', $field_description);
				$field_description = str_ireplace('zerofill', ' zerofill', $field_description);
				$field_description = str_ireplace('binary', ' binary', $field_description);
				$field_description .= ($row['Null'] == 'NO' ? ' not null' : '');
				$field_description .= ($row['Key'] == 'PRI' ? ' primary key' : '');
				$field_description .= ($row['Key'] == 'UNI' ? ' unique' : '');
				$field_description .= ($row['Default'] != '' ? " default '" . makeSafe($row['Default']) . "'" : '');
				$field_description .= ($row['Extra'] == 'auto_increment' ? ' auto_increment' : '');

				$schema[$tn][$row['Field']]['db'] = '';
				if(isset($schema[$tn][$row['Field']])){
					$schema[$tn][$row['Field']]['db'] = $field_description;
				}
			}
		}
	}
?>

<?php if($field_added || $field_updated){ ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<i class="glyphicon glyphicon-info-sign"></i>
		<?php 
			$originalValues =  array ('<ACTION>','<FIELD>' , '<TABLE>' , '<QUERY>' );
			$action = ($field_added ? 'create' : 'update');
			$replaceValues = array ( $action , $fix_field , $fix_table , $qry );
			echo  str_replace ( $originalValues , $replaceValues , $Translation['create or update table']  );
		?>
	</div>
<?php } ?>

<div class="page-header"><h1>
	<?php echo $Translation['view or rebuild fields'] ; ?>
	<button type="button" class="btn btn-default" id="show_deviations_only"><i class="glyphicon glyphicon-eye-close"></i> <?php echo $Translation['show deviations only'] ; ?></button>
	<button type="button" class="btn btn-default hidden" id="show_all_fields"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $Translation['show all fields'] ; ?></button>
</h1></div>

<p class="lead"><?php echo $Translation['compare tables page'] ; ?></p>

<div class="alert summary"></div>
<table class="table table-responsive table-hover table-striped">
	<thead><tr>
		<th></th>
		<th><?php echo $Translation['field'] ; ?></th>
		<th><?php echo $Translation['AppGini definition'] ; ?></th>
		<th><?php echo $Translation['database definition'] ; ?></th>
		<th></th>
	</tr></thead>

	<tbody>
	<?php foreach($schema as $tn => $fields){ ?>
		<tr class="text-info"><td colspan="5"><h4 data-placement="left" data-toggle="tooltip" title="<?php echo str_replace ( "<TABLENAME>" , $tn , $Translation['table name title']) ; ?>"><i class="glyphicon glyphicon-th-list"></i> <?php echo $table_captions[$tn]; ?></h4></td></tr>
		<?php foreach($fields as $fn => $fd){ ?>
			<?php $diff = ((prepare_def($fd['appgini']) == prepare_def($fd['db'])) ? false : true); ?>
			<?php $no_db = ($fd['db'] ? false : true); ?>
			<tr class="<?php echo ($diff ? 'highlight' : 'field_ok'); ?>">
				<td><i class="glyphicon glyphicon-<?php echo ($diff ? 'remove text-danger' : 'ok text-success'); ?>"></i></td>
				<td><?php echo $fn; ?></td>
				<td class="<?php echo ($diff ? 'bold text-success' : ''); ?>"><?php echo $fd['appgini']; ?></td>
				<td class="<?php echo ($diff ? 'bold text-danger' : ''); ?>"><?php echo thisOr($fd['db'], $Translation['does not exist']); ?></td>
				<td>
					<?php if($diff && $no_db){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-success btn-xs btn_create" data-toggle="tooltip" data-placement="top" title="<?php echo $Translation['create field'] ; ?>"><i class="glyphicon glyphicon-plus"></i> <?php echo $Translation['create it'] ; ?></a>
					<?php }elseif($diff){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-warning btn-xs btn_update" data-toggle="tooltip" title="<?php echo $Translation['fix field'] ; ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['fix it'] ; ?></a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>
<div class="alert summary"></div>

<style>
	.bold{ font-weight: bold; }
	.highlight, .highlight td{ background-color: #FFFFE0 !important; }
	[data-toggle="tooltip"]{ display: block !important; }
</style>

<script>
	jQuery(function(){
		jQuery('[data-toggle="tooltip"]').tooltip();

		jQuery('#show_deviations_only').click(function(){
			jQuery(this).addClass('hidden');
			jQuery('#show_all_fields').removeClass('hidden');
			jQuery('.field_ok').hide();
		});

		jQuery('#show_all_fields').click(function(){
			jQuery(this).addClass('hidden');
			jQuery('#show_deviations_only').removeClass('hidden');
			jQuery('.field_ok').show();
		});

		jQuery('.btn_update').click(function(){
			return confirm("<?php echo $Translation['field update warning'] ; ?>");
		});

		var count_updates = jQuery('.btn_update').length;
		var count_creates = jQuery('.btn_create').length;
		if(!count_creates && !count_updates){
			jQuery('.summary').addClass('alert-success').html("<?php echo $Translation['no deviations found'] ; ?>");
		}else{
			var fieldsCount = "<?php echo $Translation['error fields']; ?>";
			fieldsCount = fieldsCount.replace(/<CREATENUM>/, count_creates ).replace(/<UPDATENUM>/, count_updates);


			jQuery('.summary')
				.addClass('alert-warning')
				.html(
					fieldsCount
				);
		}
	});
</script>

<?php
	include("{$currDir}/incFooter.php");
?>
