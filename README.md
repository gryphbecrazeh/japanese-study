<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## User

-   username
-   email
-   password
-   date created
-   top score
-   user dictionary

### User Dictionary

    - contains all words user has recieved from api
    - contains log of times right, times wrong, updated via api with axios

## Game

### details

    - game user dictionary
    - top score
    - level
    - highest streak
    - last score
    - last streak
    - date started
    - last played
    - date closed

### benefits

    - save and load games
    - track statistics ( see growth )

## Word

### details ++ (append to existing)

-   global times wrong
-   global times correct
-   number of games included

### benefits

    - save and load games
    - track statistics most difficult words, most succeeded word ( api updated )

## How the game should work

The game should start by creating a new session/game, that will handle tracking the game progress

Maybe have an option to filter already learned words
Maybe have already learned words appaer as review, automatically start without showing hints

Words should be retrieved via API

## UI

IF OLD GAME OFFER CONTINUE
OFFER NEW GAME CREATE NEW GAME WITH NEW ID, UPDATE OLD GAME TO BE CLOSED

## GET /word/{gamed_id}

IF NEW GAME

(

## CREATE GAME

at game start pull in 3 words for game dicitonary ( beats repetitivity of only having one word )

GENERATE WORD LIST

PULL in all words

)

PULL in USER learned words for optional learned word filtering

return 1 new word not currently present in the game dictionary

UPDATE word global metrics
UPDATE user dictionary

RETURN game dictionary

## IDEAS

On register, redirect to questionaire

Do you know hiragana?
Do you know katakana?
Ask profile details

If not Hiragana and/or katakana, redirect to kana game

add front end support for messages

## TODO

Add level support

## PROBLEMS

-   FIXED -- The first go around for the game fails, I believe it's related to getting the dictionary set up for the user, refreshing once or twice seems to fix it
-   FIXED -- The first go around doesn't prompt for the meaning, and makes the user type in the kana for each word before moving onto the meaning, I may have to wrap the word getter in the meaning check, since that entire procedure depends on that
-   When checking the meaning, attempting to get a new word occasionally ends up with 0, may be related to mastered_words being empty, maybe remove all empty arrays, will require re-evalutating the random dictionary ODDS setup to be dynamic, based on the existing words
-   FIXED -- Word count isn't displaying word count
-   FIXED -- It MAY be duplicating words when adding them to the learned word list, yeah it definitely loads it in twice
-   Service provider returns blank page at first, auth()->user() returns null, meaning it can't progress
