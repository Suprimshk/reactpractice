import React from 'react';
import "../node_modules/bootstrap/dist/css/bootstrap.min.css";
import "../node_modules/bootstrap/dist/js/bootstrap.bundle";
import './App.css';
import {Switch,Route,Redirect}from "react-router-dom"
import List from './components/List';
import Service from './components/Service';
import Navbar from './components/Navbar';
import Team from './components/Team';
import Client from './components/Client';
import Email from './components/Email';
import { BrowserRouter} from "react-router-dom";

function App() {
  return (
    <BrowserRouter>
      <Navbar/>
      <Switch>
        <Route  exact path="/" component={List}/>
        <Route  exact path="/Team" component={Team}/>
        <Route  exact path="/Service" component={Service}/>
        <Route  exact path="/Email" component={Email}/>
        <Route  exact path="/Client" component={Client}/>
        <Redirect to="/"/>
      </Switch>
     
      
      </BrowserRouter>
  );
}

export default App;
