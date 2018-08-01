import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import DirectoryNav from "./DirectoryNav";


export default class Infection extends Component {
    render(){
        return(
            <div className='content'>
                <div className='directory-content'>
                    <div className='navigation-panel'>
                        <DirectoryNav/>
                    </div>
                    <div className='directory-content'>
                        <img src='https://www.ucl.ac.uk/infection-immunity/sites/infection-immunity/files/research-landing-teaser-iit.jpg'/>
                    </div>
                </div>
            </div>

    )
    }
}