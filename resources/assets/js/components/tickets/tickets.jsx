import React, {Component} from "react";
import Calendar from "react-calendar";
import "./tickets.css";
import {Modal} from "react-bootstrap";
import axios from "axios/index";
import Loader from "react-loader-spinner";
import dateFormat from "dateformat";
import PropTypes from "prop-types";
import FolderIcon from "@material-ui/icons/Folder";
import {withStyles} from "@material-ui/core/styles/index";
import Paper from "@material-ui/core/es/Paper/Paper";
import Table from "@material-ui/core/es/Table/Table";
import TableHead from "@material-ui/core/es/TableHead/TableHead";
import TableRow from "@material-ui/core/es/TableRow/TableRow";
import TableCell from "@material-ui/core/es/TableCell/TableCell";
import TableBody from "@material-ui/core/es/TableBody/TableBody";
import IconButton from "@material-ui/core/es/IconButton/IconButton";
import GridList from "@material-ui/core/GridList";
import {LinkContainer} from "react-router-bootstrap";
import GridListTile from "@material-ui/core/es/GridListTile/GridListTile";
import Button from "@material-ui/core/es/Button/Button";
import Select from 'react-select';

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
      tickets: [{time: "no tickets", patient_id: 0}],
      selectedOption: '',
      doctors: [],
    };
  }

  componentDidMount() {
    let options = [];
    this.setState({ loading: true }, () => {
      axios
      .get("/getDoctors")
      .then(response => {
        response.data.forEach((item) =>{
          options.push({value: item.id, label: item.last_name + " " + item.first_name });


        });
        this.setState({ loading: false, doctors: options });
      })
      .catch(error => {
        console.log(error);
      });
    });
  }

  handleClose() {
    this.setState({show: false});
  }

  handleShow(value) {
    this.setState({show: true});
    this.setState({loading: true}, () => {
      axios
      .get(`/getBusyTime/1/${dateFormat(value, "isoDate")}`)
      .then(response => {
        this.setState({loading: false, tickets: response.data});
      })
      .catch(error => {
        console.log(error);
      });
    });
  }

  handleShowPatients(value) {
    this.setState({show: true});
    this.setState({loading: true}, () => {
      axios
      .get(`/getFreeTime/1/${dateFormat(value, "isoDate")}`)
      .then(response => {
        this.setState({loading: false, tickets: response.data}, () => console.log(this.state.tickets));
      })
      .catch(error => {
        console.log(error);
      });
    });
  }

  doctorTable() {
    const {classes} = this.props;
    const {tickets, patient} = this.state;
    console.log(tickets)
    return (
        <Table className={classes.table}>
          <TableHead>
            <TableRow>
              <TableCell numeric>Time</TableCell>
              <TableCell numeric>Patient</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            {tickets.map(tickets => {
              return (
                  <TableRow key={tickets.patient_id}>
                    <TableCell numeric>{tickets.time}</TableCell>
                    <TableCell numeric>
                      <IconButton>
                        {
                          <LinkContainer
                              to={`/doctor/medcard/${tickets.patients_id}`}
                          >
                            <FolderIcon/>
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
    const {classes} = this.props;
    const {tickets} = this.state;
    return (
        <div>

          <GridList className={classes.gridList}>
            {tickets.map(tickets => (
                <GridListTile key={tickets.id} cols={0.4} rows={0.3}>
                  <Button onClick={()=>this.handleClose()}>{tickets.time.slice(-5)}</Button>
                </GridListTile>
            ))}
          </GridList>
        </div>
    );
  }

  handleChangeSelect(selectedOption) {
    this.setState({selectedOption});
  };

  render() {
    const {classes} = this.props;
    const {loading, doctors, selectedOption} = this.state;
    const path = window.location.pathname;
    console.log(this.state.selectedOption);
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
    if (path === "/patient/tickets") {
      return (
          <div>
            <div style={{width: 400, marginBottom: 50}}>
            <Select

                defaultValue={doctors[0]}
                options={doctors}
               // value={selectedOption}
                onChange={()=>this.handleChangeSelect}
            />
            </div>
            <Calendar
                className="tickets"
                tileClassName="tile"
                onClickDay={value => this.handleShowPatients(value)}
            />
            <Modal show={this.state.show} onHide={this.handleClose}>
              <Modal.Header closeButton>
                <Modal.Title>Free hours</Modal.Title>
              </Modal.Header>
              <Modal.Body>
                <Paper className={classes.root}>{this.patientTable()}</Paper>
              </Modal.Body>
            </Modal>
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
