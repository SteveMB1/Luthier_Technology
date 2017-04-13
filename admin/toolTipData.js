var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// acquisition table
acquisition_addTip=["",spacer+"This option allows all members of the group to add records to the 'Acquisition' table. A member who adds a record to the table becomes the 'owner' of that record."];

acquisition_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Acquisition' table."];
acquisition_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Acquisition' table."];
acquisition_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Acquisition' table."];
acquisition_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Acquisition' table."];

acquisition_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Acquisition' table."];
acquisition_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Acquisition' table."];
acquisition_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Acquisition' table."];
acquisition_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Acquisition' table, regardless of their owner."];

acquisition_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Acquisition' table."];
acquisition_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Acquisition' table."];
acquisition_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Acquisition' table."];
acquisition_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Acquisition' table."];

// inventory table
inventory_addTip=["",spacer+"This option allows all members of the group to add records to the 'Inventory' table. A member who adds a record to the table becomes the 'owner' of that record."];

inventory_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Inventory' table."];
inventory_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Inventory' table."];
inventory_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Inventory' table."];
inventory_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Inventory' table."];

inventory_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Inventory' table."];
inventory_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Inventory' table."];
inventory_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Inventory' table."];
inventory_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Inventory' table, regardless of their owner."];

inventory_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Inventory' table."];
inventory_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Inventory' table."];
inventory_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Inventory' table."];
inventory_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Inventory' table."];

// repairs table
repairs_addTip=["",spacer+"This option allows all members of the group to add records to the 'Repairs' table. A member who adds a record to the table becomes the 'owner' of that record."];

repairs_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Repairs' table."];
repairs_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Repairs' table."];
repairs_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Repairs' table."];
repairs_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Repairs' table."];

repairs_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Repairs' table."];
repairs_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Repairs' table."];
repairs_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Repairs' table."];
repairs_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Repairs' table, regardless of their owner."];

repairs_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Repairs' table."];
repairs_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Repairs' table."];
repairs_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Repairs' table."];
repairs_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Repairs' table."];

// shipping table
shipping_addTip=["",spacer+"This option allows all members of the group to add records to the 'Shipping' table. A member who adds a record to the table becomes the 'owner' of that record."];

shipping_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Shipping' table."];
shipping_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Shipping' table."];
shipping_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Shipping' table."];
shipping_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Shipping' table."];

shipping_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Shipping' table."];
shipping_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Shipping' table."];
shipping_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Shipping' table."];
shipping_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Shipping' table, regardless of their owner."];

shipping_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Shipping' table."];
shipping_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Shipping' table."];
shipping_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Shipping' table."];
shipping_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Shipping' table."];

// register table
register_addTip=["",spacer+"This option allows all members of the group to add records to the 'Register' table. A member who adds a record to the table becomes the 'owner' of that record."];

register_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Register' table."];
register_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Register' table."];
register_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Register' table."];
register_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Register' table."];

register_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Register' table."];
register_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Register' table."];
register_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Register' table."];
register_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Register' table, regardless of their owner."];

register_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Register' table."];
register_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Register' table."];
register_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Register' table."];
register_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Register' table."];

// expenses table
expenses_addTip=["",spacer+"This option allows all members of the group to add records to the 'Expenses' table. A member who adds a record to the table becomes the 'owner' of that record."];

expenses_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Expenses' table."];
expenses_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Expenses' table."];
expenses_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Expenses' table."];
expenses_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Expenses' table."];

expenses_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Expenses' table."];
expenses_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Expenses' table."];
expenses_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Expenses' table."];
expenses_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Expenses' table, regardless of their owner."];

expenses_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Expenses' table."];
expenses_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Expenses' table."];
expenses_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Expenses' table."];
expenses_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Expenses' table."];

// employees table
employees_addTip=["",spacer+"This option allows all members of the group to add records to the 'Employees' table. A member who adds a record to the table becomes the 'owner' of that record."];

employees_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Employees' table."];
employees_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Employees' table."];
employees_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Employees' table."];
employees_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Employees' table."];

employees_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Employees' table."];
employees_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Employees' table."];
employees_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Employees' table."];
employees_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Employees' table, regardless of their owner."];

employees_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Employees' table."];
employees_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Employees' table."];
employees_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Employees' table."];
employees_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Employees' table."];

// register_items table
register_items_addTip=["",spacer+"This option allows all members of the group to add records to the 'Order Items' table. A member who adds a record to the table becomes the 'owner' of that record."];

register_items_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Order Items' table."];
register_items_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Order Items' table."];
register_items_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Order Items' table."];
register_items_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Order Items' table."];

register_items_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Order Items' table."];
register_items_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Order Items' table."];
register_items_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Order Items' table."];
register_items_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Order Items' table, regardless of their owner."];

register_items_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Order Items' table."];
register_items_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Order Items' table."];
register_items_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Order Items' table."];
register_items_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Order Items' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
