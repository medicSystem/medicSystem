import React, { Component } from "react";
import Calendar from "react-calendar";
import "./tickets.css";
import { Modal } from "react-bootstrap";
import axios from "axios/index";
import Loader from "react-loader-spinner";
import dateFormat from "dateformat";
import PropTypes from "prop-types";
import FolderIcon from "@material-ui/icons/Folder";
import { withStyles } from "@material-ui/core/styles/index";
import Paper from "@material-ui/core/es/Paper/Paper";
import Table from "@material-ui/core/es/Table/Table";
import TableHead from "@material-ui/core/es/TableHead/TableHead";
import TableRow from "@material-ui/core/es/TableRow/TableRow";
import TableCell from "@material-ui/core/es/TableCell/TableCell";
import TableBody from "@material-ui/core/es/TableBody/TableBody";
import IconButton from "@material-ui/core/es/IconButton/IconButton";
import { LinkContainer } from "react-router-bootstrap";

const styles = theme => ({
  root: {
    width: "100%",
    marginTop: theme.spacing.unit * 3,
    overflowX: "auto"
  },
  table: {
    minWidth: 300
  }
});

class Tickets extends Component {
  constructor(props, context) {
    super(props, context);

    this.handleShow = this.handleShow.bind(this);
    this.handleClose = this.handleClose.bind(this);

    this.state = {
      show: false,
      loading: false,
      patient: [],
      tickets: [{ time: "no tickets", patient_id: 0 }]
    };
  }

  handleClose() {
    this.setState({ show: false });
  }

  handleShow(value) {
    console.log(1);
    this.setState({ show: true });
    console.log(2);
    this.setState({ loading: true }, () => {
      axios
        .get(`/getBusyTime/2/${dateFormat(value, "isoDate")}`)
        .then(response => {
          this.setState({ loading: false, tickets: response.data });
        })
        .catch(error => {
          console.log(error);
        });
      console.log("lol");
    });
  }
  /*  componentDidMount() {
    const id = this.props.match;
    console.log("2222");
    this.setState({ loading: true }, () => {
      axios
        .get("/getActiveCoupon")
        .then(response => {
          this.setState({ loading: false, allTickets: response.data });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }*/

  render() {
    const { classes } = this.props;
    const { tickets, patient, loading } = this.state;
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
    console.log(this.state.patient);
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
            <Paper className={classes.root}>
              <Table className={classes.table}>
                <TableHead>
                  <TableRow>
                    <TableCell numeric>Time</TableCell>
                    <TableCell numeric>First name</TableCell>
                    <TableCell numeric>Patient</TableCell>
                  </TableRow>
                </TableHead>
                <TableBody>
                  {tickets.map(tickets => {
                    return (
                      <TableRow key={tickets.patient_id}>
                        <TableCell numeric>{tickets.time}</TableCell>
                        <TableCell numeric>{patient}</TableCell>
                        <TableCell numeric>
                          <IconButton>
                            {
                              <LinkContainer
                                to={`/doctor/medcard/${tickets.patients_id}`}
                              >
                                <FolderIcon />
                              </LinkContainer>
                            }
                          </IconButton>
                        </TableCell>
                      </TableRow>
                    );
                  })}
                </TableBody>
              </Table>
            </Paper>
          </Modal.Body>
        </Modal>
      </div>
    );
  }
}
Tickets.propTypes = {
  classes: PropTypes.object.isRequired
};

export default withStyles(styles)(Tickets);
