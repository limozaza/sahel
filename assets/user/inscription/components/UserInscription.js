import React, { Component } from 'react';
import { Field, reduxForm } from 'redux-form';

import { connect } from 'react-redux';
import { loginUser } from '../actions';

class UserInscription extends Component {





    renderUsernameField = (field)=> {
        const classes = [];
        classes.push("form-control")
        if(field.meta.touched){
            if(field.meta.error){
                classes.push("is-invalid")
            }
        }

        return (
            <div className="form-group">
                <label htmlFor={field.label}>{field.label}</label>
                <input
                    id={field.label}
                    className={classes.join(" ")}
                    type="text"
                    {...field.input}
                />
                <div className="invalid-feedback">
                    {field.meta.touched ? field.meta.error : ''}
                </div>
            </div>
        );
    }

    renderPasswordField = (field)=> {
        const classes = [];
        classes.push("form-control")
        if(field.meta.touched){
            if(field.meta.error){
                classes.push("is-invalid")
            }
        }

        return (
            <div className="form-group">
                <label htmlFor={field.label}>{field.label}</label>
                <input
                    id={field.label}
                    className={classes.join(" ")}
                    type="password"
                    {...field.input}
                />
                <div className="invalid-feedback">
                    {field.meta.touched ? field.meta.error : ''}
                </div>
            </div>
        );
    }

    enregistrer = (values) => {
        this.props.loginUser(values)
    }



    render() {
        const { handleSubmit} = this.props

        return (
            <form onSubmit={handleSubmit(this.enregistrer)}>
                <Field
                    label="Username"
                    name="username"
                    component={this.renderUsernameField}
                />

                <Field
                    label="Password"
                    name="password"
                    component={this.renderPasswordField}
                />

                <Field
                    label="RetypedPassword"
                    name="retypedPassword"
                    component={this.renderPasswordField}
                />

                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        );
    }
}
function validate(values) {
    const errors = {};

    if(!values.username){
        errors.username = "Veuillez saisir un Username !"
    }

    if(!values.password){
        errors.password = "Veuillez saisir un Password !"
    }

    if(!values.retypedPassword){
        errors.retypedPassword = "Veuillez saisir un Password  2!"
    }

    return errors;
}

export default reduxForm({
    validate: validate,
    form: 'connexion'
})(
    connect(null,{ loginUser })(UserInscription)
);