import React, {Component} from 'react';
import './App.css';
import {BrowserRouter, Route} from 'react-router-dom';
import Home from './components/Home';
import Therapeutic from "./components/directory/Therapeutic";
import Dental from "./components/directory/Dental";
import Header from "./components/Header";
import Infection from "./components/directory/Infection";
import Footer from "./components/Footer";
import News from "./components/News/News";

class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <div>
                    <Header/>
                    <Route exact path='/' component={Home}/>
                    <Route path='/directory/therapeutic' component={Therapeutic}/>
                    <Route path='/directory/dental' component={Dental}/>
                    <Route path='/directory/infection' component={Infection}/>
                    <Route path='/directory/news' component={News}/>
                    <Footer/>
                </div>
            </BrowserRouter>
        );
    }
}

export default App;