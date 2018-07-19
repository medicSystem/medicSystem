import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import $ from 'jquery';
import NewsBox from "../Home/NewsBox"

export default class News extends Component {
    render() {
        let newsContent = $('#1');

        return(
            <div>
                <div className='content'>
                    <NewsBox />
                </div>
            </div>
        )
    }
}