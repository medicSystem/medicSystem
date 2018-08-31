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
import ListItem from "@material-ui/core/es/ListItem/ListItem";
import Divider from "@material-ui/core/es/Divider/Divider";
import ListItemText from "@material-ui/core/es/ListItemText/ListItemText";
import MuiThemeProvider from "@material-ui/core/es/styles/MuiThemeProvider";
import { createMuiTheme } from "@material-ui/core/styles/index";
import List from "@material-ui/core/es/List/List";

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
const text = createMuiTheme({
  typography: {
    fontSize: 18
  }
});

const styles = theme => ({
  root: {
    backgroundColor: theme.palette.background.paper,
    width: 500,
    position: "relative",
    minHeight: 200
  },
  tabRoot: {
    width: "100%",
    maxWidth: 1360,
    backgroundColor: theme.palette.background.paper
  },
  fab: {
    position: "absolute",
    bottom: theme.spacing.unit * 2,
    right: theme.spacing.unit * 2
  },
  fabGreen: {
    color: theme.palette.common.white,
    backgroundColor: green[500]
  },
  list: {
    color: "red"
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
    const id = this.props.match.params.id;
    this.setState({ loading: true }, () => {
      axios
        .get(`/getMedicalCardForDoctor/${id}`)
        .then(response => {
          this.setState({ loading: false, patient: response.data[0] });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  render() {
    const { classes, theme } = this.props;
    const { patient, loading } = this.state;
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
    console.log(patient);
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
            <Tab label="Medical Card" />
          </Tabs>
        </AppBar>
        <SwipeableViews
          axis={theme.direction === "rtl" ? "x-reverse" : "x"}
          index={this.state.value}
          onChangeIndex={this.handleChangeIndex}
        >
          <TabContainer dir={theme.direction}>
            <div className={classes.tabRoot}>
              <List component="nav">
                <MuiThemeProvider theme={text}>
                  <ListItem>
                    <ListItemText primary={`Last name: ${patient.last_name}`} />
                  </ListItem>
                  <Divider />
                  <ListItem>
                    <ListItemText
                      primary={`First name: ${patient.first_name}`}
                    />
                  </ListItem>
                  <Divider />
                  <ListItem>
                    <ListItemText primary={`Sex: ${patient.sex}`} />
                  </ListItem>
                  <Divider />
                  <ListItem>
                    <ListItemText primary={`Date: ${patient.birthday}`} />
                  </ListItem>
                  <Divider />
                  <ListItem>
                    <ListItemText
                      primary={`Address: ${patient.postal_address}`}
                    />
                  </ListItem>
                  <Divider />
                  <ListItem>
                    <ListItemText
                      primary={`Phone number: ${patient.phone_number}`}
                    />
                  </ListItem>
                  <Divider />
                  <ListItem>
                    <ListItemText primary={`Allergy: ${patient.allergy}`} />
                  </ListItem>
                  <Divider />

                  <ListItem>
                    <ListItemText
                      primary={`Chronic disease: ${patient.chronic_disease}`}
                    />
                  </ListItem>
                  <Divider />
                </MuiThemeProvider>
              </List>
            </div>
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
