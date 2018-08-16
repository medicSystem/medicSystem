import React, { Component } from "react";
import "../../components/app/app.css";
import { Link } from "react-router-dom";

class DoctorApp extends Component {
  render() {
    return (
      <div className="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div className="mdl-layout__drawer">
          <span className="mdl-layout-title">AdminPanel</span>
          <nav className="mdl-navigation">
            <Link to="#" className="mdl-navigation__link">
              Users
            </Link>
            <Link to="#" className="mdl-navigation__link" href="">
              Doctors
            </Link>
            <Link to="#" className="mdl-navigation__link" href="">
              News
            </Link>
            <Link to="#" className="mdl-navigation__link" href="">
              Coupons
            </Link>
            <Link to="#" className="mdl-navigation__link" href="">
              Notifications
            </Link>
            <Link to="#" className="mdl-navigation__link" href="">
              Support
            </Link>
          </nav>
        </div>
        <main className="mdl-layout__content">
          <div className="page-content" />
        </main>
      </div>
    );
  }
}

export default DoctorApp;
