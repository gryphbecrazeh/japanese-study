const Verb = require( "./Verb" ).default


export default class GAME_OBJ 
{

    constructor ( STATICDICTIONARY )
    {
        if ( !STATICDICTIONARY )
        {
            alert( 'No Static Dictionary...' )
            return 0
        }

        this.canSave = 0 // check if local storage is available
        this.score = 0
        this.previousWord = {}
        this.targetVerb = null
        this.userInput = null
        this.userHiragana = null
        this.userMeaning = null
        this.targetModes = [ "politeForm", "meaning", "rePoliteForm" ]
        this.targetModeActive = "meaning"


        let handleGetChunks = ( array = [], chunkSize = 10 ) =>
        {
            array = [ ...array ]
            let chunks = []
            let totalChunks = Math.floor( array.length / chunkSize )
            let remaining = array.length / chunkSize
            for ( let i = 0; i < totalChunks; i++ )
            {
                chunks.push( array.splice( 0, chunkSize ) )
            }
            chunks.push( array.splice( 0, remaining ) )
            return [ ...chunks ]
        }


        this.levels = [ ...handleGetChunks( STATICDICTIONARY ) ]
        this.levelActive = 0
        this.completeDictionary = [ ...STATICDICTIONARY ] // Answer Dictionary - contains all words
        this.dictionary = [ ...this.levels[ this.levelActive ] ] // User dictionary - only contains words the user has been delegated
        this.answerDictionary = [ ...this.completeDictionary ] // Answer Dictionary - contains all words
        this.modeActive = "study"


    }
    // 
    // 
    // Data-persistance
    loadSavedGame = () =>
    {
        // 
        // 
        // ## Local Storage
        // 
        let getLocalStorage = ( storageName = localStorageName ) =>
        {
            let tempObj = {
                ...JSON.parse( localStorage.getItem( storageName ) )
            }
            return tempObj
        }
        // set up from localstorage
        let oldGame = getLocalStorage()

        if ( oldGame && enableLocalStorage )
        {
            GAME = { ...oldGame }
        }
        // Depends on this.canSave
        let {
            score,
            previousWord,
            targetVerb,
            levels,
            levelActive,
            completeDictionary
        } = oldGane
        this.score = score
        this.previousWord = previousWord
        this.targetVerb = targetVerb
        this.levels = levels
        this.levelActive = levelActive
        this.completeDictionary = completeDictionary
    }
    saveGame = () =>
    {

        let setLocalStorage = ( storageName = localStorageName ) =>
        {
            let statusObj = {
                dictionary: dictionary,
                answerDictionary: answerDictionary,
                levels: levels,
                levelActive: levelActive,
                wordCount: GAME.wordCount(),
                score: score
            }
            localStorage.setItem( storageName, JSON.stringify( statusObj ) )
        }

        // Depends on this.canSave
        let gameSave = {
            score: this.score,
            previousWord: this.previousWord,
            targetVerb: this.targetVerb,
            levels: this.levels,
            levelActive: this.levelActive,
            completeDictionary: this.completeDictionary
        }
    }
    deleteSavedGame = () =>
    {

        let removeLocalStorage = ( storageName = localStorageName ) =>
        {
            localStorage.removeItem( storageName )
        }
        removeLocalStorage()
    }
    // 
    // 
    // Score

    getScore = () => this.score
    increaseScore = () => this.score += 1
    resetScore = () => this.score = 0
    // 
    // 
    // API
    kanjiAlive = () =>
    {

        // Comment this out?
        let getKanjiMeaning = async ( kanji ) =>
        {
            if ( !kanji ) return 0
            let apiQuery = `https://kanjialive-api.p.rapidapi.com/api/public/search/${ kanji }`
            let result = fetch( 'http://example.com/movies.json' )
                .then( response => response.json() )
                .then( data => console.log( data ) )
        }
        getKanjiMeaning( "勉" )

    }
    wordCount = () => this.getLevelDictionary().length ?? 0
    // Levels
    increaseLevel = () =>
    {
        this.levelActive = this.levelActive++
        this.dictionary = this.levels[ this.levelActive ]
    }
    getLevelDictionary = () => this.levels[ this.levelActive ]
    updateLevelDictionary = () => this.levels[ this.levelActive ] = [ ...this.getLevelDictionary().filter( word => word.kanji.word !== this.getTargetVerb().kanji.word ), this.getTargetVerb() ]
    resetTargetVerb = () => this.targetVerb = new Verb( { meaning: "", politeForm: "", rePoliteForm: "" } )
    // Word lists
    // 
    // 
    // No Experience
    getNewWords = () => [ ...this.getLevelDictionary().filter( word => !word.hasLearned ) ]
    // 
    // 
    // Minimal Experience
    getLearnedWords = () => [ ...this.getLevelDictionary().filter( word => word.hasLearned ) ]
    // 
    // 
    // Significant Experience
    getKnownWords = () => [ ...this.getLearnedWords().filter( word => word.shouldKnow ) ]
    // 
    // 
    // Struggling
    getStrugglingWords = () => [ ...this.getLearnedWords().filter( word => !word.timesRight > word.timesWrong ) ]
    getRandomIndex = array =>
    {
        return Math.floor( Math.random() * Math.floor( array.length ) )
    }

    getProbableDicitonary = ( dictionary = [], probability = 0 ) =>
    {
        let resultDictionary = []
        for ( let i = 0; i < probability; i++ )
        {
            resultDictionary.push( ...dictionary )
        }
        return resultDictionary
    }
    getRandomWord = ( callback ) =>
    {

        let learnedWords = [ ...this.getLearnedWords() ]
        let knownWords = [ ...this.getKnownWords() ]
        let newWords = [ ...this.getNewWords() ]
        let strugglingWords = [ ...this.getStrugglingWords() ]

        // If there are no new words, all learned words are known by the user
        if ( !newWords.length > 0 && knownWords.length === learnedWords.length )
            this.increaseLevel()

        // If there are no learned words, or all learned words are known and there are still new words available for the round
        if (
            ( !learnedWords.length > 0 || knownWords.length === learnedWords.length ) &&
            newWords.length > 0
        )
        {
            //     grab a random word, and update the dictionary to update the word
            let targetWord = new Verb( newWords[ this.getRandomIndex( newWords ) ] )
            // postAlert(
            //     `New Word!, ${ targetWord.politeForm } means to ${ targetWord.meanings.join(
            //         ", "
            //     ) }`
            // )
            targetWord.hasLearned = true
            this.setTargetVerb( targetWord )
            this.updateLevelDictionary()
            if ( callback )
            {
                callback( targetWord )
            }
            return targetWord
        }
        //     End Get New Word
        // Establish probabilities of certain words, then do something absurd to create probabilities
        let probabilities = {
            known: 10,
            learned: 40,
            struggling: 50
        }
        let probableDictionary = [
            ...this.getProbableDicitonary( learnedWords, probabilities.learned ),
            ...this.getProbableDicitonary( knownWords, probabilities.known ),
            ...this.getProbableDicitonary( strugglingWords, probabilities.struggling )
        ]
        // Filter out previous word from probable dicitonary
        if ( learnedWords.length > 1 && this.previousWord )
        {
            probableDictionary = probableDictionary.filter(
                word => word.kanji.word != this.previousWord.kanji.word
            )
        }
        let randWord = probableDictionary[ this.getRandomIndex( probableDictionary ) ]

        if ( randWord != null ) return randWord
    }
    // Temporary Verb
    getTargetVerb = () => this.targetVerb
    setTargetVerb = newVerb => this.targetVerb = new Verb( newVerb )
    newTargetVerb = () =>
    {
        return this.setTargetVerb( this.getRandomWord() )
    }
    // 
    // 
    // User input
    getUserInput = () => this.userInput
    setUserInput = input => this.userInput = input
    clearUserInput = () => this.userInput = null
    // 
    // 
    // User Hiragana
    getHiraganaInput = () => this.userHiragana
    setHiraganaInput = () =>
    {
        this.userHiragana = this.userInput
        this.clearUserInput()
    }
    clearHiraganaInput = () => this.userHiragana = null

    // 
    // 
    // User Meaning
    getMeaningInput = () => this.userMeaning
    setMeaningInput = () =>
    {
        this.userMeaning = this.userInput
        this.clearUserInput()
    }
    clearMeaningInput = () => this.userMeaning = null
    clearInputs = () =>
    {
        this.clearUserInput()
        this.clearHiraganaInput()
        this.clearMeaningInput()
    }

    success = ( callback ) =>
    {
        let targetVerb = this.getTargetVerb()
        targetVerb.increaseTimesCorrect()
        this.updateLevelDictionary()
        this.clearInputs()
        this.increaseScore()
        this.newTargetVerb()
        this.previousWord = targetVerb
        if ( callback ) callback()
    }
    fail = ( callback ) =>
    {
        let targetVerb = this.getTargetVerb()
        targetVerb.increaseTimesWrong()
        this.updateLevelDictionary()
        this.clearInputs()
        this.resetScore()
        this.newTargetVerb()
        if ( callback ) callback()

    }

}
