import React from "react";
import { Route } from "react-router-dom";
import { List, Create, Update, Show } from "../components/catalogpage/";

export default [
  <Route path="/catalog_pages/create" component={Create} exact key="create" />,
  <Route
    path="/catalog_pages/edit/:id"
    component={Update}
    exact
    key="update"
  />,
  <Route path="/catalog_pages/show/:id" component={Show} exact key="show" />,
  <Route path="/catalog_pages/" component={List} exact strict key="list" />,
  <Route
    path="/catalog_pages/:page"
    component={List}
    exact
    strict
    key="page"
  />,
];
