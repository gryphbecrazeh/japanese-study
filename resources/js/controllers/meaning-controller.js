// 理
import { Controller } from "stimulus"
import axios from 'axios'
export default class extends Controller
{
    // static targets = [ "flexible" ]
    static kanjiCache = []
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


        document.addEventListener( 'DOMContentLoaded', () =>
        {
            this.element.innerHTML = this.element.innerHTML.replace( /([一-龯])/gmi, '<span data-action="mouseover->meaning#showMeaning">$1</span>' )
            // Find all kanji characters in this.textcontent and replace them with spans that on hover display the meaning
        } )
    }
    showMeaning ( e )
    {
        let kanji = e.target.innerText
        let existingMeaning = e.target.getAttribute( 'meaning' ) ?? null
        if ( !existingMeaning )
        {
            axios.get( `https://kanjialive-api.p.rapidapi.com/api/public/kanji/${ kanji }`, {
                headers: {
                    "x-rapidapi-key": "f260165325msh799c5612f8301e1p1142d9jsn5885675adb0a",
                    "x-rapidapi-host": "kanjialive-api.p.rapidapi.com",
                    "useQueryString": true
                }
            } ).then( res =>
            {
                console.log( res )

                let meaning = res.data.kanji.meaning.english
                e.target.setAttribute( 'meaning', meaning )
            } ).catch( err => console.log( 'oh fuck', err ) )
        } else
        {
            console.log( 'cache', existingMeaning )
        }

    }
}