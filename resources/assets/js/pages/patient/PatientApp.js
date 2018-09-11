import React, { Component } from "react";
import UserMenu from "../../components/user-menu/user-menu";

export default class PatientApp extends Component {
  render() {
    return <UserMenu user="Patient" />;
  }
}
