import React from 'react';
import TextField from 'material-ui/TextField';
import RaisedButton from 'material-ui/RaisedButton';
import UserProfile from './Session';
var generated_hash = "";
export default class Home extends React.Component {

	state = {
		dummy:{
			name: 'DummyName',
			id: 1000,
		}
	}

	testRequest = _ => {
		fetch(`http://localhost:3000`)
			.then(response=>response.json())
			.catch(err=>console.error(err))
	}

	generateSessionToken = _ => {
		
		generated_hash = require('crypto')
			.createHash('md5')
			.update('my super secret data', 'utf8')
			.digest('hex');
		
		UserProfile.setName("lol", "lol");
		console.log(UserProfile.getName());
		console.log(generated_hash);	
	}

	componentWillMount(){
		this.generateSessionToken();
	}

	render(){

		return(
			<div className="App">
				<h1>Home Page Provided the user exists and cookie is set</h1>
				<br/>
				<button onClick={this.testRequest}>Click me</button>
      			</div>
		);
	}
}