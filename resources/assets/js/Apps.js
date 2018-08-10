import React, {Component} from 'react';
import './App.css';
import {BrowserRouter, Route} from 'react-router-dom';
import Home from './components/Home';
import Header from "./components/Header";
import Footer from "./components/Footer";
import News from "./components/News/News";
import Directory from "./components/directory/Directory";
import axios from "axios/index";
import AdminApp from "./AdminApp";
import DoctorApp from "./DoctorApp";
import PatientApp from "./PatientApp";


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
        let pathName = window.location.pathname;
        let url = pathName.split('/')
        switch (url[1]) {
            case 'admin':
                return (
                    <BrowserRouter>
                        <div>
                            <Route path='/admin' component={AdminApp}/>
                        </div>
                    </BrowserRouter>
                );
                break;
            case 'doctor':
                return (
                    <BrowserRouter>
                        <div>
                            <Route path='/doctor' component={DoctorApp}/>
                        </div>
                    </BrowserRouter>
                );
                break;
            case 'patient':
                return (
                    <BrowserRouter>
                        <div>
                            <Route path='/patient' component={PatientApp}/>
                        </div>
                    </BrowserRouter>
                );
                break;
            default:
                return (
                    <BrowserRouter>
                        <div>
                            <div>
                                <Header/>
                                <Route exact path='/' component={Home}/>
                                <Route path='/main/news' component={News}/>
                                {this.state.categories.map(categories =>
                                    <Route path={'/directory/' + categories} component={Directory}/>
                                )}
                                <Footer/>
                            </div>
                        </div>
                    </BrowserRouter>
                );
                break;
        }
    }
}

export default App;