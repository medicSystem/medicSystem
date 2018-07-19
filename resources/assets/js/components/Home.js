import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import Carousel from "./Home/Carousel";
import NewsBox from "./Home/NewsBox";


export default class Home extends Component {
    render(){
        return(
            <div>
                <div className='content'>
                    <Carousel />
                    <NewsBox />
                </div>
            </div>
        )
    }
}