import React from "react";
import { Route } from "react-router-dom";
import { List, Create, Update, Show } from "../components/catalogsales/";

export default [
  <Route path="/catalog_sales/create" component={Create} exact key="create" />,
  <Route
    path="/catalog_sales/edit/:id"
    component={Update}
    exact
    key="update"
  />,
  <Route path="/catalog_sales/show/:id" component={Show} exact key="show" />,
  <Route path="/catalog_sales/" component={List} exact strict key="list" />,
  <Route
    path="/catalog_sales/:page"
    component={List}
    exact
    strict
    key="page"
  />,
];
