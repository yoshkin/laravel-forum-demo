## Laravel Forum Demo Application

Please treat with understanding that is just Forum Demo Application covered by Tests.

- Forum Demo Application based on Laravel 5.6
- Application covered by Feature and Unit tests

## In progress

- Readme file
- Installation description 
- Other endpoints with views/tests/etc
- Modern html theme
- VueJS on frontend


## Tests (temp info)

Feature\CreateThreads
- ✔ Unauthenticated user can not create new threads
- ✔ Authenticated user can create new threads
- ✔ Thread storing requires title field
- ✔ Thread storing requires body field
- ✔ Thread storing requires existing valid category id field

Feature\ParticipateInForum
- ✔ Unauthenticated user can not add reply
- ✔ Authenticated user can participate in forum threads
- ✔ Reply storing requires body field

Feature\ReadThreads
- ✔ User can access threads page
- ✔ User can view threads titles
- ✔ User can view single thread
- ✔ User can view replies of the single thread

Unit\Reply
- ✔ Reply has user

Unit\Thread
- ✔ Thread instance have correct path
- ✔ Thread has an author
- ✔ Thread has replies
- ✔ Thread belongs to category
- ✔ Reply can be added to thread

OK (18 tests, 29 assertions)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
