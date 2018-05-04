import { CREATE_CONNEXION } from '../actions/index'

export const userReducer = (state= {}, action) => {
    switch (action.type){
        case CREATE_CONNEXION:
            return action.payload;
        default:
            return state;
    }
}