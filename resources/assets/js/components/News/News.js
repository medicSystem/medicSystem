import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import $ from 'jquery';
import NewsBox from "../Home/NewsBox";
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
        axios.get('/news')
            .then((response) => {
                this.setState({news: response.data})
            })
            .catch((error)=>{
                console.log(error);
            });
    }
    render() {
        let newsContent = $('#1');

        return(
            <div>
                <div className='content'>
                    <NewsBox />
                    {this.state.news.map( news => <li>{news.id}</li>)}
                </div>
            </div>
        )
    }
}