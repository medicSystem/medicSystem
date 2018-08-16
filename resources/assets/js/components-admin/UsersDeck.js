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
import Loader from 'react-loader-spinner';
import IconButton from '@material-ui/core/IconButton';
import Clear from '@material-ui/icons/Clear'
import Icon from '@material-ui/core/Icon';
import { Link } from 'react-router-dom';
import Button from '@material-ui/core/Button'

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
            usersList: [],
            banList: [],
            loading: false,
        };
        this.handleChange = (event, value) => {
            this.setState({ value });
        };
        this.handleChangeIndex = index => {
            this.setState({ value: index });
        };
    };
    componentDidMount() {
        this.setState({loading: true}, () => {
            axios.get('/usersList')
                .then((response) => {this.setState({loading: false, usersList: response.data,});
                })
                .catch((error)=>{
                    console.log(error);
                });
                axios.get('/banList')
                    .then((response) => {this.setState({loading: false, banList: response.data,});
                    });
                const userId = window.location.hash.replace(/#/,'');
                console.log(userId);
        })
    }
    render() {
        const { classes, theme } = this.props;
        const {usersList, loading} = this.state;
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
                        <Tab label="All Users" />
                        <Tab label="Ban-List" />
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
                            {loading ? <div className='loader-admin'><Loader id='loader'  type="TailSpin" color="#4caf50" height={80} width={80}/></div> : this.state.usersList.map(usersList =>
                                <tr id='list'>
                                    <th scope="row">{usersList.id}</th>
                                    <td>{usersList.first_name}</td>
                                    <td>{usersList.last_name}</td>
                                    <td>{usersList.birthday}</td>
                                    <td>{usersList.phone_number}</td>
                                    <td>{usersList.email}</td>
                                    <td>{usersList.role}</td>
                                    <td key={usersList.id + usersList.role} onClick={ () => {
                                        axios.post('/addBan/' + usersList.id)
                                    }}><IconButton ><Clear/></IconButton></td>
                                </tr>
                            )}
                            </tbody>
                        </table>
                    </TabContainer>
                    <TabContainer dir={theme.direction}> <table className="table table-borderless table-dark">
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
                        {loading ? <div className='loader-admin'><Loader id='loader'  type="TailSpin" color="#4caf50" height={80} width={80}/></div> : this.state.banList.map(banList =>
                            <tr>
                                <th scope="row">{banList.id}</th>
                                <td>{banList.first_name}</td>
                                <td>{banList.last_name}</td>
                                <td>{banList.birthday}</td>
                                <td>{banList.phone_number}</td>
                                <td>{banList.email}</td>
                                <td>{banList.role}</td>
                                <td id={banList.id} ><Icon className={classes.icon} color="primary">done</Icon></td>
                            </tr>
                        )}
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
