import { Controller } from "stimulus"

export default class extends Controller
{
    // static targets = [ "flexible" ]
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

        // const target = document.querySelector("#target")
        const separator = 'ENDOFLINE'
        let targetSelector = '.flexible-input-container'

        const handleFlexibleInputs = ( targetSelector = '.flexible-input-container', separatorString = 'ENDOFLINE' ) =>
        {
            const flexibleInputContainers = [ ...document.querySelectorAll( targetSelector ) ]

            flexibleInputContainers.forEach( target =>
            {
                // const addButton = target.querySelector(".add-new:last-of-type")
                let consolidatedInput = target.querySelector( ".consolidated-input" )

                // -- funcitons --
                let getInputsFromTextArea = () =>
                {
                    let effectInputs = [ ...consolidatedInput.value.split( separatorString ) ]
                    return effectInputs

                }
                let clearInputs = () =>
                {
                    let oldInputs = [ ...target.querySelectorAll( ".card-input" ) ]
                    oldInputs.forEach( input =>
                    {
                        input.parentElement.removeChild( input )
                    } )
                }


                // Create Effect Input
                let createEffectInput = ( effect ) =>
                {
                    let newCardInput = document.createElement( 'div' )
                    newCardInput.classList.add( 'card-input' )

                    let newInput = document.createElement( 'input' )
                    newInput.classList.add( "flexible-input" )
                    newInput.placeholder = "Input..."
                    //  newInput.value = ''
                    newInput.value = effect || ''//.replace(separatorString,'')
                    newInput.onchange = updateMaster

                    let newButtonsContainer = document.createElement( 'div' )
                    newButtonsContainer.classList.add( 'buttons-container' )

                    let newAddButton = document.createElement( 'div' )
                    newAddButton.classList.add( 'button' )
                    newAddButton.classList.add( 'add-new' )
                    newAddButton.onclick = addInputButton

                    let newDeleteButton = document.createElement( 'div' )
                    newDeleteButton.classList.add( 'button' )
                    newDeleteButton.classList.add( 'delete' )
                    newDeleteButton.onclick = deleteInput

                    newButtonsContainer.appendChild( newDeleteButton )
                    newButtonsContainer.appendChild( newAddButton )
                    newCardInput.appendChild( newInput )
                    newCardInput.appendChild( newButtonsContainer )

                    return target.appendChild( newCardInput )
                }

                // Render Inputs
                let renderInputs = () =>
                {
                    clearInputs()
                    let effectsValues = getInputsFromTextArea()
                    effectsValues.forEach( ( effect ) =>
                    {
                        if ( effect == null ) effect = ''
                        createEffectInput( effect )
                    } )

                }

                // Update Master
                let updateMaster = () =>
                {
                    consolidatedInput.value = ''
                    let inputs = [ ...target.querySelectorAll( ".flexible-input" ) ]
                    clearInputs()
                    let updatedEffects = [ ...inputs.map( input => input.value ) ].join( separatorString )
                    consolidatedInput.value = updatedEffects
                    renderInputs()
                }

                let addInputButton = () =>
                {
                    let tmp = consolidatedInput.value + separatorString
                    consolidatedInput.value = tmp
                    renderInputs()
                    updateMaster()
                }
                // Delete Effect
                let deleteInput = ( e ) =>
                {
                    target.removeChild( e.target.parentElement.parentElement )
                    updateMaster()
                }

                renderInputs()
            } )

        }

        document.addEventListener( 'DOMContentLoaded', () =>
        {
            handleFlexibleInputs( targetSelector, separator )
        } )
    }
}