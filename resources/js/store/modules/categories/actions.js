
import * as actions from '../../action-types'
import * as mutations from '../../mutations-types'
// use axios
import axios from 'axios'

export default{
    [actions.GET_CATEGORIES]({ commit }){
        axios.get('/api/categories')
            .then(response =>{
                console.log(response)
                // if(response.data.success == true){
                //     commit(mutations.SET_CATEGORIES, response.data.data)
                // }
            })
    }
}