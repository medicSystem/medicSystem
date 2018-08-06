import React, {Component} from 'react';
import {Link} from 'react-router-dom';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import '../style/directorynav.css'
import axios from 'axios';

export default class DirectoryNav extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categories: [],
            dictionary: [],
        };
    }

    componentDidMount() {
        axios.get('/dictionary/categoryName')
            .then((response) => {
                this.setState({categories: response.data});
                let url = window.location.pathname;
                let newUrl = url.split('/');
                let string = ['/dictionary/' + newUrl[2]];
                axios.get(string.join())
                    .then((response) => {
                        this.setState({dictionary: response.data});
                    }).catch((error) => {
                            console.log(error);
                });
            })
            .catch((error) => {
                console.log(error);
            });
    }

    render() {
        return (
            <div className='navigation-panel'>
                <div className='list-group directory-nav'>
                    {this.state.categories.map(categories =>
                        <Link className="list-group-item list-group-item-action"
                              to={/directory/ + categories}>{categories}</Link>
                    )}
                </div>
                {/*{this.state.dictionary.map(dictionary =>*/}
                    {/*<div>*/}
                       {/*<li>{dictionary.disease_name}</li>*/}
                        {/*<li>{dictionary.treatment}</li>*/}
                        {/*<li>{dictionary.symptoms}</li>*/}
                    {/*</div>*/}
                {/*)}*/}
            </div>
        )
    }
}