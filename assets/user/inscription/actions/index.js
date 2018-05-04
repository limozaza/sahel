import $ from 'jquery'
import Routing from '../../../js/Utils/Routing';

export const CREATE_CONNEXION = "CREATE_CONNEXION";

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