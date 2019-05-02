import React, { Component } from "react"
import { Navbar } from "react-bootstrap"

export default class Footer extends Component {
  render() {
    return (
        <Navbar fixedBottom={true}>
          <Navbar.Header>
            <Navbar.Brand>
              <a href="#home">Brand</a>
            </Navbar.Brand>
            <Navbar.Toggle />
          </Navbar.Header>
          <Navbar.Collapse>
            <Navbar.Text>
              <Navbar.Link href="mailto:example@example.example">
                example@example.example
              </Navbar.Link>
            </Navbar.Text>
            <Navbar.Text pullRight>©MEDIC SOCIAL 2018</Navbar.Text>
          </Navbar.Collapse>
        </Navbar>
    )
  }
}
