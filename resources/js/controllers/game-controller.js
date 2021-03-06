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
        // autokana' : 'standard
        document.addEventListener( 'DOMContentLoaded', () =>
        {
            let autokana = document.getElementById( 'autokana' ),
                standard = document.getElementById( 'standard' )

            if ( autokana ) autokana.focus()
            if ( standard ) standard.focus()

        } )
    }
}