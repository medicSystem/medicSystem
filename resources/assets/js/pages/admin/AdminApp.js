import React, { Component } from 'react';
import '../../App.css';
import { Route, Link } from 'react-router-dom';
import Users from '../../components-admin/Users';
import News from '../../components-admin/News';
import Coupons from "../../components-admin/Coupons";
import Doctors from "../../components-admin/Doctors";

class AdminApp extends Component {
    render() {
        return (
            <div className="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
                <div className="mdl-layout__drawer">
                    <span className="mdl-layout-title">AdminPanel</span>
                    <nav className="mdl-navigation">
                        <Link to='/admin/users' className="mdl-navigation__link">Users</Link>
                        <Link to='/admin/doctors' className="mdl-navigation__link" href="">Doctors</Link>
                        <Link to='/admin/news' className="mdl-navigation__link" href="">News</Link>
                        <Link to='/admin/coupons' className="mdl-navigation__link" href="">Coupons</Link>
                        <Link to='/admin/notifications' className="mdl-navigation__link" href="">Notifications</Link>
                        <Link to='/admin/support' className="mdl-navigation__link" href="">Support</Link>
                    </nav>
                </div>
                <main className="mdl-layout__content page-content">
                    <div>
                        <Route exact path='/admin/users' component={Users}/>
                        <Route exact path='/admin/doctors' component={Doctors}/>
                        <Route path='/admin/news' component={News}/>
                        <Route path='/admin/coupons' component={Coupons}/>
                        <Route path='/admin/notifications'/>
                        <Route path='/admin/support'/>
                    </div>
                </main>
            </div>
        );
    }
}

export default AdminApp;