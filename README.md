# RMP Enterprise Developer Task - CSV 1
### Overview
What we have here is an incomplete export system based on a small set of student data.
The mission, if you choose to accept it, is to fill in the missing parts and finish the application to the *best* of your ability.
How you do this is completely down to you. We have only provided the bare bones.
There is no right or wrong, however we don't want you to rely on a third party csv package, or use the fputcsv function. For testability and maintainability, it is preferrable that your logic is writting in dedicated classes, rather than controllers.
Although this is a relatively small task we believe there is enough here for you to be able to demonstrate your ability to follow good coding practices and show your understanding of PHP and the Laravel framework.
Our products require features to be backed up by tests (unit and integration) so please provide suitable PHPUnit tests. We use Vue.js for our frontend JS so any enhancements to the UI with Vue would be great to see.
*TODO review bugs*
Oh and there may be some 'deliberate' errors in our code, which require fixing... Enjoy.
### Getting Started
1) Set up PHP 7.1.* & MySQL 5.7.* on your local environment.
2) Install Laravel 5.5.*
### What we expect
- Don't rely on a third party csv package or `fputcsv` function
- Clear separation of concerns
- PHPUnit tests for the success and failure scenarios
- Explain your decisions through comments or a readme etc
### What we would like to see
- PSR2 compilant code
- For testability and maintainability, it is preferrable that your logic is writting in dedicated classes, rather than controllers.
### Scenarios
1. Render the table of the students
2. Name an export
3. Export all rows
4. View export history
### Well that was easy...
If time allows and you want to really impress us consider adding the following additional functionality.
- TDD
- handling 200K+ students to export
- Search the table
- Sort the table
- Export selected rows, like GMAIL
- download export from history
### Questions
If there are any critical issues please contact dominic.sabatini@rmpenterprise.co.uk, bruno@rmpenterprise.co.uk or ian.nisbet@rmpenterprise.co.uk.