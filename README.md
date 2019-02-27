# Welcome to the RMP Enterprise Developer Task - CSV Export
### Overview
What we have here is an incomplete export system based on a small set of student data.
The mission, if you choose to accept it, is to fill in the missing parts and finish the application to the *best* of your ability.
How you do this is completely down to you. We have only provided the bare bones.
There is no right or wrong, however we don't want you to rely on a third party csv package, or use the fputcsv function. For testability and maintainability, it is preferrable that your logic is writting in dedicated classes, rather than controllers.
Although this is a relatively small task we believe there is enough here for you to be able to demonstrate your ability to follow good coding practices and show your understanding of PHP and the Laravel framework.
Our products require features to be backed up by tests (unit and integration) so please provide suitable PHPUnit tests. We use Vue.js for our frontend JS so any enhancements to the UI with Vue would be great to see.
Oh and there may be some 'deliberate' errors in our code, which require fixing... Enjoy.

### Getting Started
1) Set up PHP 7, Composer and Sqlite3 or MySQL 5.7.* on your local environment.
2) `git clone https://github.com/RMPEnterprise/csv-task1.git`
3) `composer install`
4) The tast includes a populated sqlite database, but you may prefer to use mySql, in which case you will need to run `php artisan migrate --seed`
5) `php artisan serve --port=8003`
6) Visit `http://127.0.0.1:8003`

### What we expect
- Don't rely on a third party csv package or `fputcsv` function
- Clear separation of concerns
- PHPUnit tests for the success and failure scenarios
- Explain your decisions through comments or a readme etc

### What we would like to see
- PSR-2 compilant code.
- Consideration of data security (included is only dummy data, however).
- For testability and maintainability, it is preferrable that your logic is writting in dedicated classes, rather than controllers.
- Tested code

### Scenarios
1. Render the table of students
2. Export a CSV file of selected students when clicking on the export buttons
3. Give the exported CSV file a name
4. View export history

### Well that was easy...
If time allows and you want to really impress us, please consider adding the following additional functionality.
- TDD
- handling 200K+ students to export
- Search the table
- Sort the table
- download a previous export from history

### Questions
If there are any critical issues please contact dominic.sabatini@rmpenterprise.co.uk, bruno@rmpenterprise.co.uk or ian.nisbet@rmpenterprise.co.uk.
