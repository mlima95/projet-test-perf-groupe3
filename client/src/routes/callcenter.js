import React from "react";
import { Route } from "react-router-dom";
import { List, Create, Update, Show } from "../components/callcenter/";

export default [
  <Route path="/call_centers/create" component={Create} exact key="create" />,
  <Route path="/call_centers/edit/:id" component={Update} exact key="update" />,
  <Route path="/call_centers/show/:id" component={Show} exact key="show" />,
  <Route path="/call_centers/" component={List} exact strict key="list" />,
  <Route path="/call_centers/:page" component={List} exact strict key="page" />,
];
