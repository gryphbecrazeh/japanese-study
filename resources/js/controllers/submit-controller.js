// 理
import ApplicationController from './application-controller'
import axios from 'axios'

export default class extends ApplicationController
{
    static targets = [ "input" ]
    static values ={ id:String, type:String, url:String }
    connect ()
    {
        console.log('connected')
    }

    async handleSubmit (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        axios.post(this.urlValue, {
            id:this.idValue,
            type:this.typeValue,
            value:this.inputTarget.value
        }).then(res=>this.success(res)).catch(err=>this.error(err))
    }
    success (response) {
        console.log('submitting')
        console.log(this.urlValue)

        console.log(response)
        this.dispatch('update', {
            ...response.data
        })
    }
    error(error) {
        console.log(error)
        this.dispatch('error', {
            ...error
        })
    }

}