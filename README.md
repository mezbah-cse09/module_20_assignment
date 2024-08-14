# module_20_assignment

Task:


Develop a Contact Management Application with Laravel Framework that allows users to perform the following operations:


1.Create a new contact


2.Read (view) all contacts


3.Update an existing contact


Requirements


Contact’s Table Structure:


id: Integer, Primary Key


name: String, Required


email: String, Required, Unique


phone: String, Optional


address: String, Optional


created_at: Timestamp


updated_at: Timestamp


Routes:



GET /contacts: List all contacts

GET /contacts/create: Show the form to create a new contact

POST /contacts: Store a new contact

GET /contacts/{id}: Show a specific contact

GET /contacts/{id}/edit: Show the form to edit a contact

PUT /contacts/{id}: Update a contact

DELETE /contacts/{id}: Delete a contact


Controllers:


ContactController: Handle all operations


Views:



index.blade.php: Display all contacts with sort and search functionality

create.blade.php: Form to create a new contact

edit.blade.php: Form to edit an existing contact

show.blade.php: View a specific contact


Sorting:



Allow sorting by name and created_at (date)

Implement sorting links on the  index.blade.php page


Search:


Implement search functionality by name or email on the index.blade.php page


Delete a contact


Sort contacts by name or date


Search contacts by name or email