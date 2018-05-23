import React, {Component} from 'react';


export default class Pagination extends Component{



    changePage = (page)=> {
        console.log(page)
    }



    render(){

        const pages = [];

        for (let i = this.props.data.offset + 1; i <= this.props.data.pages; i++) {
            pages.push(
                <li  key={i} className="page-item" onClick={()=>this.changePage(i)}><a className="page-link" href="#"> {i}</a></li>
            );
        }

        return (
            <nav aria-label="Page navigation example">
                <ul className="pagination">

                    <li className="page-item">
                        <a className="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span className="sr-only">Previous</span>
                        </a>
                    </li>
                    <li className="page-item">
                        <a className="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&lsaquo;</span>
                            <span className="sr-only">Previous</span>
                        </a>
                    </li>
                    {pages}
                    <li className="page-item">
                        <a className="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&rsaquo;</span>
                            <span className="sr-only">Next</span>
                        </a>
                    </li>
                    <li className="page-item">
                        <a className="page-link" href="#" aria-label="Last">
                            <span aria-hidden="true">&raquo;</span>
                            <span className="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        );
    }
}


