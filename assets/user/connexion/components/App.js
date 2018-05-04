import React, { Component } from 'react';

import UserConnexion from './UserConnexion';

export default class App extends Component {
    render() {
        return (
            <div>
                <h1>Page de connexion</h1>
                <UserConnexion/>
            </div>
        );
    }
}