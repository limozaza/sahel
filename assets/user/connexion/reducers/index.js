import { combineReducers } from 'redux';
import { reducer as formReducer} from 'redux-form';


import { userReducer } from './userReducer';
import { cookieReducer } from './cookiesReducer'


const rootReducer = combineReducers({
    form: formReducer,
    userConnexion: userReducer,
    cookie: cookieReducer
});

export default rootReducer;