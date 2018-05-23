import {LIST_ARTICLES} from '../actions/index';

export default (state=[], action) => {
    switch (action.type)
    {
        case LIST_ARTICLES:
            return action.payload;
        default:
            return state;
    }
}