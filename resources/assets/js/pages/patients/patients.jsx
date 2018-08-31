import React from "react";
import axios from "axios";
import PropTypes from "prop-types";
import { withStyles } from "@material-ui/core/styles";
import Avatar from "@material-ui/core/Avatar";
import IconButton from "@material-ui/core/IconButton";
import Typography from "@material-ui/core/Typography";
import FolderIcon from "@material-ui/icons/Folder";
import Loader from "react-loader-spinner";
import AppBar from "@material-ui/core/AppBar";
import Tabs from "@material-ui/core/Tabs";
import Tab from "@material-ui/core/Tab";
import SwipeableViews from "react-swipeable-views";
import { LinkContainer } from "react-router-bootstrap";
import green from "@material-ui/core/colors/green";
import { MuiThemeProvider, createMuiTheme } from "@material-ui/core/styles";
import Table from "@material-ui/core/es/Table/Table";
import TableHead from "@material-ui/core/es/TableHead/TableHead";
import TableRow from "@material-ui/core/es/TableRow/TableRow";
import TableCell from "@material-ui/core/es/TableCell/TableCell";
import TableBody from "@material-ui/core/es/TableBody/TableBody";
import Paper from "@material-ui/core/es/Paper/Paper";

function TabContainer(props) {
  const { children, dir } = props;

  return (
    <Typography
      component="div"
      dir={dir}
      style={{ padding: 8 * 3, fontSize: "5px" }}
    >
      {children}
    </Typography>
  );
}
const text = createMuiTheme({
  typography: {
    fontSize: 18
  }
});

TabContainer.propTypes = {
  children: PropTypes.node.isRequired,
  dir: PropTypes.string.isRequired
};

const styles = theme => ({
  root: {
    flexGrow: 1,
    maxWidth: 1200
  },
  tabRoot: {
    width: "100%",
    marginTop: theme.spacing.unit * 3,
    overflowX: "auto"
  },
  demo: {
    backgroundColor: theme.palette.background.paper
  },
  title: {
    margin: `${theme.spacing.unit * 4}px 0 ${theme.spacing.unit * 2}px`
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
  table: {
    minWidth: 700
  }
});

class InteractiveList extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: 0,
      loading: true,
      dense: false,
      secondary: false
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
    console.log(patientsList);
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
            <Tab label="Patients" />
          </Tabs>
        </AppBar>
        <SwipeableViews
          axis={theme.direction === "rtl" ? "x-reverse" : "x"}
          index={this.state.value}
          onChangeIndex={this.handleChangeIndex}
        >
          <TabContainer dir={theme.direction}>
            <MuiThemeProvider theme={text}>
              <Paper className={classes.tabRoot}>
                <Table className={classes.table}>
                  <TableHead>
                    <TableRow>
                      <TableCell />
                      <TableCell numeric>Last name</TableCell>
                      <TableCell numeric>First name</TableCell>
                      <TableCell numeric>Email</TableCell>
                      <TableCell numeric>Date</TableCell>
                      <TableCell numeric>Medcard</TableCell>
                    </TableRow>
                  </TableHead>
                  <TableBody>
                    {patientsList.map(patientsList => {
                      return (
                        <TableRow key={patientsList.patients_id}>
                          <TableCell component="th" scope="row">
                            <Avatar
                              src={`/upload/user/${patientsList.avatar}`}
                            />
                          </TableCell>
                          <TableCell numeric>
                            {patientsList.last_name}
                          </TableCell>
                          <TableCell numeric>
                            {patientsList.first_name}
                          </TableCell>
                          <TableCell numeric>{patientsList.email}</TableCell>
                          <TableCell numeric>
                            {patientsList.birthday.replace(/-/gi, ".")}
                          </TableCell>
                          <TableCell numeric>
                            <IconButton>
                              <LinkContainer
                                to={`/doctor/medcard/${
                                  patientsList.patients_id
                                }`}
                              >
                                <FolderIcon />
                              </LinkContainer>
                            </IconButton>
                          </TableCell>
                        </TableRow>
                      );
                    })}
                  </TableBody>
                </Table>
              </Paper>
            </MuiThemeProvider>
          </TabContainer>
        </SwipeableViews>
      </div>
    );
  }
}

InteractiveList.propTypes = {
  classes: PropTypes.object.isRequired,
  theme: PropTypes.object.isRequired
};

export default withStyles(styles, { withTheme: true })(InteractiveList);
