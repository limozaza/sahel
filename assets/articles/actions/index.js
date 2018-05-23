import Routing from '../../Utils/Routing';
import $ from 'jquery';

export const LIST_ARTICLES = "LIST_ARTICLES";

export const listArticles = (page,limit,filtres)=> {
    return dispatch => {
        setTimeout(
            function () {
                $.ajax(
                    {
                        type: "GET",
                        url: "http://127.0.0.1:8000/api/articles",//Routing.generate('article_list'),
                        data: {},
                        success: function (data) {
                            dispatch({
                                type: LIST_ARTICLES,
                                payload: data
                            });
                        }
                    }
                )
            },
            2000
        );
    }
}
