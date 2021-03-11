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

--

add conjugation support, type in meaning and select conjugation type from list

ie: aokunai

selectoptions

is - affirmative
isn't - negative
was - past affirmative
wasn't - past negative

type in meaning

--

--

show meaning
Show kanji dictionary form - remove after experienced
show target conjugation

recollect word

--

--

Guess the missing kanji character

-   grab kanji character from word
-   grab 3 random kanji characters
-   multiple choice selection

--

--

## Kanji challenge, practice all words that share a single kanji character

helps associate the actual meaning of the kanji with the related words, and make more kanji more familiar and easier to understand when seen in unknown words

-   I suppose we can use the kanji alive api to get a ranom kanji character, and then grab all words in our database and filter it based on whether or not it contains that kanji

## TODO

## Dashboard

-   Show struggling words or none
-   Show number of learned words that are listed as 'shouldKnow' to show count of known words, maybe have an overtime metric to show learned words overtime, probably by date created, or create a new column that will only be updated when shouldKnow is toggled, if shouldKnow is removed, then remove the wordKnownDate
-   Show highest level achieved per game category and overall ( maybe a stacked bar chart or something )
-   Show Most troubled kanji for the user
-   Show most troubled words / kanji overall
-   create user ranking system?

--

## Add level support

--

## Add User Manager

-   add user
-   edit user
-   delete user
-   reset password? might have to set up email api with google

--

## Add Word Manager

-   add store method to word controller
-   make inputs that require autokana use it
    Add User Roles
    Fix level generation issues - see problems

--

## Add User Learned Word Manager

-   Display all learned words by the user
-   See in depth statistics involving the words
-   Ability to 'forget' words

--

## Add Hiragana and Katakana Learning Games ( should be pretty easy )

--

## Add Number Learning Game, add counters on additional modes

Regular number mode

0-9
10-100
100-10,000
etc...

nTh number mode

0th, 1st, 2nd, 3rd, etc...

counter mode

0 mins, 1 min, 2 mins, 3 mins, 4 mins, etc...

--

## Add noun learning game

random mode

category mode

--

## Expand to using words instead of verbs, maybe set up a word table that is a collection of all word types such as nouns, verbs, and adjectives

--

## DONE -- Fix word selection so that it is only based on the level dictionary, not the user's learnedwords dictionary

--

DONE -- set amount of times needed to progress as environmental variable, and switch it from 10 to 3

Once level generation is fixed, set up metrics to get progression and display with graphs and charts

## Fix suru verbs, remove the o part of oshimasu, that's not supposed to be there

--

## Fix word columns

-   remove 'meaning' column and set it to get all of the meanings from the 'meanings' serialized string, and join that with commas and spaces
-   take kanjj's word and meanings and separate them, make them their own columns, and don't nest stuff in there like that again
-   make the stems be in hiragana
-   add all columns necessary for all the different possible forms or make there be some sort of conjugate method that handles conjugating them in a way
-   get rid of the politeForm table and use the method described above
-   add kanji stem column

--

Add conjugation support

Add new words from list on phone

create new seeding factory to handle seeding the database with words

Fix text colors

Fix flexible input stylings, make pretty, use svgs

Make Navbar collapsable

Make navbar sections collapsable

Create 'new or continue game' page for each of the routes

Add 'replay game' option where it uses the old dictionaries

Add leaderboards to home page

Add forums page? need forums table, posts table with external id

## Add error reporting

-   Add button to card to submit an error, provide a dropdown of all recent words, select word, and enter problem with word
-   word manager shows border around words depending on how many errors have been filed about that word

--

## PROBLEMS

-   FIXED -- The first go around for the game fails, I believe it's related to getting the dictionary set up for the user, refreshing once or twice seems to fix it
-   FIXED -- The first go around doesn't prompt for the meaning, and makes the user type in the kana for each word before moving onto the meaning, I may have to wrap the word getter in the meaning check, since that entire procedure depends on that
-   FIXED -- When checking the meaning, attempting to get a new word occasionally ends up with 0, may be related to mastered_words being empty, maybe remove all empty arrays, will require re-evalutating the random dictionary ODDS setup to be dynamic, based on the existing words
-   FIXED -- Word count isn't displaying word count
-   FIXED -- It MAY be duplicating words when adding them to the learned word list, yeah it definitely loads it in twice
-   FIXED -- Service provider returns blank page at first, auth()->user() returns null, meaning it can't progress
-   FIXED -- Word count doesn't update on increasing words, but word does re-appear, word selection is based on learned words, and I forgot to every reserialize and restrict word selection to the game word dictionary, need to address that
-   FIXED -- It is creating a LOT of levels, I can only assume my shit code has got me again
