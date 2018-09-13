import React, { Component } from "react";
import PropTypes from "prop-types";
import { Route } from "react-router";
import { withStyles } from "@material-ui/core/styles";
import Drawer from "@material-ui/core/Drawer";
import AppBar from "@material-ui/core/AppBar";
import Toolbar from "@material-ui/core/Toolbar";
import List from "@material-ui/core/List";
import Typography from "@material-ui/core/Typography";
import IconButton from "@material-ui/core/IconButton";
import Hidden from "@material-ui/core/Hidden";
import MenuIcon from "@material-ui/icons/Menu";
import UserMenuList from "../user-menu-list/user-menu-list";

import Medcard from "../../pages/medcard/medcard";
import Patients from "../../pages/patients/patients";
import History from "../../pages/history/history";
import DoctorTickets from "../doctor-tickets/doctor-tickets";
import PatientTickets from "../patient-tickets/patient-tickets";

const drawerWidth = 240;

const styles = theme => ({
  root: {
    flexGrow: 1,
    zIndex: 1,
    overflow: "hidden",
    position: "relative",
    display: "flex",
    width: "100%"
  },
  appBar: {
    display: "block",
    position: "absolute",
    marginLeft: drawerWidth,
    [theme.breakpoints.up("md")]: {
      width: `calc(100% - ${drawerWidth}px)`
    }
  },
  navIconHide: {
    [theme.breakpoints.up("md")]: {
      display: "none"
    }
  },
  toolbar: theme.mixins.toolbar,
  drawerPaper: {
    width: drawerWidth,
    [theme.breakpoints.up("md")]: {
      position: "relative"
    }
  },
  content: {
    flexGrow: 1,
    backgroundColor: theme.palette.background.default,
    padding: theme.spacing.unit * 3
  }
});

const doctor = (
  <List>
    <UserMenuList role="Doctor" link="/doctor" icon="user" />
    <UserMenuList role="Patients" link="/doctor/patients" icon="patients" />
    <UserMenuList role="Tickets" link="/doctor/tickets" icon="tickets" />
    <UserMenuList role="Chat" link="/doctor" icon="chat" />
    <UserMenuList role="Support" link="/doctor" icon="support" />
  </List>
);

const patient = (
  <List>
    <UserMenuList role="Patient" link="/patient" icon="user" />
    <UserMenuList role="Doctor" link="/patient" icon="patients" />
    <UserMenuList role="Medcard" link="/patient" icon="tickets" />
    <UserMenuList role="Tickets" link="/patient/tickets" icon="tickets" />
    <UserMenuList role="Chat" link="/patient" icon="chat" />
    <UserMenuList role="Support" link="/patient" icon="support" />
  </List>
);

const admin = (
  <List>
    <UserMenuList role="Doctor" link="/doctor" icon="user" />
    <UserMenuList role="Patients" link="/doctor/patients" icon="patients" />
    <UserMenuList role="Tickets" link="/doctor" icon="tickets" />
    <UserMenuList role="Chat" link="/doctor" icon="chat" />
    <UserMenuList role="Support" link="/doctor" icon="support" />
  </List>
);
class UserMenu extends Component {
  constructor(props) {
    super(props);
    this.state = {
      mobileOpen: false,
      header: "Doctor"
    };

    this.handleDrawerToggle = this.handleDrawerToggle.bind(this);
    this.handleDrawerClose = this.handleDrawerClose.bind(this);
  }

  handleDrawerToggle() {
    this.setState(state => ({ mobileOpen: !state.mobileOpen }));
  }

  handleDrawerClose() {
    this.setState({ mobileOpen: false });
  }

  choseRole() {
    switch (this.props.user) {
      case "Doctor":
        return doctor;
      case "Patient":
        return patient;
      case "Admin":
        return "admin";
      default:
        return doctor;
    }
  }

  render() {
    const { classes, theme } = this.props;

    const drawer = (
      <div onClick={this.handleDrawerClose}>
        <div className={classes.toolbar} />
        {this.choseRole()}
      </div>
    );

    return (
      <div className={classes.root}>
        <AppBar className={classes.appBar}>
          <Toolbar>
            <IconButton
              color="inherit"
              aria-label="Open drawer"
              onClick={this.handleDrawerToggle}
              className={classes.navIconHide}
            >
              <MenuIcon />
            </IconButton>
            <Typography variant="title" color="inherit" noWrap>
              {this.props.user}
            </Typography>
          </Toolbar>
        </AppBar>
        <Hidden mdUp>
          <Drawer
            variant="persistent"
            anchor={theme.direction === "rtl" ? "right" : "left"}
            open={this.state.mobileOpen}
            onClose={this.handleDrawerToggle}
            classes={{
              paper: classes.drawerPaper
            }}
            ModalProps={{
              keepMounted: true
            }}
          >
            {drawer}
          </Drawer>
        </Hidden>
        <Hidden smDown implementation="css">
          <Drawer
            variant="permanent"
            open
            classes={{
              paper: classes.drawerPaper
            }}
          >
            {drawer}
          </Drawer>
        </Hidden>
        <main className={classes.content} onClick={this.handleDrawerClose}>
          <div className={classes.toolbar} />
          <Route path="/doctor/patients" component={Patients} />
          <Route path="/doctor/medcard/:id" component={Medcard} />
          <Route path="/doctor/history" component={History} />
          <Route path="/doctor/tickets" component={DoctorTickets} />
          <Route path="/patient/tickets" component={PatientTickets} />
        </main>
      </div>
    );
  }
}

UserMenu.propTypes = {
  classes: PropTypes.object.isRequired,
  theme: PropTypes.object.isRequired
};

export default withStyles(styles, { withTheme: true })(UserMenu);
