export default class Verb
{
    constructor ( {
        meaning = "",
        meanings = [],
        rePoliteForm = "",
        politeForm = "",
        kanji = {
            word: "",
            meaning: ""
        },
        hasLearned,
        shouldKnow,
        timesWrong,
        timesRight
    } )
    {
        this.timesWrongOffset = 3
        //     change to array of meanings, allow for comma separated entries for multiple meanings and multiple points
        this.meanings = meanings || null
        this.meaning = meaning || null
        this.politeForm = politeForm || null
        this.rePoliteForm = rePoliteForm || null
        this.hasLearned = hasLearned || false
        this.shouldKnow = shouldKnow || false
        this.timesWrong = timesWrong || 0
        this.timesRight = timesRight || 0
        this.kanji = kanji
    }
    increaseTimesCorrect = ( callback ) =>
    {
        this.timesRight++

        if ( !this.hasLearned ) this.toggleLearned()

        if (
            this.timesRight >
            0 + this.timesWrong + this.timesWrongOffset &&
            !this.shouldKnow
        )
        {
            this.toggleKnown()
        }
        if ( callback ) return callback( this )
    }

    increaseTimesWrong = ( callback ) =>
    {
        this.timesWrong++
        if ( this.shouldKnow ) this.toggleKnown()
        if ( callback ) return callback( this )
    }
    toggleKnown = () => this.shouldKnow = !this.shouldKnow
    toggleLearned = () => this.hasLearned = !this.hasLearned

}