import React, { Component } from 'react';
import { Field, reduxForm } from 'redux-form';

import { connect } from 'react-redux';
import { loginUser, addTokenIncookie } from '../actions';

import Routing from '../../../js/Utils/Routing';

class UserConnexion extends Component {

    state = {
        loadingConnexion : false
    }


    componentWillReceiveProps = (nextProps) => {
        if(this.props.user !== nextProps.user) {
            const flag = this.state.loadingConnexion;
            this.setState({
                loadingConnexion: !flag
            });
            if(typeof nextProps.user.token !== "undefined")
            {
                this.props.addTokenIncookie(nextProps.user.token)
            }
        }
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
        this.props.loginUser(values)
    }



    render() {
        const { handleSubmit} = this.props

        let msgUnauthorized = null;
        let buttonConnexion = null;



        if(this.props.user.error == "Unauthorized"){
            msgUnauthorized = (
            <div className="alert alert-danger" role="alert">
                Vous n'etes pas autorisé de vous connectez
            </div>
            );
        }

        if(this.state.loadingConnexion)
        {
            buttonConnexion = (
                <button type="submit" className="btn btn-primary disabled">
                    <i className="fa fa-circle-o-notch fa-spin"></i>
                    Se connecter
                </button>
            );
        }
        else{
            buttonConnexion = (
                <button type="submit" className="btn btn-primary">
                    Se connecter
                </button>
            );
        }

        return (
            <form onSubmit={handleSubmit(this.enregistrer)}>
                {msgUnauthorized}
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
                {buttonConnexion}
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
    return errors;
}

const mapStateToProps = (state) => {
    return {
      user: state.userConnexion,
      cookie:state.cookie
    };
}

export default reduxForm({
    validate: validate,
    form: 'connexion'
})(
    connect(mapStateToProps,{ loginUser,addTokenIncookie })(UserConnexion)
);