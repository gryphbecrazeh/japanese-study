import { Controller } from "stimulus"
import axios from "axios"

var $ = require( "jquery" )

export default class extends Controller
{
    static values = { path: String }


    handleReport ( e )
    {
        axios.post( this.pathValue ).then(
            res =>
            {
                e.target.innerText = "Thank you!"
                e.target.setAttribute( 'disabled', true )
            }
        ).catch( err => console.log( err ) )
    }
}