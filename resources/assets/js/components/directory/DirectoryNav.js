import React, { Component } from 'react';
import {Link} from 'react-router-dom';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import '../style/directorynav.css'

export default class DirectoryNav extends Component {
    render(){
        return(
            <div className='list-group directory-nav'>
                <Link className="list-group-item list-group-item-action" to='/directory/therapeutic'>Therapeutic Department</Link>
                <Link className="list-group-item list-group-item-action" to='/directory/dental'>Dental department</Link>
                <Link className="list-group-item list-group-item-action" to='/directory/infection'>Infection department</Link>
            </div>
        )
    }
}