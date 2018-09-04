import React, { Component } from "react";

import UserMenu from "../../components/user-menu/user-menu";

export default class DoctorApp extends Component {
  render() {
    return <UserMenu user="Doctor"  />;
  }
}
