import React, { Component } from "react";
import "../../App.css";
import { Link } from "react-router-dom";
import { LinkContainer } from "react-router-bootstrap";
import Users from "../../components-admin/Users";
import News from "../../components-admin/News";
import Doctors from "../../components-admin/Doctors";
import Coupons from "../../components-admin/Coupons";
import Medcard from "../medcard/medcard";
import Patients from "../patients/patients";
import { Route } from "react-router";

class DoctorApp extends Component {
  render() {
    return (
      <div className="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div className="mdl-layout__drawer">
          <Link to="#" className="mdl-navigation__link">
            <span className="mdl-layout-title"> Doctor </span>
          </Link>
          <nav className="mdl-navigation">
            <Link to="/doctor/patients" className="mdl-navigation__link">
              Patients
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

        <main className="mdl-layout__content page-content">
          <div>
            <Route path="/doctor/patients" component={Patients} />
              <Route path="/doctor/medcard/:id" component={Medcard} />
          </div>
        </main>
      </div>
    );
  }
}

export default DoctorApp;
