# php fast framework

    Run:
    1. Define Controller in controllers/ as module_name_folder/controller_name.php
    2. Go to core/config/Routes.php and append "module_name_folder/controller_name" to array
    3. Write some code on index method
    4. Routes must be capitalized as 
        - http://localhost/fast/Example/First/Index
        - http://localhost/fast/Example/Other/Getcustomer (method is capitalized too)

    Db:
    Change MYSQLi connect variables in core/lib/Db.php