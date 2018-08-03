import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import $ from 'jquery';
// import NewsBox from "../Home/NewsBox";
import axios from "axios";

export default class News extends Component {
    constructor(props) {
        super(props);
        this.state = {
            news: [],
        };

    }
    componentDidMount()
    {
        let parameter = 'long';
        let string = ['/news/' + parameter];
        axios.get(string.join())
            .then((response) => {
                this.setState({news: response.data})
            })
            .catch((error)=>{
                console.log(error);
            });
    }
    render() {
        return(
            <div>
                <div className='content'>
                    {this.state.news.map( news =>
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