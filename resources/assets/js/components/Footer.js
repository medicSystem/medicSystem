import React, {Component} from 'react'
/*import 'bootstrap/dist/css/bootstrap.css';*/
import './style/header.css'

export default class Footer extends Component {
    render(){
        return (
            <nav className='navbar bottom navbar-dark bg-dark fixed-bottom'>
                <div className='navbar-brand foot-elm'> <a href="callto:000000000">+000000000</a>
                    <br/>
                    <a href="mailto:example@example.example">example@example.example</a>
                </div>
                <p className='navbar-brand foot-elm'>©MEDIC SOCIAL 2018</p>
            </nav>
        )
    }
}