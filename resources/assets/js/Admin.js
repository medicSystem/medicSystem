import React, { Component } from 'react';
import './index.css';
import AdminApp from './AdminApp';
import {BrowserRouter, Route} from 'react-router-dom';

class Admin extends Component {
    render(){
        return(
            <BrowserRouter>
                <div>
                    <AdminApp />
                    <Route path='/admin' component={AdminApp}/>
                </div>
            </BrowserRouter>
        )
    }
}


export default Admin;