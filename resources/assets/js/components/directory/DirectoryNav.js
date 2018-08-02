import React, { Component } from 'react';
import {Link} from 'react-router-dom';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import '../style/directorynav.css'
import axios from 'axios';

export default class DirectoryNav extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categories: [],
        };
    }
    componentDidMount() {
        axios.get('/directories/category')
            .then(response =>
            this.setState({categories: response.data}))
    }
    render(){
        return (
            <div className='navigation-panel'>
                <div className='list-group directory-nav'>
                    <Link className="list-group-item list-group-item-action" to='/directory/therapeutic'>Therapeutic Department</Link>
                    <Link className="list-group-item list-group-item-action" to='/directory/dental'>Dental department</Link>
                    <Link className="list-group-item list-group-item-action" to='/directory/infection'>Infection department</Link>
                    {this.state.categories.map( categories =>
                        <div>
                            <Link className="list-group-item list-group-item-action" to='/directory/therapeutic'>{category.category}</Link>
                            <Link className="list-group-item list-group-item-action" to='/directory/dental'>{category.category}</Link>
                            <Link className="list-group-item list-group-item-action" to='/directory/infection'>{category.category}</Link>
                        </div>
                    )}
                </div>
            </div>
        )
    }
}