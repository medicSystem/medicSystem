import React, { Component } from "react";
import { MenuItem, Nav, Navbar, NavDropdown, NavItem } from "react-bootstrap";
import { Link } from "react-router-dom";
import axios from "axios/index";
import { LinkContainer } from "react-router-bootstrap";
import "./navbar.css";

export default class NavBar extends Component {
  constructor(props) {
    super(props);
    this.state = {
      categories: []
    };
  }

  componentDidMount() {
    axios
      .get("/dictionary/categoryName")
      .then(response => {
        this.setState({ categories: response.data });
      })
      .catch(error => {
        console.log(error);
      });
  }

  render() {
    return (
      <Navbar inverse collapseOnSelect fixedTop={true}>
        <Navbar.Header bsStyle="custom">
          <Navbar.Brand>
            <Link to="/" className="navbar-brand" style={{ display: "flex" }}>
              <img
                className="logo"
                height="40px"
                width="40px"
                src="https://api.icons8.com/download/08733e130578dfd047d6a49bdda07b37746510ac/Color/PNG/512/Very_Basic/plus-512.png"
                style={{ marginTop: "-10px" }}
              />
              Medic Social
            </Link>
          </Navbar.Brand>
          <Navbar.Toggle />
        </Navbar.Header>
        <Navbar.Collapse>
          <Nav bsStyle="custom">
            <LinkContainer to="/main/news" activeClassName="selected">
              <NavItem>News</NavItem>
            </LinkContainer>

            <LinkContainer to="/" activeClassName="selected">
              <NavItem>Home</NavItem>
            </LinkContainer>

            <NavDropdown
              eventKey={4}
              title="Directory"
              id="basic-nav-dropdown"
              componentClass="null"
            >
              {this.state.categories.map(categories => (
                <LinkContainer
                  activeClassName="selected"
                  to={/directory/ + categories}
                  key={categories.id + categories}
                >
                  <MenuItem>{categories}</MenuItem>
                </LinkContainer>
              ))}
            </NavDropdown>

            <NavItem href="/home">Profile</NavItem>
          </Nav>
        </Navbar.Collapse>
      </Navbar>
    );
  }
}
