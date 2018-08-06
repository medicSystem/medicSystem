import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import $ from 'jquery';
// import NewsBox from "../Home/NewsBox";
import axios from "axios";
import Loader from 'react-loader-spinner';

export default class News extends Component {
    constructor(props) {
        super(props);
        this.state = {
            news: [],
            loading: false,
        };

    }
    componentDidMount() {
        let parameter = 'long';
        let string = ['/news/' + parameter];
        this.setState({loading: true}, () => {
                axios.get(string.join())
                    .then((response) => {this.setState({loading: false, news: response.data,});
                    })
                    .catch((error)=>{
                        console.log(error);
                    });
        })
        console.log(this)
    }
    render() {
        const {news, loading} = this.state;
        return(
            <div>
                <div className='content'>
                    {loading ? <div className='loader-container'><Loader id='loader' type="TailSpin" color="#4caf50" height={80} width={80}/></div> : this.state.news.map(news =>
                        <div className='card mb-3'>
                            <div className='card-body'>
                                <h5 className='card-title'>{news.news_name}</h5>
                                <p className='card-text'>{news.content}</p>
                                <p className='card-text text-muted'>{news.created_at}</p>
                            </div>
                        </div>
                    )}
                </div>
            </div>
        )
    }
}