import { Controller } from "stimulus"

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
        let collapseButton = this.element.querySelector( '.collapse-button' )
        collapseButton.addEventListener( 'click', () =>
        {
            if ( this.element.classList.contains( 'open' ) )
            {
                this.element.classList.remove( 'open' )
            } else
            {
                this.element.classList.add( 'open' )
            }

        } )
    }
}