# Short URL (PHP)

## Description

A one page site which includes a form to submit the long version of your URL.
It dynamically updates to show this and the shortened equivalent.
Both versions of the URL are stored in the database.

## Build

The project was created using XAMPP.

I have only started teaching myself PHP this week. I am comfortable creating a database in MySQL however I was unable to connect this to the front-end, so I used the 'phpMyAdmin' shortcut to build the database directly from the browser.

The database is structured with three columns, an ID primary key that auto increments, the 'org_url' (original url) and the 'tiny_url'.

## Future Improvements

The short URL only works when clicked on from the link on the page because it's using the URLs found in the 'foreach' loop. When copied and pasted into the browser it doesn't work. This would need to be fixed so that using the link takes the user to the correct long URL.

Currently the 'short URL' that's generated could be a duplicate, as there is no check to make sure it doesn't already exist. In the future I would build in something that goes through the short URLs in the database and only uses the generated code if it wasn't already in use.

Currently all links are on display. If the user wanted to create a private link it would be a good idea to have the 'Submit' button redirect them to another page which only they could access.

There is currently no security, and everything is stored un-hashed in the database, which would be a future improvement.
