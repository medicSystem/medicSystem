import React, { Component } from "react"
import {Button, FormControl, FormGroup, Glyphicon, Nav, Navbar, NavItem} from "react-bootstrap"
import { Link } from "react-router-dom"
import { LinkContainer } from "react-router-bootstrap"
import "./header.css"


export default class Header extends Component {
    render() {
        return (
            <Navbar collapseOnSelect fixedTop={true} >
                <Navbar.Header>
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
                    <Nav >
                        <LinkContainer to="/" activeClassName="selected">
                            <NavItem>Home</NavItem>
                        </LinkContainer>

                        <LinkContainer to="/news" activeClassName="selected">
                            <NavItem>News</NavItem>
                        </LinkContainer>

                        <LinkContainer to="/dictionary" activeClassName="selected">
                            <NavItem>Dictionary</NavItem>
                        </LinkContainer>

                        <NavItem href="/home">Profile</NavItem>
                    </Nav>
                    <Nav pullRight>

                            <NavItem href="/login">Login</NavItem>



                            <NavItem eventKey={2} href="register">Register</NavItem>

                    </Nav>
                    <Navbar.Form pullRight>
                        <FormGroup>
                            <FormControl type="text" placeholder="Search" />
                        </FormGroup>{" "}
                        <Button type="submit">
                            <Glyphicon glyph="search" />
                        </Button>
                    </Navbar.Form>

                </Navbar.Collapse>
            </Navbar>
        )
    }
}
