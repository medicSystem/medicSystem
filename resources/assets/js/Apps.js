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
import Directory from "./components/directory/Directory";
import axios from "axios/index";

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categories: [],
            dictionary: [],
        };
    }

    componentDidMount() {
        axios.get('/dictionary/categoryName')
            .then((response) => {
                this.setState({categories: response.data});
                let url = window.location.pathname;
                let newUrl = url.split('/');
                let string = ['/dictionary/' + newUrl[2]];
                axios.get(string.join())
                    .then((response) => {
                        this.setState({dictionary: response.data});
                    }).catch((error) => {
                    console.log(error);
                });
            })
            .catch((error) => {
                console.log(error);
            });
    }
    render() {
        return (
            <BrowserRouter>
                <div>
                    <Header/>
                    <Route exact path='/' component={Home}/>
                    {/*<Route path='/directory/therapeutic' component={Therapeutic}/>*/}
                    {/*<Route path='/directory/dental' component={Dental}/>*/}
                    {/*<Route path='/directory/infection' component={Infection}/>*/}
                    <Route path='/main/news' component={News}/>
                    {/*<Route path='/directory/' component={Directory}/>*/}
                    {this.state.categories.map(categories =>
                        <Route path={'/directory/' + categories} component={Directory}/>
                    )}
                    <Footer/>
                </div>
            </BrowserRouter>
        );
    }
}

export default App;