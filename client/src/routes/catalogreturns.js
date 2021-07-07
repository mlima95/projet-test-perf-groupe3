import React from "react";
import { Route } from "react-router-dom";
import { List, Create, Update, Show } from "../components/catalogreturns/";

export default [
  <Route
    path="/catalog_returns/create"
    component={Create}
    exact
    key="create"
  />,
  <Route
    path="/catalog_returns/edit/:id"
    component={Update}
    exact
    key="update"
  />,
  <Route path="/catalog_returns/show/:id" component={Show} exact key="show" />,
  <Route path="/catalog_returns/" component={List} exact strict key="list" />,
  <Route
    path="/catalog_returns/:page"
    component={List}
    exact
    strict
    key="page"
  />,
];
