import React, {Component} from 'react'
/*import 'bootstrap/dist/css/bootstrap.css';*/
import './style/header.css'
import {Link} from 'react-router-dom';
import $ from 'jquery';

export default class Header extends Component {
    render() {
        var header = $(".navbar")
        $(window).scroll(
            function() {
                var top = $(this).scrollTop();
                if (top >= 100) {
                    $('.navbar').removeClass("navbar-dark bg-dark");
                    $('.navbar').addClass("navbar-light bg-light");
                } else if (top<=200) {
                    $('.navbar').removeClass("navbar-light bg-light");
                    $('.navbar').addClass("navbar-dark bg-dark");
                }
                $(document).ready(function(){
                    $('.collapse ul li Link').click(function(){
                        if($(this).parent().hasClass('active')){
                            return false;
                        }
                        $('.collapse ul li Link').removeClass('active');
                        $(this).parent().addClass('active')
                    })
                })
            }
        )
        //reload page
        $(document).ready(function () {
            $('#login').on('click', function () {
                location.reload();
            })
            $('#home').on('click', function () {
                location.reload();
            })
        })
        return(
            <nav className="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <a className="navbar-brand" href="#"><img className="logo" height="40px" width="40px" src="https://api.icons8.com/download/08733e130578dfd047d6a49bdda07b37746510ac/Color/PNG/512/Very_Basic/plus-512.png"/>Medic Social</a>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <Link to='/' className="nav-link" >Home <span className="sr-only">(current)</span></Link>
                        </li>
                        <li className="nav-item dropdown">
                            <a className="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Directory
                            </a>
                            <div className="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <Link to='/therapeutic' className="dropdown-item">Therapeutic department</Link>
                                <Link to='/dental' className="dropdown-item">Dental department</Link>
                                <Link to='/infection' className="dropdown-item">Infection department</Link>
                                <a className="dropdown-item">Department of ultrasound diagnostics</a>
                                <a className="dropdown-item">Neurological department</a>
                                <a className="dropdown-item">Ophthalmology department</a>
                                <a className="dropdown-item">Otorhinolaryngological department</a>
                                <a className="dropdown-item">Surgery department</a>
                            </div>
                        </li>
                        <li className="nav-item">
                            {/*<a className="nav-link" href="#">Profile</a>*/}
                            <Link to = '/home' id='home' className='nav-link'>Profile</Link>
                        </li>
                    </ul>
                    <Link to = '/login' id='login' className='btn btn-success sign-in'>Sign-in</Link>
                </div>
            </nav>
        )
    }
};