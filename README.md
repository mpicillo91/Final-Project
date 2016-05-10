# Final-Project

Note: The original commit date was Monday, May 9th. This readme was updated today as a copy of the original readme, which was uploaded on Monday, May 9th. 

Michael Picillo
Final Project - ReadMe

For my Final Project, I ensured that the tables within my database all complied with 3rd Normal Form.  The normalized format of these tables can be seen in the UML Diagram PDF document that I uploaded to Moodle under my Project Thread.  After I altered my database tables to comply with 3rd Normal Form, I was then required to rework my PHP program in order to have it interface properly with these new tables.  Ultimately, this enabled the three users ("inventoryclerk", "manager", "guest") to log in (all with a password of "password") and perform the same tasks as required by the Midterm Project.

For my Final Project, I also replicated one of my tables (the "Supplier" table) in mongodb.  This replication was now a new collection titled "SupplierMongo".  After updating my PHP program, the user "manager" was now able to output the "SupplierMongo" collection's documents on the display.  
