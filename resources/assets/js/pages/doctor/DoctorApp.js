import React, { Component } from "react";
import "../../App.css";
import PropTypes from "prop-types";
import { Link } from "react-router-dom";
import { LinkContainer } from "react-router-bootstrap";
import Users from "../../components-admin/Users";
import News from "../../components-admin/News";
import Doctors from "../../components-admin/Doctors";
import Coupons from "../../components-admin/Coupons";
import Medcard from "../medcard/medcard";
import Patients from "../patients/patients";
import { Route } from "react-router";
import Drawer from "@material-ui/core/es/Drawer/Drawer";
import List from "@material-ui/core/es/List/List";
import withStyles from "@material-ui/core/es/styles/withStyles";
import ListItem from "@material-ui/core/es/ListItem/ListItem";
import ListItemText from "@material-ui/core/es/ListItemText/ListItemText";

const drawerWidth = 240;

const styles = theme => ({
  root: {
    flexGrow: 1,
    height: 440,
    zIndex: 1,
    overflow: "hidden",
    position: "relative",
    display: "flex"
  },
  appBar: {
    zIndex: theme.zIndex.drawer + 1
  },
  drawerPaper: {
    position: "relative",
    width: drawerWidth
  },
  content: {
    flexGrow: 1,
    backgroundColor: theme.palette.background.default,
    padding: theme.spacing.unit * 3,
    minWidth: 0 // So the Typography noWrap works
  },
  toolbar: theme.mixins.toolbar
});

class DoctorApp extends Component {
  render() {
    return (
      <div className="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div className="mdl-layout__drawer">
          <span className="mdl-layout-title"> Doctor </span>

          <nav className="mdl-navigation">
            <Link to="/doctor/patients" className="mdl-navigation__link">
              Patients
            </Link>
            <Link to="#" className="mdl-navigation__link">
              Tickets
            </Link>
            <Link to="#" className="mdl-navigation__link">
              Chat
            </Link>
            <Link to="#" className="mdl-navigation__link">
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

DoctorApp.propTypes = {
  classes: PropTypes.object.isRequired
};

export default withStyles(styles)(DoctorApp);
