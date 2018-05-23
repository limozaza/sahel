/**
 * Created by zakaria on 22/04/18.
 */
import { combineReducers } from 'redux';
import listArticleReducer from './listArticleReducer'

const rootReducer = combineReducers({
    listArticle: listArticleReducer
});

export default rootReducer;