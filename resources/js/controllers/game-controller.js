import { Controller } from "stimulus"
var $ = require( "jquery" )
const GAME_OBJ = require( "./Game" ).default

export default class extends Controller
{
    connect ()
    {
        this.run()

    }

    run ()
    {
        this.render()
    }
    render ()
    {
        const STATICDICTIONARY = JSON.parse( this.data.get( 'vocabulary' ) )
        // Idea, make user type in the name of the word before entering it's meaning
        // input error, I swapped the meanings or kanji between to stop and to lodge
        // Dom elements
        const display = document.querySelector( "#display" )
        const submitButton = document.querySelector( "#submit-button" )
        const copyButton = document.querySelector( "#copy-button" )
        const forgotButton = document.querySelector( "#forgot-button" )
        let input = document.querySelector( "#input" )
        const backupInput = input.cloneNode( true ) // Used for refreshing the input
        const secondaryInput = document.querySelector( "#secondary-input" )
        const notificationContainer = document.querySelector( "#notification-container" )
        const info = document.querySelector( ".info" )

        /*
            Ideas
        
            add counters for how many times remaing to master the word or obtain a new word to ui
        
            add master difficulty -- recollection based
        
            make modular ui stats -- passively checks for elements with a target class and changes their innerhtml to reflect a statistic, current level, etc
        
            slide in animations on display, help distinguish a change of events
        
        */

        // Handle Cookies to keep record
        const enableLocalStorage = false
        const localStorageName = "nihongo study"
        // class Verb
        // {
        //     constructor ( {
        //         meaning = "",
        //         meanings = [],
        //         rePoliteForm = "",
        //         politeForm = "",
        //         kanji = {
        //             word: "",
        //             meaning: ""
        //         },
        //         hasLearned,
        //         shouldKnow,
        //         timesWrong,
        //         timesRight
        //     } )
        //     {
        //         this.timesWrongOffset = 3
        //         //     change to array of meanings, allow for comma separated entries for multiple meanings and multiple points
        //         this.meanings = meanings || null
        //         this.meaning = meaning || null
        //         this.politeForm = politeForm || null
        //         this.rePoliteForm = rePoliteForm || null
        //         this.hasLearned = hasLearned || false
        //         this.shouldKnow = shouldKnow || false
        //         this.timesWrong = timesWrong || 0
        //         this.timesRight = timesRight || 0
        //         this.kanji = kanji
        //     }
        //     increaseTimesCorrect = ( callback ) =>
        //     {
        //         this.timesRight++

        //         if ( !this.hasLearned ) this.toggleLearned()

        //         if (
        //             this.timesRight >
        //             0 + this.timesWrong + this.timesWrongOffset &&
        //             !this.shouldKnow
        //         )
        //         {
        //             this.toggleKnown()
        //         }
        //         if ( callback ) return callback( this )
        //     }

        //     increaseTimesWrong = ( callback ) =>
        //     {
        //         this.timesWrong++
        //         if ( this.shouldKnow ) this.toggleKnown()
        //         if ( callback ) return callback( this )
        //     }
        //     toggleKnown = () => this.shouldKnow = !this.shouldKnow
        //     toggleLearned = () => this.hasLearned = !this.hasLearned

        // }


        // class GAME_OBJ 
        // {

        //     constructor ( STATICDICTIONARY )
        //     {
        //         if ( !STATICDICTIONARY )
        //         {
        //             alert( 'No Static Dictionary...' )
        //             return 0
        //         }

        //         this.canSave = 0 // check if local storage is available
        //         this.score = 0
        //         this.previousWord = {}
        //         this.targetVerb = null
        //         this.userInput = null
        //         this.userHiragana = null
        //         this.userMeaning = null
        //         this.targetModes = [ "politeForm", "meaning", "rePoliteForm" ]
        //         this.targetModeActive = "meaning"


        //         let handleGetChunks = ( array = [], chunkSize = 10 ) =>
        //         {
        //             array = [ ...array ]
        //             let chunks = []
        //             let totalChunks = Math.floor( array.length / chunkSize )
        //             let remaining = array.length / chunkSize
        //             for ( let i = 0; i < totalChunks; i++ )
        //             {
        //                 chunks.push( array.splice( 0, chunkSize ) )
        //             }
        //             chunks.push( array.splice( 0, remaining ) )
        //             return [ ...chunks ]
        //         }


        //         this.levels = [ ...handleGetChunks( STATICDICTIONARY ) ]
        //         this.levelActive = 0
        //         this.completeDictionary = [ ...STATICDICTIONARY ] // Answer Dictionary - contains all words
        //         this.dictionary = [ ...this.levels[ this.levelActive ] ] // User dictionary - only contains words the user has been delegated
        //         this.answerDictionary = [ ...this.completeDictionary ] // Answer Dictionary - contains all words
        //         this.modeActive = "study"


        //     }
        //     // 
        //     // 
        //     // Data-persistance
        //     loadSavedGame = () =>
        //     {
        //         // 
        //         // 
        //         // ## Local Storage
        //         // 
        //         let getLocalStorage = ( storageName = localStorageName ) =>
        //         {
        //             let tempObj = {
        //                 ...JSON.parse( localStorage.getItem( storageName ) )
        //             }
        //             return tempObj
        //         }
        //         // set up from localstorage
        //         let oldGame = getLocalStorage()

        //         if ( oldGame && enableLocalStorage )
        //         {
        //             GAME = { ...oldGame }
        //         }
        //         // Depends on this.canSave
        //         let {
        //             score,
        //             previousWord,
        //             targetVerb,
        //             levels,
        //             levelActive,
        //             completeDictionary
        //         } = oldGane
        //         this.score = score
        //         this.previousWord = previousWord
        //         this.targetVerb = targetVerb
        //         this.levels = levels
        //         this.levelActive = levelActive
        //         this.completeDictionary = completeDictionary
        //     }
        //     saveGame = () =>
        //     {

        //         let setLocalStorage = ( storageName = localStorageName ) =>
        //         {
        //             let statusObj = {
        //                 dictionary: dictionary,
        //                 answerDictionary: answerDictionary,
        //                 levels: levels,
        //                 levelActive: levelActive,
        //                 wordCount: GAME.wordCount(),
        //                 score: score
        //             }
        //             localStorage.setItem( storageName, JSON.stringify( statusObj ) )
        //         }

        //         // Depends on this.canSave
        //         let gameSave = {
        //             score: this.score,
        //             previousWord: this.previousWord,
        //             targetVerb: this.targetVerb,
        //             levels: this.levels,
        //             levelActive: this.levelActive,
        //             completeDictionary: this.completeDictionary
        //         }
        //     }
        //     deleteSavedGame = () =>
        //     {

        //         let removeLocalStorage = ( storageName = localStorageName ) =>
        //         {
        //             localStorage.removeItem( storageName )
        //         }
        //         removeLocalStorage()
        //     }
        //     // 
        //     // 
        //     // Score

        //     getScore = () => this.score
        //     increaseScore = () => this.score += 1
        //     resetScore = () => this.score = 0
        //     // 
        //     // 
        //     // API
        //     kanjiAlive = () =>
        //     {

        //         // Comment this out?
        //         let getKanjiMeaning = async ( kanji ) =>
        //         {
        //             if ( !kanji ) return 0
        //             let apiQuery = `https://kanjialive-api.p.rapidapi.com/api/public/search/${ kanji }`
        //             let result = fetch( 'http://example.com/movies.json' )
        //                 .then( response => response.json() )
        //                 .then( data => console.log( data ) )
        //         }
        //         getKanjiMeaning( "勉" )

        //     }
        //     wordCount = () => this.getLevelDictionary().length ?? 0
        //     // Levels
        //     increaseLevel = () =>
        //     {
        //         this.levelActive = this.levelActive++
        //         this.dictionary = this.levels[ this.levelActive ]
        //     }
        //     getLevelDictionary = () => this.levels[ this.levelActive ]
        //     updateLevelDictionary = () => this.levels[ this.levelActive ] = [ ...this.getLevelDictionary().filter( word => word.kanji.word !== this.getTargetVerb().kanji.word ), this.getTargetVerb() ]
        //     resetTargetVerb = () => this.targetVerb = new Verb( { meaning: "", politeForm: "", rePoliteForm: "" } )
        //     // Word lists
        //     // 
        //     // 
        //     // No Experience
        //     getNewWords = () => [ ...this.getLevelDictionary().filter( word => !word.hasLearned ) ]
        //     // 
        //     // 
        //     // Minimal Experience
        //     getLearnedWords = () => [ ...this.getLevelDictionary().filter( word => word.hasLearned ) ]
        //     // 
        //     // 
        //     // Significant Experience
        //     getKnownWords = () => [ ...this.getLearnedWords().filter( word => word.shouldKnow ) ]
        //     // 
        //     // 
        //     // Struggling
        //     getStrugglingWords = () => [ ...this.getLearnedWords().filter( word => !word.timesRight > word.timesWrong ) ]
        //     getRandomIndex = array =>
        //     {
        //         return Math.floor( Math.random() * Math.floor( array.length ) )
        //     }

        //     getProbableDicitonary = ( dictionary = [], probability = 0 ) =>
        //     {
        //         let resultDictionary = []
        //         for ( let i = 0; i < probability; i++ )
        //         {
        //             resultDictionary.push( ...dictionary )
        //         }
        //         return resultDictionary
        //     }
        //     getRandomWord = ( callback ) =>
        //     {

        //         let learnedWords = [ ...this.getLearnedWords() ]
        //         let knownWords = [ ...this.getKnownWords() ]
        //         let newWords = [ ...this.getNewWords() ]
        //         let strugglingWords = [ ...this.getStrugglingWords() ]

        //         // If there are no new words, all learned words are known by the user
        //         if ( !newWords.length > 0 && knownWords.length === learnedWords.length )
        //             this.increaseLevel()

        //         // If there are no learned words, or all learned words are known and there are still new words available for the round
        //         if (
        //             ( !learnedWords.length > 0 || knownWords.length === learnedWords.length ) &&
        //             newWords.length > 0
        //         )
        //         {
        //             //     grab a random word, and update the dictionary to update the word
        //             let targetWord = new Verb( newWords[ this.getRandomIndex( newWords ) ] )
        //             postAlert(
        //                 `New Word!, ${ targetWord.politeForm } means to ${ targetWord.meanings.join(
        //                     ", "
        //                 ) }`
        //             )
        //             targetWord.hasLearned = true
        //             this.setTargetVerb( targetWord )
        //             this.updateLevelDictionary()
        //             if ( callback )
        //             {
        //                 callback( targetWord )
        //             }
        //             return targetWord
        //         }
        //         //     End Get New Word
        //         // Establish probabilities of certain words, then do something absurd to create probabilities
        //         let probabilities = {
        //             known: 10,
        //             learned: 40,
        //             struggling: 50
        //         }
        //         let probableDictionary = [
        //             ...this.getProbableDicitonary( learnedWords, probabilities.learned ),
        //             ...this.getProbableDicitonary( knownWords, probabilities.known ),
        //             ...this.getProbableDicitonary( strugglingWords, probabilities.struggling )
        //         ]
        //         // Filter out previous word from probable dicitonary
        //         if ( learnedWords.length > 1 && this.previousWord )
        //         {
        //             probableDictionary = probableDictionary.filter(
        //                 word => word.kanji.word != this.previousWord.kanji.word
        //             )
        //         }
        //         let randWord = probableDictionary[ this.getRandomIndex( probableDictionary ) ]

        //         if ( randWord != null ) return randWord
        //     }
        //     // Temporary Verb
        //     getTargetVerb = () => this.targetVerb
        //     setTargetVerb = newVerb => this.targetVerb = new Verb( newVerb )
        //     newTargetVerb = () =>
        //     {
        //         return this.setTargetVerb( this.getRandomWord() )
        //     }
        //     // 
        //     // 
        //     // User input
        //     getUserInput = () => this.userInput
        //     setUserInput = input => this.userInput = input
        //     clearUserInput = () => this.userInput = null
        //     // 
        //     // 
        //     // User Hiragana
        //     getHiraganaInput = () => this.userHiragana
        //     setHiraganaInput = () =>
        //     {
        //         this.userHiragana = this.userInput
        //         this.clearUserInput()
        //     }
        //     clearHiraganaInput = () => this.userHiragana = null

        //     // 
        //     // 
        //     // User Meaning
        //     getMeaningInput = () => this.userMeaning
        //     setMeaningInput = () =>
        //     {
        //         this.userMeaning = this.userInput
        //         this.clearUserInput()
        //     }
        //     clearMeaningInput = () => this.userMeaning = null
        //     clearInputs = () =>
        //     {
        //         this.clearUserInput()
        //         this.clearHiraganaInput()
        //         this.clearMeaningInput()
        //     }

        //     success = ( callback ) =>
        //     {
        //         let targetVerb = this.getTargetVerb()
        //         targetVerb.increaseTimesCorrect()
        //         this.updateLevelDictionary()
        //         this.clearInputs()
        //         this.increaseScore()
        //         this.newTargetVerb()
        //         this.previousWord = targetVerb
        //         if ( callback ) callback()
        //     }
        //     fail = ( callback ) =>
        //     {
        //         let targetVerb = this.getTargetVerb()
        //         targetVerb.increaseTimesWrong()
        //         this.updateLevelDictionary()
        //         this.clearInputs()
        //         this.resetScore()
        //         this.newTargetVerb()
        //         if ( callback ) callback()

        //     }

        // }

        var GAME = new GAME_OBJ( STATICDICTIONARY )

        // Change the main display to the text
        let setDisplay = text =>
        {
            display.innerHTML = text
        }

        // Clear the input element's value
        let clearInputValue = () =>
        {
            if ( !input ) return 0
            return input.value = ''
        }

        // Get the value of the input element and clear
        let getInputValue = () =>
        {
            if ( !input ) return 0
            let value = input.value
            clearInputValue()
            return value
        }

        // Get user input, update the temporary verb object, determine what the next mode will be
        let handleSubmitButton = () =>
        {
            if ( !submitButton || !input || !input.value || !display ) return 0

            let userInput = getInputValue()
            let targetVerb = GAME.getTargetVerb()
            if ( !GAME.getHiraganaInput() )
            {
                // probably not clearing the hiraganainput, hiragana input is always returning true

                if ( targetVerb.politeForm === userInput )
                {
                    GAME.setUserInput( userInput )
                    GAME.setHiraganaInput()
                }
                return handleStudyLoop()
            }
            if ( GAME.getHiraganaInput() && !GAME.getMeaningInput() )
            {
                if ( handleCheckAnswers( targetVerb, userInput ) > 0 )
                {
                    GAME.success( () =>
                    {
                        // 
                        postAlert(
                            `Correct!, ${ targetVerb.politeForm } means to ${ targetVerb.meanings.join(
                                ", "
                            ) }`,
                            "correct"
                        )

                    } )
                } else
                {
                    GAME.fail( () =>
                    {
                        // 
                        postAlert(
                            `Incorrect\n${ targetVerb.politeForm }\nmeans to\n${ targetVerb.meanings.join( ", " ) }`,
                            "incorrect"
                        )
                    } )
                }
                return handleStudyLoop()
            }
        }

        submitButton.onclick = handleSubmitButton



        let handleCopyButton = () =>
        {
            let dictionaryDomObject = document.createElement( "input" )
            dictionaryDomObject.value = JSON.stringify( [ ...dictionary ] )
            document.body.appendChild( dictionaryDomObject )
            dictionaryDomObject.select()
            document.execCommand( "copy" )
            document.body.removeChild( dictionaryDomObject )
            dictionaryDomObject = null
        }

        let handleReset = () =>
        {
            removeLocalStorage( localStorageName )
            answerDictionary = [ ...STATICDICTIONARY ]
            levels = [ ...handleGetChunks( STATICDICTIONARY ) ]
            levelActive = 0
            dictionary = levels[ levelActive ]
            setLocalStorage()
            let randomWord = getRandomWord( word =>
            {
                postAlert(
                    `New Word!, ${ word.politeForm } means to ${ word.meanings.join(
                        ", "
                    ) }`
                )
            } ) || "no random word"
            targetVerb = { ...targetVerb, ...randomWord }
            previousWord = randomWord
            targetVerb.meaning = null
            randomWord.hasLearned = true

        }


        //Get a random word from the dictionary of words, only grabs from learned words, unless they're all known or there aren't any learned words
        // where it will then grab it from the selection of words from the dictionary that haven't been learned yet

        let disableInputs = () =>
        {
            input.disabled = true
            input.classList.add( "disabled" )
            submitButton.classList.add( "disabled" )
            submitButton.disabled = true
        }

        let enableInputs = () =>
        {
            input.disabled = false
            input.classList.remove( "disabled" )
            submitButton.classList.remove( "disabled" )
            submitButton.disabled = false
        }

        // Study loop
        let handleStudyLoop = () =>
        {
            input.focus()

            renewInput() //Not sure the purpose of this, it replaces the existing input node with a new intance, think it has to do with autokana, and dynamically entering it

            //   If there are no words available to study, prompt the user to enter verbs
            if ( !GAME.getLevelDictionary().length > 0 )
            {
                setDisplay( "Please enter words into the dictionary to study..." )
                disableInputs()
                return 0
            }
            let displayText, targetVerb = GAME.getTargetVerb() || null

            if ( !GAME.getTargetVerb() )
            {
                targetVerb = GAME.newTargetVerb()
            }

            if ( !GAME.getHiraganaInput() )
            {
                input.placeholder =
                    "Enter the romanji to automatically convert it to hiragana..."
                displayText = `
            <p>Please enter</p>
        <p class="kanji">
    ${ targetVerb.kanji.word }
    </p>
    <p>
            ${ targetVerb.shouldKnow
                        ? "You should know this..."
                        : targetVerb.politeForm
                    }
    </p>
            `
                setDisplay( displayText )
                $( input ).autokana()
            } else
            {
                input.placeholder = "Enter the meanings, separated by a comma..."
                displayText = `
            <p>Translate Below</p>
        <p class="kanji">
    ${ targetVerb.kanji.word }</p>
    <p>
${ targetVerb.shouldKnow
                        ? "You should know this..."
                        : targetVerb.politeForm
                    }
    </p>
            `
                setDisplay( displayText )
            }
            // 
            // 
            // render statistics
            let newInfo = `Level: ${ GAME.levelActive + 1 }/${ GAME.levels.length
                }, Score: ${ GAME.getScore() }, Word Count:${ GAME.getLearnedWords().length }`
            // , Mode: ${ modeActive }
            //   , Input Target: ${targetModeActive}
            info.innerText = newInfo
        }

        let postAlert = ( alertString, type ) =>
        {
            if ( !notificationContainer ) return 0
            let alert = document.createElement( "div" )
            alert.classList.add( "alert" )
            alert.innerText = alertString
            alert.classList.add( type )
            notificationContainer.appendChild( alert )
            setTimeout( () => notificationContainer.removeChild( alert ), 3000 )
        }
        let renewInput = () =>
        {
            input.replaceWith( backupInput.cloneNode( true ) )
            input = document.querySelector( "#input" )
            submitButton.onclick = handleSubmitButton
            input.focus()
        }
        let handleForgetButton = () =>
        {
            let targetWord = dictionary.find(
                word => word.politeForm === targetVerb.politeForm
            )
            targetWord.increaseTimesWrong()
            // postAlert("You forgot", "incorrect")
        }

        let handleCheckAnswers = ( targetVerb, answer ) =>
        {
            let results = 0
            //PROBLEM this might be stripping out spaces during the answers that contain spaces
            let r = /\s*\,\s*/gim
            let answers = [ ...answer.split( r ) ]
            answers.forEach( separatedAnswer =>
            {
                if ( targetVerb.meanings.find( meaning => separatedAnswer.match( meaning ) ) )
                    results++
            } )
            return results
        }

        // Core loop funciton
        let loopMain = () =>
        {
            handleStudyLoop()
        }

        // Initiate the loop
        $( document ).ready( function ()
        {
            loopMain()
            // attach auto-kana plugin with default options
        } )



        document.addEventListener( "keyup", e =>
        {
            if ( e.key === "Enter" ) handleSubmitButton()
            switch ( e.key )
            {
                case "Enter":
                    handleSubmitButton()
                    break
                case "?":
                    clearInputValue()
                    handleForgetButton()
                    break
            }
        } )

    }
}