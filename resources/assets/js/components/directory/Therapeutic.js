import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import DirectoryNav from "./DirectoryNav";


export default class Therapeutic extends Component {
    render(){
        return(
            <div className='content'>
                <div className='directory-content'>
                    <div className='navigation-panel'>
                        <DirectoryNav/>
                    </div>
                    <div className='directory-content'>
                        <img src='https://www.denvertavern.net/wp-content/uploads/2017/08/Red-Light-Bulbs-Sleep.jpg' />
                    </div>
                </div>
            </div>

    )
    }
}