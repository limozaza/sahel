import { ADD_TOKEN_IN_COOKIE } from '../actions/index'

export const cookieReducer = (state= {}, action) => {
    switch (action.type){
        case ADD_TOKEN_IN_COOKIE:
            return action.payload;
        default:
            return state;
    }
}