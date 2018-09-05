import React, { Component } from "react";
import Calendar from "react-calendar";
import "./tickets.css";
import { Button, Modal } from "react-bootstrap";
import axios from "axios/index";
import Loader from "react-loader-spinner";

export default class Tickets extends Component {
  constructor(props, context) {
    super(props, context);

    this.handleShow = this.handleShow.bind(this);
    this.handleClose = this.handleClose.bind(this);

    this.state = {
      show: false,
        loading: true
    };
  }

  handleClose() {
    this.setState({ show: false });
  }

  handleShow() {
    this.setState({ show: true });
  }
  componentDidMount() {
/*    const id = this.props.match.params.id;*/
    this.setState({ loading: true }, () => {
      axios
        .get(`/getBusyTime/${1}/1997-01-10`)
        .then(response => {
          this.setState({ loading: false, tickets: response.data});
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  render() {
    const { classes } = this.props;
    const { tickets, loading } = this.state;
    if (loading) {
      return (
        <div className="loader-container news-box-loader">
          <Loader
            id="loader"
            type="TailSpin"
            color="#4caf50"
            height={80}
            width={80}
          />
        </div>
      );
    }
    console.log(this.state.tickets)
    return (
      <div>
        <Calendar
          className="tickets"
          tileClassName="tile"
          onClickDay={this.handleShow}
        />
        <Modal show={this.state.show} onHide={this.handleClose}>
          <Modal.Header closeButton>
            <Modal.Title>Modal heading</Modal.Title>
          </Modal.Header>
          <Modal.Body>
            <h4>Text in a modal</h4>
          </Modal.Body>
          <Modal.Footer>
            <Button onClick={this.handleClose}>Close</Button>
          </Modal.Footer>
        </Modal>
      </div>
    );
  }
}
