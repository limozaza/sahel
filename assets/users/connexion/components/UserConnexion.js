import React, { Component } from 'react';
import { Field, reduxForm } from 'redux-form';

import $ from 'jquery';

import { connect } from 'react-redux';

class UserConnexion extends Component {


    state = {
        loadingConnexion : false
    }

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
        this.setState({
            loadingConnexion: true
        })


        setTimeout(function () {
            $('#login_form__username').val(values.username)
            $('#login_form__password').val(values.password)

            $('form[name="login_form"]').submit();

        }, 2000);

        //

        //this.props.loginUser(values)
    }

    render() {
        const { handleSubmit} = this.props;

        let buttonConnexion = null;



        if(this.state.loadingConnexion)
        {
            buttonConnexion = (
                <button type="submit" className="btn btn-primary btn-block disabled"><i className="fa fa-spinner fa-spin" aria-hidden="true"></i> Se connecter</button>
            );
        }
        else{
            buttonConnexion = (
                <button type="submit" className="btn btn-primary btn-block">Se connecter</button>
            );
        }


        return (
            <form onSubmit={handleSubmit(this.enregistrer)} method="POST">
                <Field
                    label="Mail"
                    name="username"
                    component={this.renderUsernameField}
                />
                <Field
                    label="Mot de Passe"
                    name="password"
                    component={this.renderPasswordField}
                />
                {buttonConnexion}

            </form>
        );
    }
}











function validate(values) {
    const errors = {};

    if(!values.username){
        errors.username = "Veuillez saisir votre Mail  !"
    }
    if(!values.password){
        errors.password = "Veuillez saisir votre Mot de passe !"
    }
    return errors;
}





export default reduxForm({
    validate: validate,
    form: 'connexion'
})(
    connect(null,null)(UserConnexion)
);