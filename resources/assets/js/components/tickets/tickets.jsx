import React, { Component } from "react";
import Calendar from "react-calendar";
import "./tickets.css";
import { Button, Modal } from "react-bootstrap";
import axios from "axios/index";
import Loader from "react-loader-spinner";
import dateFormat from "dateformat";
import List from "../list/list";

export default class Tickets extends Component {
  constructor(props, context) {
    super(props, context);

    this.handleShow = this.handleShow.bind(this);
    this.handleClose = this.handleClose.bind(this);

    this.state = {
      show: false,
      loading: false,
        tickets: []
    };
  }

  handleClose() {
    this.setState({ show: false });
  }

  handleShow(value) {
    this.setState({ show: true });
    console.log("111111111111");
    this.setState({ loading: true }, () => {
      axios
        .get(`/getBusyTime/2/${dateFormat(value, "isoDate")}`)
        .then(response => {
          this.setState({ loading: false, tickets: response.data });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  /* componentDidMount() {
    const id = this.props.match;
    console.log("111111111111");
    this.setState({ loading: true }, () => {
      axios
        .get(`/getBusyTime/2/${this.state.date}`)
        .then(response => {
          this.setState({ loading: false, tickets: response.data });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }

    componentWillReceiveProps() {
        const id = this.props.match;
        console.log("222222222");
        this.setState({ loading: true }, () => {
            axios
                .get(`/getBusyTime/2/${this.state.date}`)
                .then(response => {
                    this.setState({ loading: false, tickets: response.data });
                })
                .catch(error => {
                    console.log(error);
                });
        });
    }*/
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
    console.log(this.state.tickets);
    return (
      <div>
        <Calendar
          className="tickets"
          tileClassName="tile"
          onClickDay={value => this.handleShow(value)}
        />
        <Modal show={this.state.show} onHide={this.handleClose}>
          <Modal.Header closeButton>
            <Modal.Title>Business hours</Modal.Title>
          </Modal.Header>
          <Modal.Body>
           {/* <List>*/}
              {this.state.tickets.map(tickets => (
                  <p>{tickets} </p>
                 /* <ListItem>
                    <ListItemText primary={tickets}/>


                  </ListItem>*/
              ))}
          {/*  </List>*/}
          </Modal.Body>
        </Modal>
      </div>
    );
  }
}
