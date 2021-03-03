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
            if ( !STATICDICTIONARY.length > 0 )
            {
                setDisplay( "An error has occurred, can't GET dictionary..." )
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