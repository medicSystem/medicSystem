import React, { Component } from "react";
import { withStyles } from "@material-ui/core/styles";
import { LinkContainer } from "react-router-bootstrap";
import ListItem from "@material-ui/core/es/ListItem/ListItem";
import ListItemIcon from "@material-ui/core/es/ListItemIcon/ListItemIcon";
import ListItemText from "@material-ui/core/es/ListItemText/ListItemText";
import SupportIcon from "@material-ui/icons/Build";
import PatientsIcon from "@material-ui/icons/SupervisorAccount";
import TicketsIcon from "@material-ui/icons/Receipt";
import ChatIcon from "@material-ui/icons/Chat";
import UserIcon from "@material-ui/icons/Person";

class UserMenuList extends Component {
  constructor(props) {
    super(props);
    this.state = {
      header: ""
    };
  }
  choseIcon() {
    switch (this.props.icon) {
      case "user":
        return <UserIcon />;
      case "chat":
        return <ChatIcon />;
      case "tickets":
        return <TicketsIcon />;
      case "patients":
        return <PatientsIcon />;
      case "support":
        return <SupportIcon />;
      default:
        return <UserIcon />;
    }
  }
  render() {
    return (
      <LinkContainer to={this.props.link}>
        <ListItem button>
          <ListItemIcon>{this.choseIcon()}</ListItemIcon>
          <ListItemText primary={this.props.role} />
        </ListItem>
      </LinkContainer>
    );
  }
}
export default UserMenuList;
