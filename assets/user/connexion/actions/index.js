import $ from 'jquery'
import Routing from '../../../js/Utils/Routing';

export const CREATE_CONNEXION = "CREATE_CONNEXION";
export const ADD_TOKEN_IN_COOKIE = "ADD_TOKEN_IN_COOKIE";


export const loginUser = (values) => {
    return dispatch => {
        $.ajax(
            {
                type: "POST",
                url: Routing.generate('add_token'),
                data: values,
                success: function (data) {
                    dispatch({
                        type: CREATE_CONNEXION,
                        payload: data
                    });
                }
            }
        )
    }
}


export const addTokenIncookie = (values) => {
    return dispatch => {
        location.href=Routing.generate('homepage')
        /*$.ajax(
            {
                type: "POST",
                url: Routing.generate('add_token_cookie'),
                data: values,
                success: function (data) {
                    dispatch({
                        type: ADD_TOKEN_IN_COOKIE,
                        payload: data
                    });
                }
            }
        )*/
    }
}