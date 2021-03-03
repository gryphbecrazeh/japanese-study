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

        this.score = 0
        this.previousWord = {}
        this.targetVerb = null
        this.dictionary = STATICDICTIONARY
        this.userInput = null
        this.userHiragana = null
        this.userMeaning = null
        this.targetModes = [ "politeForm", "meaning", "rePoliteForm" ]
        this.targetModeActive = "meaning"

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
    wordCount = () => this.getDictionary().length ?? 0
    // 
    // 
    // API Calls
    increaseLevel = ( callback ) =>
    {
        // API CALL UPDATE GAME ON RETURN
    }
    getNewVerb = ( callback ) =>
    {
        // API CALL UPDATE GAME ON RETURN
    }

    getDictionary = () => this.dictionary
    resetTargetVerb = () => this.targetVerb = new Verb( { meaning: "", politeForm: "", rePoliteForm: "" } )
    // 
    // 
    // Minimal Experience
    getLearnedWords = () => [ ...this.getDictionary().filter( word => word.hasLearned ) ]
    // 
    // 
    // Significant Experience
    getKnownWords = () => [ ...this.getLearnedWords().filter( word => word.shouldKnow ) ]
    // 
    // 
    // Struggling
    getStrugglingWords = () => [ ...this.getLearnedWords().filter( word => !word.timesRight > word.timesWrong ) ]

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

        let learnedWords = [ ...this.getDictionary() ]
        let knownWords = [ ...this.getKnownWords() ]
        let strugglingWords = [ ...this.getStrugglingWords() ]
        // If all words are learned
        if ( knownWords.length === learnedWords.length && knownWords.length === 10 )
            this.increaseLevel()

        // If there are no learned words, or all learned words are known and there are still new words available for the round
        if (
            ( learnedWords.length < 10 && knownWords.length === learnedWords.length )
        )
        {
            //     grab a random word, and update the dictionary to update the word
            let targetWord = new Verb( this.getNewVerb() )

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

}
