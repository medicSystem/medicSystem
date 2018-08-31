import React from "react";
import PropTypes from "prop-types";
import SwipeableViews from "react-swipeable-views";
import { withStyles } from "@material-ui/core/styles";
import AppBar from "@material-ui/core/AppBar";
import Tabs from "@material-ui/core/Tabs";
import Tab from "@material-ui/core/Tab";
import Typography from "@material-ui/core/Typography";
import green from "@material-ui/core/colors/green";
import axios from 'axios';
import IconButton from '@material-ui/core/IconButton';
import Done from '@material-ui/icons/Done';
import Clear from '@material-ui/icons/Clear';
import Loader from 'react-loader-spinner';


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


    constructor(props){
        super(props);
        this.state = {
            value: 0,
            validation: [],
            canceledValidation: [],
            loading: false,
        };
        this.handleChange = (event, value) => {
            this.setState({ value });
        };
        this.handleChangeIndex = index => {
            this.setState({ value: index });
        };
    };
    componentDidMount(){
        this.setState({loading: true}, () => {
            axios.get('/viewNewValidate')
                .then((response) => {this.setState({loading: false, validation: response.data,})
                        .catch((error)=>{
                            console.log(error);
                        });
        }
        )}
    )}

    render() {
        const { classes, theme } = this.props;
        const {validation, loading} = this.state;
        const transitionDuration = {
            enter: theme.transitions.duration.enteringScreen,
            exit: theme.transitions.duration.leavingScreen
        };

        return (
            <div className={classes.root + ' ' + 'deck'}>
                <AppBar position="static" color="default">
                    <Tabs
                        value={this.state.value}
                        onChange={this.handleChange}
                        indicatorColor="primary"
                        textColor="primary"
                        fullWidth
                    >
                        <Tab label="Validation" />
                        <Tab label="Canceled Validation" />
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
                                <th scope="col">Birthday</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">Accept</th>
                                <th scope="col">Dispath</th>
                            </tr>
                            </thead>
                            <tbody>
                            {loading ? <div className='loader-admin'><Loader id='loader'  type="TailSpin" color="#4caf50" height={80} width={80}/></div> : this.state.validation.map(validation =>
                                <tr id='list'>
                                    <th scope="row"></th>
                                    <td>{validation.first_name}</td>
                                    <td>{validation.last_name}</td>
                                    <td>{validation.birthday}</td>
                                    <td>{validation.phone_number}</td>
                                    <td>{validation.email}</td>
                                    <td><IconButton color="primary"><Done /></IconButton></td>
                                    <td><IconButton ><Clear color='secondary'/></IconButton></td>
                                </tr>
                            )}
                            {console.log(this.state.validation)}
                            </tbody>
                        </table>
                    </TabContainer>
                    <TabContainer dir={theme.direction}>Item One</TabContainer>
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
