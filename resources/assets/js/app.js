/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/*import 'bootstrap/dist/css/bootstrap.css';*/
import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './Apps';
import registerServiceWorker from './registerServiceWorker';
import {Router, Route, browserHistory} from 'react-router';
import { MuiThemeProvider, createMuiTheme } from '@material-ui/core/styles';


const theme = createMuiTheme({
    palette: {
        primary: {
            main: '#4caf50',
            contrastText: '#ffffff',
        }
    },
});

function Apps() {
    return (
        <MuiThemeProvider theme={theme}>
            <App/>
        </MuiThemeProvider>
    );
}

ReactDOM.render(<Apps/>, document.getElementById('root'));
registerServiceWorker();
