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
        axios.get('/dictionary/categoryName')
            .then((response) => {
                this.setState({categories: response.data})
            })
            .catch((error)=>{
                console.log(error);
            });
    }
    render(){
        return (
            <div className='navigation-panel'>
                <div className='list-group directory-nav'>
                    {this.state.categories.map( categories =>
                        <div>
                            <Link className="list-group-item list-group-item-action" to={/directory/+categories}>{categories}</Link>
                        </div>
                    )}
                </div>
            </div>
        )
    }
}