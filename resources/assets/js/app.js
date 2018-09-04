import React from "react";
import ReactDOM from "react-dom";
import "./index.css";
import App from "./components/app/app";
import registerServiceWorker from "./registerServiceWorker";
import { MuiThemeProvider, createMuiTheme } from "@material-ui/core/styles";
require('./bootstrap');

const theme = createMuiTheme({
  palette: {
    primary: {
      main: "#4caf50",
      contrastText: "#ffffff"
    }
  },
    typography: {
        fontSize: 18,
    }
});

ReactDOM.render(
  <MuiThemeProvider theme={theme}>
    <App />
  </MuiThemeProvider>,
  document.getElementById("root")
);
registerServiceWorker();
