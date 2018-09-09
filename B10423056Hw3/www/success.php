<?php
$type = $_GET['type'];
if($type == 'deleteMember'){
	echo '<script language="javascript">alert("Deleted Member");window.location.href=\'memberManager.php\';</script>';
}
if($type == 'addMember'){
	echo '<script language="javascript">alert("Member Created Successfully!");window.location.href=\'memberManager.php\';</script>';
}
if($type == 'updateMember'){
	echo '<script language="javascript">alert("Member Updated Successfully!");window.location.href=\'memberManager.php\';</script>';
}
if($type == 'updateItem'){
	echo '<script language="javascript">alert("Item Updated Successfully!");window.location.href=\'itemManager.php\';</script>';
}
if($type == 'addItem'){
	echo '<script language="javascript">alert("Item Created Successfully!");window.location.href=\'itemManager.php\';</script>';
}
if($type == 'deleteItem'){
	echo '<script language="javascript">alert("Deleted Item");window.location.href=\'itemManager.php\';</script>';
}
if($type == 'failDeleteItem'){
	echo '<script language="javascript">alert("Fail to delete Item, please check your order, maybe there still exist this item record");window.location.href=\'itemManager.php\';</script>';
}
if($type == 'updateOrder'){
	echo '<script language="javascript">alert("Order Updated Successfully!");window.location.href=\'orderManager.php\';</script>';
}
if($type == 'addOrder'){
	echo '<script language="javascript">alert("Order Created Successfully!");window.location.href=\'orderManager.php\';</script>';
}
if($type == 'deleteOrder'){
	echo '<script language="javascript">alert("Deleted Order");window.location.href=\'orderManager.php\';</script>';
}
if($type == 'updateSupplier'){
	echo '<script language="javascript">alert("Supplier Updated Successfully!");window.location.href=\'supplierManager.php\';</script>';
}
if($type == 'addSupplier'){
	echo '<script language="javascript">alert("Supplier Created Successfully!");window.location.href=\'supplierManager.php\';</script>';
}
if($type == 'deleteSupplier'){
	echo '<script language="javascript">alert("Deleted Supplier");window.location.href=\'supplierManager.php\';</script>';
}
//header("Location: memberManager.php")
?>