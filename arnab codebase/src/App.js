import React, { Component } from 'react';
import { MuiThemeProvider, createMuiTheme } from 'material-ui/styles';
import './App.css';
import Signup from './Signup';
import Login from './Login';
import Home from './Home';
import RaisedButton from 'material-ui/RaisedButton';
import Cookies from 'universal-cookie';
import {
  BrowserView,
  MobileView,
  isBrowser,
  isMobile
} from "react-device-detect";

var toggle_signin_login = true;
export default class App extends Component {

  state = {
    fields_signup: {},
    fields_login: {},
  }

  onChangeSignup = (updatedValue) =>{
    this.setState({
      fields_signup: {
        ...this.state.fields_signup,
        ...updatedValue
      }
    });
    //console.log("App Component got: ", fields);
  };

  onChangeLogin = (updatedValue) =>{
    this.setState({
      fields_login: {
        ...this.state.fields_login,
        ...updatedValue
      }
    });
    //console.log("App Component got: ", fields);
  };

  onSubmit = (e) => {
    if(toggle_signin_login==true)
      toggle_signin_login = false;
    else
      toggle_signin_login = true;
    this.forceUpdate();
    //console.log(toggle_signin_login);
  }

  validateCookieUUID = (UUID) => {
    //console.log(UUID);
    let isValid=true;
    fetch(`http://192.168.89.57:8000/test`)
      .then(response=>response.json())
      .then(response=>console.log(response), isValid=true)
      .catch(err=>console.error(err), isValid=false)
    return true;
  }

  renderMobileContent = () => {
    return (<div>Mobile mat use karrrrr</div>);
  }

  renderLoginSignupContent = () => {
    return(
      <MuiThemeProvider>    
        <div className="App">
          <div className={toggle_signin_login ? 'hidden' : ''}>
            <RaisedButton onClick={e=>this.onSubmit(e)} label="Login to your Account" primary/>
            <br/><br/>
            <Signup onClick={this.render} onChange={fields_signup=>this.onChangeSignup(fields_signup)}/>
            <p>
              {JSON.stringify(this.state.fields_signup, null, 2)}
            </p>
          </div>

          <div className={toggle_signin_login ? '' : 'hidden'}>
            <RaisedButton onClick={e=>this.onSubmit(e)} label="Don't have an Account" primary/>
            <br/><br/>
            <Login onClick={this.render} onChange={fields_login=>this.onChangeLogin(fields_login)}/>
            <p>
              {JSON.stringify(this.state.fields_login, null, 2)}
            </p>
          </div>
        </div>
      </MuiThemeProvider>
    );
  }

  renderHomeScreen = () => {
    return (<Home/>);
  }

  render() {
    if (isMobile) {
      return this.renderMobileContent();
    }

    const cookies = new Cookies();
    //cookies.set('UUID', 'LOL', { path: '/' });
    
    var UUID = cookies.get('UUID');
    
    if(UUID){
      if(this.validateCookieUUID(UUID))
      return this.renderHomeScreen();
    }

    return this.renderLoginSignupContent();
  }
}

//export default App;
