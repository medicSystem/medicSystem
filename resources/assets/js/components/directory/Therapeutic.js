import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import DirectoryNav from "./DirectoryNav";


export default class Therapeutic extends Component {
    render(){
        return(
            <div>
                <DirectoryNav/>
                <div className='content'>
                    <img src='https://www.denvertavern.net/wp-content/uploads/2017/08/Red-Light-Bulbs-Sleep.jpg' />
                </div>
            </div>
        )
    }
}