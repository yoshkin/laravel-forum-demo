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


##Tests (temp info)

Feature\CreateThreads
- [x] Unauthenticated user can not create new threads
- [x] Authenticated user can create new threads
- [x] Thread storing requires title field
- [x] Thread storing requires body field
- [x] Thread storing requires category id field

Feature\ParticipateInForum
- [x] Unauthenticated user can not add reply
- [x] Authenticated user can participate in forum threads

Feature\ReadThreads
- [x] User can access threads page
- [x] User can view threads titles
- [x] User can view single thread
- [x] User can view replies of the single thread

Unit\Reply
- [x] Reply has user

Unit\Thread
- [x] Thread instance have correct path
- [x] Thread has an author
- [x] Thread has replies
- [x] Thread belongs to category
- [x] Reply can be added to thread

OK (17 tests, 25 assertions)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
