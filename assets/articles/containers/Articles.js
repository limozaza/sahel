import React, {Component} from 'react';
import {connect} from 'react-redux';
import { bindActionCreators } from 'redux';

import {listArticles} from '../actions/index'

import Loading from '../../Utils/Loading';
import Pagination from '../../Utils/Pagination';

class Articles extends Component{

    state = {
        list_article : 0,
        pagination: {
            limit :0,
            offset:0,
            pages:0,
            total_items:0
        }
    }

    componentWillMount(){
        this.props.listArticles()
    }



    render(){
        let listItems = ""
        const list = this.props.listArticle.data

        if(list === undefined){
            listItems = <Loading/>
        }else{
            this.state.pagination = this.props.listArticle.meta
            listItems = list.map((article) =>
                <li key={article.id}>{article.title}</li>
            );
        }


        return(
            <div className="col-6">
                <ul>
                    {listItems}
                </ul>
                <Pagination data={this.state.pagination}/>
            </div>

        );
    }
}


const mapStateToProps = (state) => {
    return {
        listArticle: state.listArticle
    }
};
const mapDispatchToProps = (dispatch) => {
    return bindActionCreators({listArticles},dispatch);
};
export default connect(mapStateToProps,mapDispatchToProps)(Articles);