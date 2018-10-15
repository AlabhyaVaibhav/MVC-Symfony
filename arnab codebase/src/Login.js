import React from 'react';
import TextField from 'material-ui/TextField';
import RaisedButton from 'material-ui/RaisedButton';
export default class Login extends React.Component {
	state = {
		username: '',
		usernameError: '',
		password: '',
		passwordError: '',
	}

	change = e => {
		this.props.onChange({[e.target.name]: e.target.value})
		this.setState({
			[e.target.name]:e.target.value
		});
	};

	validate = () =>{
		let isError = false;
		const errors = {
			usernameError: '',
			passwordError: '',
		};

		if(this.state.username.length < 5){
			isError = true;
			errors.usernameError = "Username should be atleast 5 characters long";
		}

		//shallow merge not optimal
		//this.setState({
			//...this.state,
		//	...errors
		//});
		this.setState(errors);
		return isError;
	};

	onSubmit = (e) => {
		e.preventDefault();
		//this.props.onSubmit(this.state);
		const err = this.validate();
		if(!err){
			this.setState({
				username: '',
				usernameError: '',
				password: '',
				passwordError: '',
			});
			this.props.onChange({
				username: '',
				password: '',
			});
		}
		//console.log(this.state);
	};

	render(){
		return(
			<form>
				<TextField
					name="username"
					hintText="User Name"
					floatingLabelText="User Name"
					value={this.state.username} 
					onChange={e=>this.change(e)}
					errorText={this.state.usernameError}
					floatingLabelFixed
				/>
				<br/>
				<TextField
					name="password"
					hintText="Password"
					type="password"
					floatingLabelText="Password"
					value={this.state.password} 
					onChange={e=>this.change(e)}
					errorText={this.state.passwordError}
					floatingLabelFixed
				/>
				<br/>
				<RaisedButton onClick={e=>this.onSubmit(e)} label="Submit" primary/>
			</form>
		);
	}

}