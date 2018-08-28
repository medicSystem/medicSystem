import React from "react";
import PropTypes from "prop-types";
import SwipeableViews from "react-swipeable-views";
import { withStyles } from "@material-ui/core/styles";
import AppBar from "@material-ui/core/AppBar";
import Tabs from "@material-ui/core/Tabs";
import Tab from "@material-ui/core/Tab";
import Typography from "@material-ui/core/Typography";
import green from "@material-ui/core/colors/green";
import axios from "axios";
import Loader from "react-loader-spinner";
import IconButton from "@material-ui/core/IconButton";
import Clear from "@material-ui/icons/Clear";
import Icon from "@material-ui/core/Icon";
import { Link } from "react-router-dom";
import Button from "@material-ui/core/Button";

function TabContainer(props) {
  const { children, dir } = props;

  return (
    <Typography component="div" dir={dir} style={{ padding: 8 * 3 }}>
      {children}
    </Typography>
  );
}

TabContainer.propTypes = {
  children: PropTypes.node.isRequired,
  dir: PropTypes.string.isRequired
};

const styles = theme => ({
  root: {
    backgroundColor: theme.palette.background.paper,
    width: 500,
    position: "relative",
    minHeight: 200
  },
  fab: {
    position: "absolute",
    bottom: theme.spacing.unit * 2,
    right: theme.spacing.unit * 2
  },
  fabGreen: {
    color: theme.palette.common.white,
    backgroundColor: green[500]
  }
});

class FloatingActionButtonZoom extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: 0,
      loading: true
    };
    this.handleChange = (event, value) => {
      this.setState({ value });
    };
    this.handleChangeIndex = index => {
      this.setState({ value: index });
    };
  }
  componentDidMount() {
    this.setState({ loading: true }, () => {
      axios
        .get("/patientsList")
        .then(response => {
          this.setState({ loading: false, patientsList: response.data });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  render() {
    const { classes, theme } = this.props;
    const { patientsList, loading } = this.state;
    const transitionDuration = {
      enter: theme.transitions.duration.enteringScreen,
      exit: theme.transitions.duration.leavingScreen
    };
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
    //console.log(this.state.patientsList[0][0])
    return (
      <div className={classes.root + " " + "deck"}>
        <AppBar position="static" color="default">
          <Tabs
            value={this.state.value}
            onChange={this.handleChange}
            indicatorColor="primary"
            textColor="primary"
            fullWidth
          >
            <Tab label="All Users" />
          </Tabs>
        </AppBar>
        <SwipeableViews
          axis={theme.direction === "rtl" ? "x-reverse" : "x"}
          index={this.state.value}
          onChangeIndex={this.handleChangeIndex}
        >
          <TabContainer dir={theme.direction}>
            <table className="table table-borderless table-dark">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Birthdat</th>
                  <th scope="col">Mobile</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">Role</th>
                  <th scope="col">Add to ban</th>
                </tr>
              </thead>
              <tbody>
                {patientsList.map(patientsList => (
                  <tr id="list">
                    <th scope="row">""</th>
                    <td>{patientsList[0].id}</td>
                    <td>{patientsList[0].last_name}</td>
                    <td>{patientsList[0].first_name}</td>
                    <td>{patientsList[0].id}</td>
                    <td>{patientsList[0].id}</td>
                    <td>{patientsList[0].id}</td>
                 {/*   <td
                      key={usersList.id + usersList.role}
                      onClick={() => {
                        axios.post("/addBan/" + usersList.id);
                      }}
                    >
                      <IconButton>
                        <Clear />
                      </IconButton>
                    </td>*/}
                  </tr>
                ))}
              </tbody>
            </table>
          </TabContainer>
        </SwipeableViews>
      </div>
    );
  }
}

FloatingActionButtonZoom.propTypes = {
  classes: PropTypes.object.isRequired,
  theme: PropTypes.object.isRequired
};

export default withStyles(styles, { withTheme: true })(
  FloatingActionButtonZoom
);
