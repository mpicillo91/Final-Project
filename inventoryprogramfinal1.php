#!/usr/bin/php

<?php

// Note: This PHP file uses the database "storeinventoryfinal1". This PHP file works with the normalized database, where all tables are in third normal form.

// Welcome Screen:
echo "+-----------------------------------------+\n";
echo "| Welcome! Please choose an option below: |\n";
echo "|         1. Login as existing user       |\n";
echo "|         2. Create New User              |\n";
echo "|         3. Mongo Supplier Report        |\n";
echo "+-----------------------------------------+\n";

$input = fgets(STDIN);

// Creating Connection:
switch ($input) {
	// Option 1: Login as existing user:
	case 1:
		echo "-------------------------------------------\n";
		echo "Please enter Username:	";
		$username = readline ();
		echo "-------------------------------------------\n";
		echo "Please enter Password:	";
		$password = readline ();
		echo "-------------------------------------------\n";
		echo "Okay... Working...\n";
		$servername = "p:localhost";
                $dbname = "storeinventoryfinal1";
		// Create connection - Old Code:
		//$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			//if ($conn->connect_error)
			//{
			//	die("Connection failed: " . $conn->connect_error);
			//}
			
			//echo "Connected successfully";
		// Create Connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Check connection
                        
			if (!$conn) {
				 echo "Could not connect. Please run program again and try correct username and password.";
				exit;
			}

			//if ($conn->connect_error)
                        //{
                        //	die("Connection failed: " . $conn->connect_error);
			//	exit;
                        //}

			// Select current database
			//$db_selected = mysql_select_db('storeinventory', $conn);
			//if (!$db_selected)
			//{
			//	die ('Unable to connect to InventoryTable: ' . mysql_error());
			//}
			echo "-------------------------------------------\n";
                        echo "Connected successfully.\n";
		//$session = 1;
		break;
	// Option 2: Create new user:
	case 2:
		echo "-------------------------------------------\n";
		echo "Okay. Enter new user 'username':     ";
		$newusername = readline ();
		echo "-------------------------------------------\n";
		echo "Enter new user 'password':     ";
		$newpassword = readline ();
		echo "-------------------------------------------\n";
		echo "Working.....\n";
		$servername2 = "localhost";
		$username2 = "root";
		$password2 = "";
		$dbname2 = "storeinventoryfinal1";
		$conn2 = mysqli_connect($servername2, $username2, $password2, $dbname2);
		if ($conn2->connect_error)
                        {
                              die("Connection failed: " . $conn->connect_error);
                        }
		$usercheck = mysqli_query($conn2, "SELECT User FROM mysql.user WHERE User='$newusername'");
		if(mysqli_num_rows($usercheck) >= 1)
			{
			echo "-------------------------------------------\n";
			echo"Error: Username already exists. Please run program again to try another username.\n";
			exit;
			}
		$result = "CREATE USER '$newusername'@'localhost' IDENTIFIED BY '$newpassword'";
                                                //mysqli_query($conn, $result);
                                                if (mysqli_query($conn2, $result)) {
                                                        echo "-------------------------------------------\n";
							echo "New user created successfully.\n";
                                                } else {
                                                        echo "-------------------------------------------\n";
							echo "Error: " . $result . "<br>" . mysqli_error($conn2);
							exit;
                                                }
		$result = "GRANT SELECT ON storeinventoryfinal1.Inventory TO '$newusername'@'localhost'";
                                                //mysqli_query($conn, $result);
                                                if (mysqli_query($conn2, $result)) {
							echo "-------------------------------------------\n";
                                                        echo "New user privleges created successfully.\n";
							exit;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn2);
							exit;
                                                }
		$result = "GRANT SELECT ON storeinventoryfinal1.Category TO '$newusername'@'localhost'";
                                                //mysqli_query($conn, $result);
                                                if (mysqli_query($conn2, $result)) {
                                                        echo "-------------------------------------------\n";
                                                        echo "New user privleges created successfully.\n";
                                                        exit;
                                                } else {
                                                        echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn2);
                                                        exit;
                                                }
		$result = "GRANT SELECT ON storeinventoryfinal1.Supplier TO '$newusername'@'localhost'";
                                                //mysqli_query($conn, $result);
                                                if (mysqli_query($conn2, $result)) {
                                                        echo "-------------------------------------------\n";
                                                        echo "New user privleges created successfully.\n";
                                                        exit;
                                                } else {
                                                        echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn2);
                                                        exit;
                                                }
		$result = "GRANT SELECT ON storeinventoryfinal1.Stock TO '$newusername'@'localhost'";
                                                //mysqli_query($conn, $result);
                                                if (mysqli_query($conn2, $result)) {
                                                        echo "-------------------------------------------\n";
                                                        echo "New user privleges created successfully.\n";
                                                        exit;
                                                } else {
                                                        echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn2);
                                                        exit;
                                                }
						break;
		echo "-------------------------------------------\n";
		echo "Success! New user '$newusername' has been successfully created (with guest-level privleges), and is now ready for use.\n";
		exit;
		break;
	// Option 3: Query MongoDB:
	case 3:
		echo "-------------------------------------------\n";
		echo "Mongo Supplier Report: This will display all documents within the 'SupplierMongo' collection.\n";
		echo "This was created with data from the Supplier table within the MySQL database.\n";
		echo "-------------------------------------------\n";
                echo "Please enter MongoDB Username:    ";
                $usernamemongo = readline ();
                echo "-------------------------------------------\n";
                echo "Please enter MongoDB Password:    ";
                $passwordmongo = readline ();
                echo "-------------------------------------------\n";
		echo "Okay... Working...\n";
		if (($usernamemongo == "manager") && ($passwordmongo == "password")) {
			$shelloutput = shell_exec('/home/m/inventoryprogrammongoconnect.sh');
                	echo $shelloutput;
			echo "-------------------------------------------\n";
			echo "^^^^ Please see above for all documents within the 'SupplierMongo' collection. ^^^^\n";
			echo "-------------------------------------------\n";
                	exit;
		} else {
			echo "-------------------------------------------\n";
			echo "Error: Wrong Username and Password for mongodb. Please run program and try again with correct username and password.\n";
			echo "-------------------------------------------\n";
			exit;
		}
		break;
// Test Code:
	case 4:
		a:
		echo "Type something:";
		$test = readline ();
		if (is_numeric($test)) {
			echo "'{$test}' is numeric", PHP_EOL;
		} else {
			echo "'{$test}' is NOT numeric", PHP_EOL;
		}
		echo "Going back in time.....";
		goto b;

		b:
		if ($test == "a" OR $test == "b") {
			echo "You entered A or B";
		} else {
			echo "Not A or B";
		}
		//if ($test != "string") {
		//	echo "Oops! Don't type numbers!.";
		//} else {
		//	echo "Good Job! There should be no numbers here.";
		//}
		exit;
		break;
	default:
		echo "-------------------------------------------\n";
		echo "Invalid Answer. Please run program again, and type 1, 2, or 3. Goodbye.\n";
		echo "-------------------------------------------\n";
		exit;
		}
if (!$conn) {
	echo "Could not connect. Please run program again and try correct username and password.";
	exit;
} elseif ($username == "inventoryclerk") {
	$session = 1;
} elseif ($username == "manager") {
	$session = 2;
} elseif ($username == "guest") {
	$session = 3;
} else {
	echo "-------------------------------------------\n";
	echo "Unknown Priveleges! Please make sure you are logged in as either 'inventoryclerk', 'manager', or 'guest'. If you are logged in as newly-created user, this message will be normal. You should proceed to use MySQL directly. Thank you.\n";
}


// Selection option begins here. This depends on which user has logged in. 
switch($session) {
	// Inventory Clerk:
	case 1:
		echo "+---------------------------------------------------------------------------------+\n";
		echo "|Successful Login as Inventory Clerk! Please select from the following options:   |\n";
		echo "| 1.      Update Spot check data for individual items in the stock room           |\n";
		echo "+---------------------------------------------------------------------------------+\n";
		break;
	// Manager:
	case 2:
		echo "+--------------------------------------------------------------------------+\n";
		echo "|Successful Login as Manager! Please select from the following options:    |\n";
		echo "| 1.      Set low water marks for ordering new stock                       |\n";
		echo "| 2.      Add / remove items to the inventory                              |\n";
		echo "| 3.      Get a report of items at or below the low water mark             |\n";
		echo "| 4.      Schedule a resupply                                              |\n";
		echo "+--------------------------------------------------------------------------+\n";
		break;
	// Guest:
	case 3:
		echo "+----------------------------------------------------------------------------------------+\n";
		echo "|Successful Login as Guest! Please select from the following options:                    |\n";
		echo "| 1.      Search for items based on name, description / category                         |\n";
		echo "| 2.      View an item (its information, stock count and if there has been any ordered,  |\n";
		echo "|         what the expected delivery date would be.                                      |\n";
		echo "+----------------------------------------------------------------------------------------+\n";
		break;
	default:
		echo "-------------------------------------------\n";
		echo "Unknown user. Program can only be used as Inventory Clerk, Manager, or Guest. Goodbye.\n";
		exit;
		}

$chosenoption = readline ();
if ($chosenoption == 'quit') {
	echo "-------------------------------------------\n";
	echo "Goodbye!\n";
	exit;
}

// This is where personalized user selection begins.
switch($session) {
	// Logged in as: Inventory Clerk
	case 1:
		switch($chosenoption) {
			// This is the only option (working):
			case 1:
				echo "-------------------------------------------\n";
				echo "Okay. Please type item number below:\n";
				$givenitemnumber = readline ();
				$sql = "SELECT StockNumber FROM Stock WHERE StockID = '$givenitemnumber'";
				//$currentstocknumber = mysqli_query($conn, $sql);
				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
				$currentstocknumber = $getvalue['StockNumber'];
				echo "-------------------------------------------\n";
				echo "Okay. Please type in new stock number for item #$givenitemnumber:\n";
				$givenstocknumber = readline ();
				if ($currentstocknumber == $givenstocknumber) {
					echo "-------------------------------------------\n";
					echo "Error. Given stock number is already $givenstocknumber. Please run program and try again.\n";
					echo "-------------------------------------------\n";
					exit;
				} else {
					$result = "UPDATE Stock SET
                                                StockNumber='$givenstocknumber' WHERE
                                                StockID=$givenitemnumber";
                                                if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
                                                        echo "Item #$givenitemnumber stock number successfully updated.\n";
							echo "-------------------------------------------\n";
							exit;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn);
							echo "-------------------------------------------\n";
							exit;
                                                }
				}
				break;
			default:
				echo "-------------------------------------------\n";
				echo "You must chose 1 (this is the only option). Please run program, and try again.\n";
				echo "-------------------------------------------\n";
				exit;
				}
		break;
	// Logged in as: Manager
	case 2:
		switch($chosenoption) {
			// First Option (working):
			case 1:
				echo "-------------------------------------------\n";
				echo "What would you like the new low-water mark to be?\n";
				$newlowwatermark = readline ();
				$sql = "SELECT LowWaterMark
                                                 FROM Stock
                                                 WHERE StockID LIKE 1";
                                //$query = mysqli_query($conn, $query);
				//echo "$query";
				//exit;
				//$lowwatermark = mysqli_query($conn, $query);
				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                $currentlowwatermark = $getvalue['LowWaterMark'];
                                if ($currentlowwatermark == $newlowwatermark) {
					echo "-------------------------------------------\n";
                                        echo "Error: low-water mark is already '$newlowwatermark'.";
					echo "-------------------------------------------\n";
					exit;
                                } else {
					$query = "SELECT * FROM Stock";
					$result = mysqli_query($conn, $query);
					$numberofrows = mysqli_num_rows($result);

				}
					$row = 1;
					while ($row <= $numberofrows) {
						$result = "UPDATE Stock 
								SET LowWaterMark=$newlowwatermark 
								WHERE StockID=$row";
						mysqli_query($conn, $result);
						$row = $row + 1;
					}
					echo "-------------------------------------------\n";
					echo "Low-water mark successfully changed to '$newlowwatermark' for $numberofrows items!\n";
					echo "-------------------------------------------\n";
					exit;

				
//				if (mysqli_query($conn, $result)) {
//                                                      echo "Low-water mark of '$userinput' successfully set";
//                                              } else {
//                                                      echo "Error: " . $result . "<br>" . mysqli_error($conn);
//                                              }
				break;
			// Second Option:
			case 2:
				echo "+--------------------+\n";
				echo "|Would you like to:  |\n";
				echo "| 1. Add an item?    |\n";
				echo "| 2. Remove an item? |\n";
				echo "+--------------------+\n";
				$userinput = readline ();
				switch($userinput) {
					// Second Menu: First Option - Add New Entry (works):
					case 1:
						echo "-------------------------------------------\n";
						echo "Okay. Please enter Item Name:\n";
						$argument1 = readline ();
						echo "-------------------------------------------\n";
						echo "Please enter Category:\n";
						$argument2 = readline ();
						echo "-------------------------------------------\n";
						echo "Please enter Supplier:\n";
                                                $argument3 = readline ();
						//echo "Okay. Please enter Item Number:";
                                                //$argument4 = readline ();
						$result = mysqli_query($conn, "Select * FROM Inventory");
						$numberofrows = mysqli_num_rows($result);
						$newitemnum = $numberofrows + 1;
						step4:
						echo "-------------------------------------------\n";
						echo "Please enter if item is in stock (Y,N):\n";
                                                $argument5 = readline ();
						if ($argument5 == "Y" OR $argument5 == "y" OR $argument5 == "N" OR $argument5 == "n") {
                        				goto step5;
                				} else {
							echo "-------------------------------------------\n";
                        				echo "Invalid. Please enter Y or N.\n", PHP_EOL;
							goto step4;
                				}
						step5:
						echo "-------------------------------------------\n";
						echo "Please enter if item has been ordered (Y,N):\n";
                                                $argument6 = readline ();
						if ($argument6 == "Y" OR $argument6 == "y" OR $argument6 == "N" OR $argument6 == "n") {
                                                        goto step6;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Invalid. Please enter Y or N.\n", PHP_EOL;
                                                        goto step5;
						}
						step6:
						echo "-------------------------------------------\n";
						echo "Please enter if item is still offered (Y,N):\n";
                                                $argument7 = readline ();
						if ($argument7 == "Y" OR $argument7 == "y" OR $argument7 == "N" OR $argument7 == "n") {
                                                        goto step7;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Invalid. Please enter Y or N.\n", PHP_EOL;
                                                        goto step6;
						}
						step7:
						echo "-------------------------------------------\n";
						echo "Please enter stock number:\n";
						$argument8 = readline ();
						echo "-------------------------------------------\n";
						echo "Please enter low-water mark:\n";
						$argument9 = readline ();
						// Values:
						// argument1 = ItemName
						// argument2 = Category
						// argument3 = Supplier
						// newitemnum = ItemNumber
						// argument5 = InStock
						// argument6 = Ordered
						// argument7 = StillOffered
						// argument8 = StockNumber
						// argument9 = LowWaterMark
						// CategoryID = CategoryID
						// SupplierID = SupplierID
						stepend:
						// Step 1: Update Category Table:
						$sql = "SELECT CategoryName
                                                	FROM Category
							WHERE CategoryName LIKE '$argument2'";
						//$query = mysqli_query($conn, $query);
                                		//echo "$query";
                                		//exit;
                                		//$lowwatermark = mysqli_query($conn, $query);
                                		$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                		$existingcategoryname = $getvalue['CategoryName'];
                                		if ($existingcategoryname == $argument2) {
                                        		$sql = "SELECT CategoryID
								FROM Category
								WHERE CategoryName LIKE '$argument2'";
							$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
							$CategoryID = $getvalue['CategoryID'];
                                		} else {
							$result = mysqli_query($conn, "Select * FROM Category");
							$numberofcategories = mysqli_num_rows($result);
                                                	$CategoryID = $numberofcategories + 1;
							$sql = "INSERT INTO Category (CategoryID, CategoryName) VALUES ('$CategoryID', '$argument2')";
						 //mysqli_query($conn, $result);
                                                	if (mysqli_query($conn, $sql)) {
                                                        	echo "-------------------------------------------\n";
                                                        	echo "New record successfully added to Category Table.\n";
                                                	} else {
                                                        	echo "-------------------------------------------\n";
                                                        	echo "Error: " . $result . "<br>" . mysqli_error($conn);
								exit;
                                                	}
						}
						// Step 2: Update Supplier Table:
						 $sql = "SELECT SupplierName
                                                        FROM Supplier
                                                        WHERE SupplierName LIKE '$argument3'";
                                                //$query = mysqli_query($conn, $query);
                                                //echo "$query";
                                                //exit;
                                                //$lowwatermark = mysqli_query($conn, $query);
                                                $getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                                $existingsuppliername = $getvalue['SupplierName'];
                                                if ($existingsuppliername == $argument3) {
                                                        $sql = "SELECT SupplierID
                                                                FROM Supplier
                                                                WHERE SupplierName LIKE '$argument3'";
                                                        $getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                                        $SupplierID = $getvalue['SupplierID'];
                                                } else {
                                                        $result = mysqli_query($conn, "Select * FROM Supplier");
                                                        $numberofsuppliers = mysqli_num_rows($result);
                                                        $SupplierID = $numberofsuppliers + 1;
                                                        $sql = "INSERT INTO Supplier (SupplierID, SupplierName) VALUES ('$SupplierID', '$argument3')";
                                                	//mysqli_query($conn, $result);
                                                        if (mysqli_query($conn, $sql)) {
                                                                echo "-------------------------------------------\n";
                                                                echo "New record successfully added to Supplier Table.\n";
                                                        } else {
                                                                echo "-------------------------------------------\n";
                                                                echo "Error: " . $result . "<br>" . mysqli_error($conn);
								exit;
                                                        }

						}
						// Step 3: Update Inventory Table:
						$result = "INSERT INTO Inventory (ItemName, CategoryID, SupplierID, ItemID, StockID) VALUES ('$argument1', '$CategoryID', '$SupplierID', '$newitemnum', '$newitemnum')";
						//mysqli_query($conn, $result);
						if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
							echo "New record successfully added to Inventory Table.\n";
						} else {
							echo "-------------------------------------------\n";
							echo "Error: " . $result . "<br>" . mysqli_error($conn);
							exit;
						}
						// Step 4: Update Stock Table:
						$sql = "INSERT INTO Stock (InStock, Ordered, StillOffered, StockNumber, LowWaterMark, StockID) VALUES ('$argument5', '$argument6', '$argument7', '$argument8', '$argument9', '$newitemnum')";
						if (mysqli_query($conn, $sql)) {
                                                        echo "-------------------------------------------\n";
                                                        echo "New record successfully added to Stock Table.\n";
							echo "-------------------------------------------\n";
                                                        echo "Success! New item has been successfully added to the database.\n";
							echo "-------------------------------------------\n";
							exit;
                                                } else {
                                                        echo "-------------------------------------------\n";
                                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							echo "-------------------------------------------\n";
							exit;
                                                }
						break;
					// Second Menu: Second Option - Delete Entry (working):
					case 2:
						echo "-------------------------------------------\n";
						echo "Okay. Please enter the Item Number of the item you would like to remove:\n";
						$userinput = readline ();
						 $sql = "SELECT CategoryID, SupplierID, StockID
                                                        FROM Inventory
                                                        WHERE ItemID LIKE '$userinput'";
                                                //$query = mysqli_query($conn, $query);
                                                //echo "$query";
                                                //exit;
                                                //$lowwatermark = mysqli_query($conn, $query);
                                                $getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                                $CategoryID = $getvalue['CategoryID'];
						$SupplierID = $getvalue['SupplierID'];
						$StockID = $getvalue['StockID'];
						// Step 1: Delete entry from Category Table:
						// Step 2: Delete entry from Supplier Table:
						// Step 3: Delete entry from Stock Table:
						$sql = "DELETE FROM Stock
        						WHERE StockID='$StockID'";
						if (mysqli_query($conn, $sql)) {
                                                        echo "-------------------------------------------\n";
                                                        echo "Record successfully deleted from Stock Table.\n";
                                                } else {
                                                        echo "-------------------------------------------\n";
                                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							echo "-------------------------------------------\n";
                                                        exit;
                                                }
						// Step 4: Delete entry from Inventory Table:
						$result = "DELETE FROM Inventory WHERE ItemID='$userinput'";
						if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
                                                        echo "Record successfully deleted from Inventory Table.\n";
							echo "-------------------------------------------\n";
                                                        echo "Success! Record #$userinput was successfully removed from the database.\n";
							echo "-------------------------------------------\n";
							exit;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn);
							echo "-------------------------------------------\n";
							exit;
                                                }
						break;
				break;
				}
			// Third Option (working):
			case 3:
				echo "-------------------------------------------\n";
				echo "Okay... Working...\n";
				echo "-------------------------------------------\n";
				$sqllowwatermark = "SELECT LowWaterMark FROM Stock WHERE StockID = 1";
				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sqllowwatermark));
                                $currentlowwatermark = $getvalue['LowWaterMark'];
				//-------------------------------------------------------------------------------
				//-------------------------------------------------------------------------------
				$sqlcategorytable="SELECT * FROM Category";
					//$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sqlcategorytable));
                                        //$CategoryID = $getvalue['CategoryID'];
					//$CategoryName = $getvalue['CategoryName'];
				$sqlsuppliertable="SELECT * FROM Supplier";
					//$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sqlsuppliertable));
                                        //$SupplierID = $getvalue['SupplierID'];
					//$SupplierName = $getvalue['SupplierName'];
				//-------------------------------------------------------------------------------
				//-------------------------------------------------------------------------------
				echo "\n";
				echo "-------------------------------------------\n";
				echo "Category Key:\n";
				echo "-------------------------------------------\n";
				echo "\n";
				$output= mysqli_query($conn, $sqlcategorytable) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }
				echo "\n";
				echo "-------------------------------------------\n";
				echo "Supplier Key:\n";
				echo "-------------------------------------------\n";
				echo "\n";
				$output= mysqli_query($conn, $sqlsuppliertable) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }
				echo "\n";
                                echo "-------------------------------------------\n";
                                echo "Inventory Data:\n";
                                echo "-------------------------------------------\n";
                                echo "\n";
				//-------------------------------------------------------------------------------
				//-------------------------------------------------------------------------------
				$sqlstocktable = "SELECT StockID,InStock,Ordered,StillOffered,StockNumber FROM Stock WHERE StockNumber <= $currentlowwatermark";
                                //-------------------------------------------------------------------------------
                                //-------------------------------------------------------------------------------
				$result = mysqli_query($conn, $sqlstocktable) or die(mysql_error());
				
//				$num_rows = mysqli_num_rows($result);
//				$i = 1;

				while ($row = mysqli_fetch_assoc($result)) {
					$currentrow = $row["StockID"];
					$currentsql = "SELECT * FROM Inventory WHERE StockID = $currentrow";
					$output= mysqli_query($conn, $currentsql) or die(mysql_error());
                                        
					while($row = mysqli_fetch_assoc($output)){
                                              	foreach($row as $cname => $cvalue){
                                              	echo "$cname: $cvalue\t\t";
                                        	}
                                      	print "\t\r\n";
                                	}
				}
				echo "\n";
                                echo "-------------------------------------------\n";
				echo "Stock Data:\n";
				echo "-------------------------------------------\n";
                                echo "\n";

//				while ($i < $num_rows) {
//					echo $result[$i];
//					$i++;
//				}
//				exit;

//				while ($row = mysql_fetch_array($result)) {
//    					$currentID = $row['StockID'];
//					$currentsql="SELECT * FROM Inventory WHERE StockID = $currentID";
//
//					$output= mysqli_query($conn, $currentsql) or die(mysql_error());
//                               		while($row = mysqli_fetch_assoc($output)){
//                                        	foreach($row as $cname => $cvalue){
//                                        	echo "$cname: $cvalue\t";
//                                        	}
//                                	print "\t\r\n";
//                                	}
//				}
				//$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sqllowwatermark));
                                //$currentlowwatermark = $getvalue['LowWaterMark'];

				//$numrowsstock = mysqli_num_rows($result);
				

				//-------------------------------------------------------------------------------
				//-------------------------------------------------------------------------------
				


				//$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sqlstocktable));
				//while($row = mysqli_fetch_assoc($getvalue)){
				//	foreach($row as $cname => $cvalue){
				//	$IDnumber = $getvalue['StockID'];
                                //	$sqlinventorytable="SELECT ItemName,StockID FROM Inventory WHERE ItemID = $IDnumber";
                                        //$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sqlinventorytable));
                                        //$CategoryID = $getvalue['CategoryID'];
                                        //$SupplierID = $getvalue['SupplierID'];
				//	$output= mysqli_query($conn, $sqlinventorytable) or die(mysql_error());
                                //	while($row = mysqli_fetch_assoc($output)){
                                //        	foreach($row as $cname => $cvalue){
                                //        	echo "$cname: $cvalue\t";
                                //        	}
                                //	print "\t\r\n";
				//	}
				//}
				//}
                                //}
				$output= mysqli_query($conn, $sqlstocktable) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }
				// $getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sqlstock));
                                // $IDnumber = $getvalue['StockID'];
				// $InStock = $getvalue['InStock'];
				// $Ordered = $getvalue['Ordered'];
				
					//$sql2="SELECT ItemName,Category,Supplier,ItemNumber,InStock,Ordered,StillOffered,StockNumber,LowWaterMark FROM Inventory WHERE StockNumber <= $currentlowwatermark";
					//$result=mysqli_query($conn, $sql2);
					//echo "-------------------------------------------\n";
					//echo "Column names, from left-to-right:\n";
					//echo "-------------------------------------------\n";
				//$number = 0;
				//while ($finfo = mysqli_fetch_field($result)) {
					//$number = $number + 1;
					//printf("Column $number: %s", $finfo->name);
					//echo "\n";
				//}
				//echo "-------------------------------------------\n";
				//echo "Results:\n";
				//echo "-------------------------------------------";
				//$property = mysqli_fetch_field($result);
				//$i = 0;
				//echo '<html><body><table><tr>';
				//while ($i < mysqli_num_fields($result))
				//{
					//$meta = mysqli_fetch_field($result);
					//echo '<td>' . $meta->name . '</td>';
					//$i = $i + 1;
				//}
				//echo '</tr>';
				//echo $property->name;
				//while($row = $result->fetch_array()) {
				//while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
        				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
					// Numeric array
					//$row=mysqli_fetch_array($result,MYSQLI_NUM);
					//$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
					//echo json_encode($row, JSON_PRETTY_PRINT);
					//printf ("\n%-20.20s %-20.20s %-20.20s %-11.11d %-5.5s %-5.5s %-5.5s %-11.11d %-11.11d",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
					//}
				// Associative array
				//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				//printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);
				echo "\n";
				echo "-------------------------------------------\n";
				echo "^^^^ Above is a report of items at or below the low water mark, as requested. ^^^^\n";
				echo "\n";
				echo "Please scroll up to view all information, if necessary.\n";
				echo "Keys for Category and Supplier are listed first.\n";
				echo "Then, relevent information from Inventory and Stock are listed.\n";
				echo "-------------------------------------------\n";
				exit;
				break;
			// Fourth Option (working):
			case 4:
				echo "-------------------------------------------\n";
				echo "Okay. Please type the Item Number of the item you want to place an order for:\n";
				$requesteditemnumber = readline ();
				$sql = "SELECT Ordered
        					FROM Stock
        					WHERE StockID = '$requesteditemnumber'";
				//$orderedresult = mysqli_query($conn, $sql);
				$getordered = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                $currentordered = $getordered['Ordered'];
				if ($currentordered == "Y") {
					echo "-------------------------------------------\n";
					echo "Error: Item #$requesteditemnumber has already been ordered. Goodbye.\n";
					echo "-------------------------------------------\n";
					exit;
				} else {
					$result = "UPDATE Stock SET
						Ordered = 'Y' WHERE
						StockID = $requesteditemnumber";
						if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
							echo "Record #$requesteditemnumber successfully ordered.\n";
							echo "-------------------------------------------\n";
							exit;
                                		} else {
							echo "-------------------------------------------\n";
							echo "Error: " . $result . "<br>" . mysqli_error($conn);
							echo "-------------------------------------------\n";
							exit;
                                		}
				}
				break;
			default:
				echo "-------------------------------------------\n";
				echo "Error: You did not enter 1, 2, 3, or 4. Please run the program again, and try one of these options.\n";
				echo "-------------------------------------------\n";
				exit;
			}

//		break;
//		default:
//			echo "Error. You did not enter 1, 2, 3, or 4.";
//			}
	// Guest:
	case 3:
		switch($chosenoption) {
			// First Option (working):
			case 1:
				echo "-------------------------------------------\n";
				echo "Please type your search selection:\n";
				$searchselection = readline ();
				echo "-------------------------------------------\n";
				echo "Okay... Working...\n";
				echo "-------------------------------------------\n";
//				$searchselection = mysqli_real_escape_string($conn, $searchselection);

				//$query = "SELECT * FROM Inventory WHERE ItemName LIKE '%$searchselection%' OR Category LIKE '%$searchselection%'";
				//$result = mysql_query($query, $conn);
				//if($result) {
				//	$output = mysql_fetch_assoc($result);
				//	echo $output;
				//}
				//$result = mysql_fetch_array(mysql_query("SELECT * FROM Inventory WHERE ItemName LIKE '%$searchselection%' OR Category LIKE '%$searchselection%'"));
				//while ($row = mysql_fetch_array($result)) {
				//	foreach ($row as $columnName => $columnData) {
				//	echo 'Column name: ' . $columnName . ' Column data: ' . $columnData . '<br />';
				//	}
				//}

				// 1. Searching Category Table:
				$sql = "SELECT CategoryID, CategoryName FROM Category WHERE CategoryName LIKE '%$searchselection%'";
				$getcategories = mysqli_fetch_assoc(mysqli_query($conn, $sql));
				$sql2 = mysqli_query($conn, $sql);
				if (mysqli_num_rows($sql2)==0) {
					$searchedcategories = 0;
					goto step2forguest;
				} else {
					$searchedcategories = $getcategories['CategoryID'];
				}
				
//				$result=mysqli_query($conn, $sql);
//                                $property = mysqli_fetch_field($result);
                                //echo $property->name;
				echo "\n";
				echo "-------------------------------------------\n";
				echo "Category Results:\n";
				echo "-------------------------------------------\n";
				echo "\n";
                                
				$output= mysqli_query($conn, $sql) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }

//while($row = $result->fetch_array()) {
                                //while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
                                //        printf ("\n%-20.20s %-20.20s %-20.20s %-11.11d %-5.5s %-5.5s %-5.5s %-11.11d %-11.11d",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
				//}

				step2forguest:
				// 2. Searching Inventory Table:
				$sql = "SELECT ItemName, CategoryID FROM Inventory WHERE ItemName LIKE '%$searchselection%' OR CategoryID LIKE '%$searchedcategories%'";
                                //$results = mysqli_query($conn, $result);
                                //var_dump($results);
//				$getotherinfo = mysqli_fetch_assoc(mysqli_query($conn, $sql));
//                                $searchedsupplier = $getotherinfo['SupplierID'];
//				$searchedstock = $getotherinfo['StockID'];

//                                $result=mysqli_query($conn, $sql);
//                                $property = mysqli_fetch_field($result);
                                //echo $property->name;
				echo "\n";
                                echo "-------------------------------------------\n";
				echo "Inventory Results:\n";
				echo "-------------------------------------------\n";
				echo "\n";
                                //while($row = $result->fetch_array()) {
                                
				$output= mysqli_query($conn, $sql) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }
				
				//while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
                                //        printf ("\n%-20.20s %-20.20s %-20.20s %-11.11d %-5.5s %-5.5s %-5.5s %-11.11d %-11.11d",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                                //}

				// 3. Searching Supplier Table:
//				$sql = "SELECT SupplierID, SupplierName FROM Supplier WHERE SupplierID LIKE '%$searchedsupplier%'";
                                //$results = mysqli_query($conn, $result);
                                //var_dump($results);
//                                $result=mysqli_query($conn, $sql);
//                                $property = mysqli_fetch_field($result);
                                //echo $property->name;
//                                echo "-------------------------------------------\n";
                                
//				$output= mysqli_query($conn, $sql) or die(mysql_error());
//                                while($row = mysqli_fetch_assoc($output)){
//                                        foreach($row as $cname => $cvalue){
//                                        echo "$cname: $cvalue\t";
//                                        }
//                                print "\t\r\n";
//                                }

//while($row = $result->fetch_array()) {
                                //while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
                                //        printf ("\n%-20.20s %-20.20s %-20.20s %-11.11d %-5.5s %-5.5s %-5.5s %-11.11d %-11.11d",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
				//}

				// 4. Searching Stock Table:
//				$sql = "SELECT InStock, Ordered, StillOffered, StockNumber, LowWaterMark, StockID, FROM Stock WHERE StockID LIKE '%$searchedstock%'";
                                //$results = mysqli_query($conn, $result);
                                //var_dump($results);
//                                $result=mysqli_query($conn, $sql);
//                                $property = mysqli_fetch_field($result);
                                //echo $property->name;
//                                echo "-------------------------------------------\n";
                                
//				$output= mysqli_query($conn, $sql) or die(mysql_error());
//                                while($row = mysqli_fetch_assoc($output)){
//                                        foreach($row as $cname => $cvalue){
//                                        echo "$cname: $cvalue\t";
//                                        }
//                                print "\t\r\n";
//                                }

//while($row = $result->fetch_array()) {
                                //while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
                                //        printf ("\n%-20.20s %-20.20s %-20.20s %-11.11d %-5.5s %-5.5s %-5.5s %-11.11d %-11.11d",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
				//}

//				$output= mysqli_query($conn, $result) or die(mysql_error());	
//				while($row = mysqli_fetch_assoc($output)){
//    					foreach($row as $cname => $cvalue){
//   	    				//<table>
//					echo "$cname: $cvalue\t";

					//echo "<td>$row</td>";

    					//print "<t\n";
					//<\table>;
//    					}
//    				print "\t\r\n";
//				}
				//print_r($result);
				//$result = $conn->query($query);
				//echo "$result";
				//echo "This should be what you typed in: $searchselection";
				
				echo "\n";
				echo "-------------------------------------------\n";
				exit;
				break;
			// Second Option:
			case 2:
				echo "-------------------------------------------\n";
				echo "Please type Item Number of requested item:\n";
                                $searchselection = readline ();
				echo "-------------------------------------------\n";
                                echo "Okay... Working...\n";
				echo "-------------------------------------------\n";
                                $searchselection = mysqli_real_escape_string($conn, $searchselection);
                                $result = "SELECT ItemName, StockID FROM Inventory WHERE ItemID LIKE '$searchselection'";
                                $output= mysqli_query($conn, $result) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }
				
				$result = "SELECT InStock, Ordered FROM Stock WHERE StockID LIKE '$searchselection'";
                                $output= mysqli_query($conn, $result) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }

				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $result));
                                $orderedstatus = $getvalue['Ordered'];
				if ($orderedstatus == 'Y') {
					echo "-------------------------------------------\n";
					echo "Expected Delivery: Within 5 business days days.\n";
					echo "-------------------------------------------\n";
				} else {
					echo "-------------------------------------------\n";
					echo "Expected Delivery: No delivery estimation. Item has not been ordered.\n";
					echo "-------------------------------------------\n";
				}
				exit;
                                break;
			default:
				echo "-------------------------------------------\n";
				echo "Unable to process request. Please run program and try again.\n";
				echo "-------------------------------------------\n";
				exit;
				}
				}


// things to do:
// - Found out how to display column names. Next see if there is a way to have them formated more nicely, if time permits.
// More notes:
// SELECT * FROM Inventory WHERE Category LIKE '%Food%';
// SELECT * FROM Inventory WHERE Supplier LIKE '%es%' OR ItemName LIKE '%es%';

?>
