<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to the task</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            color: #999;
        }

        .instructions {
            width: 780px;
            position: absolute;
            left: 50%;
            top: 10%;
            margin-left: -390px;
            margin-top: -100px;
            margin-bottom: 20px;
        }

        a, a:visited {
            text-decoration: none;
            color: #999;
        }

        h1 {
            font-size: 32px;
            margin: 16px 0 0 0;
        }
    </style>
</head>

<body>
<div class="instructions">

    <img src="/images/logo.png" alt="Logo" title="logo">

    <h1>Welcome to the RMP Enterprise Developer Task - CSV Export</h1>

<h3 id="overview">Overview</h3>

<p>What we have here is an incomplete export system based on a small set of student data.
The mission, if you choose to accept it, is to fill in the missing parts and finish the application to the <em>best</em> of your ability.
How you do this is completely down to you. We have only provided the bare bones.
There is no right or wrong, however we don't want you to rely on a third party csv package, or use the fputcsv function. For testability and maintainability, it is preferrable that your logic is writting in dedicated classes, rather than controllers.
Although this is a relatively small task we believe there is enough here for you to be able to demonstrate your ability to follow good coding practices and show your understanding of PHP and the Laravel framework.
Our products require features to be backed up by tests (unit and integration) so please provide suitable PHPUnit tests. We use Vue.js for our frontend JS so any enhancements to the UI with Vue would be great to see.
<em>TODO review bugs</em>
Oh and there may be some 'deliberate' errors in our code, which require fixing... Enjoy.</p>

<h3 id="gettingstarted">Getting Started</h3>

<p>1) Set up PHP 7.1.* &amp; MySQL 5.7.* on your local environment.
2) Install Laravel 5.5.*</p>

<h3 id="whatweexpect">What we expect</h3>

<ul>
<li>Don't rely on a third party csv package or <code>fputcsv</code> function</li>

<li>Clear separation of concerns</li>

<li>PHPUnit tests for the success and failure scenarios</li>

<li>Explain your decisions through comments or a readme etc</li>
</ul>

<h3 id="whatwewouldliketosee">What we would like to see</h3>

<ul>
<li>PSR2 compilant code</li>

<li>For testability and maintainability, it is preferrable that your logic is writting in dedicated classes, rather than controllers.</li>
</ul>

<h3 id="scenarios">Scenarios</h3>

<ol>
<li>Render the table of the students</li>

<li>Name an export</li>

<li>Export all rows</li>

<li>View export history</li>
</ol>

<h3 id="wellthatwaseasy">Well that was easy...</h3>

<p>If time allows and you want to really impress us consider adding the following additional functionality.</p>

<ul>
<li>TDD</li>

<li>handling 200K+ students to export</li>

<li>Search the table</li>

<li>Sort the table</li>

<li>Export selected rows, like GMAIL</li>

<li>download export from history</li>
</ul>

<h3 id="questions">Questions</h3>

<p>If there are any critical issues please contact dominic.sabatini@rmpenterprise.co.uk, bruno@rmpenterprise.co.uk or ian.nisbet@rmpenterprise.co.uk.</p>

    <p><a href="{{url('view')}}" title="task">Click here to continue to the challenge</a></p>
</div>
</body>

</html>
