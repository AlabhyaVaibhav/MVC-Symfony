import React from 'react';
import TextField from 'material-ui/TextField';
import RaisedButton from 'material-ui/RaisedButton';
export default class Signup extends React.Component {
	state = {
		firstName: '',
		firstNameError: '',
		lastName: '',
		lastNameError: '',
		username: '',
		usernameError: '',
		email: '',
		emailError: '',
		password: '',
		passwordError: '',
	}

	change = e => {
		this.props.onChange({[e.target.name]: e.target.value})
		this.setState({
			[e.target.name]:e.target.value
		});
	};

	validate = () => {
		let isError = false;
		const errors = {
			firstNameError: '',
			lastNameError: '',
			usernameError: '',
			emailError: '',
			passwordError: '',
		};

		if(this.state.username.length < 5){
			isError = true;
			errors.usernameError = "Username should be atleast 5 characters long";
		}

		if(this.state.email.indexOf('@')==-1){
			isError = true;
			errors.emailError = "Invalid Email Id";
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
				firstName: '',
				firstNameError: '',
				lastName: '',
				lastNameError: '',
				username: '',
				usernameError: '',
				email: '',
				emailError: '',
				password: '',
				passwordError: '',
			});
			this.props.onChange({
				firstName: '',
				lastName: '',
				username: '',
				email: '',
				password: '',
			});
		}
		//console.log(this.state);
	};

	render(){
		return(
			<form>
				<TextField
					name="firstName"
					hintText="First Name"
					floatingLabelText="First Name"
					value={this.state.firstName} 
					onChange={e=>this.change(e)}
					errorText={this.state.firstNameError}
					floatingLabelFixed
				/>
				<br/>
				<TextField
					name="lastName"
					hintText="Last Name"
					floatingLabelText="Last Name"
					value={this.state.lastName} 
					onChange={e=>this.change(e)}
					errorText={this.state.lastNameError}
					floatingLabelFixed
				/>
				<br/>
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
					name="email"
					hintText="Email Id"
					type="email"
					floatingLabelText="Email Id"
					value={this.state.email} 
					onChange={e=>this.change(e)}
					errorText={this.state.emailError}
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