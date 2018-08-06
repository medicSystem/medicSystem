import React, {Component} from 'react';
import {Link} from 'react-router-dom';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import '../style/directorynav.css'
import axios from 'axios';
import DirectoryNav from "./DirectoryNav";
import Loader from 'react-loader-spinner'


export default class Directory extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categories: [],
            dictionary: [],
            loading: false,
        };
    }

    componentDidMount() {
        this.setState({loading: true}, () => {
            axios.get('/dictionary/categoryName')
                .then((response) => {
                    this.setState({loading: false, categories: response.data});
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
        })
    }

    render() {
        const { dictionary, loading } = this.state;
        return (
            <div className='content'>
                <div className='directory-content'>
                    <div className='navigation-panel'>
                        <div className='list-group directory-nav'>
                            {this.state.categories.map(categories =>
                                    <Link className="list-group-item list-group-item-action"
                                          to={/directory/ + categories}>{categories}</Link>
                            )}
                        </div>
                    </div>
                    <div>
                        {loading ? <Loader id='loader' type="Bars" color="#4caf50" height={80} width={80}/> : this.state.dictionary.map(dictionary =>
                            <div className='card mb-3'>
                                <div className='card-body'>
                                    <h5 className='card-title'>{dictionary.disease_name}</h5>
                                    <p className='card-text'>{dictionary.treatment}</p>
                                    <p className='card-text text-muted'>{dictionary.symptoms}</p>
                                </div>
                            </div>
                        )}
                        {/*{this.state.dictionary.map(dictionary =>*/}
                            {/*<div className='card mb-3'>*/}
                                {/*<div className='card-body'>*/}
                                    {/*<h5 className='card-title'>{dictionary.disease_name}</h5>*/}
                                    {/*<p className='card-text'>{dictionary.treatment}</p>*/}
                                    {/*<p className='card-text text-muted'>{dictionary.symptoms}</p>*/}
                                {/*</div>*/}
                            {/*</div>*/}
                        {/*)}*/}
                        {/*<Loader id='loader' type="Bars" color="#4caf50" height={80} width={80}/>*/}
                    </div>
                </div>
            </div>
        )
    }
}