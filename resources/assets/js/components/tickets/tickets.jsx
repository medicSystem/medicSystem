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
import GridList from "@material-ui/core/GridList";
import { LinkContainer } from "react-router-bootstrap";
import GridListTile from "@material-ui/core/es/GridListTile/GridListTile";
import Button from "@material-ui/core/es/Button/Button";

const styles = theme => ({
  root: {
    width: "100%",
    marginTop: theme.spacing.unit * 3,
    overflowX: "auto"
  },
  table: {
    minWidth: 300
  },
  gridList: {
    width: "100%",
    height: "100%",
      border: "2px"
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
    this.setState({ show: true });
    this.setState({ loading: true }, () => {
      axios
          .get(`/getBusyTime/1/${dateFormat(value, "isoDate")}`)
        .then(response => {
          this.setState({ loading: false, tickets: response.data });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  doctorTable() {
    const { classes } = this.props;
    const { tickets, patient } = this.state;
    console.log(tickets)

    return (
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
    );
  }

  patientTable() {
    const { classes } = this.props;
    const { tickets } = this.state;
      /* console.log(tickets);*/
    return (
      <GridList className={classes.gridList} >
        {tickets.map(tickets => (
          <GridListTile key={tickets} cols={0.3} rows={0.3}>
            <Button>{tickets}</Button>
          </GridListTile>
        ))}
      </GridList>
      /* {/!*<Table className={classes.table}>
        <TableHead>
          <TableRow>
            <TableCell numeric>Time</TableCell>
            <TableCell numeric>Book it</TableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {tickets.map(tickets => {
            return (
              <TableRow key={tickets}>
                <TableCell numeric>{tickets}</TableCell>
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
      </Table>*!/}*/
    );
  }

  render() {
    const { classes } = this.props;
    const { loading } = this.state;
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
              <Paper className={classes.root}>{this.doctorTable()}</Paper>
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
