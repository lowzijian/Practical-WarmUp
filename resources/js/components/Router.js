import React from "react";
import { BrowserRouter, Link, Route, Switch } from "react-router-dom";
import District from "./District";
import ViewDistrict from "./View";

const Main = props => (
    <Switch>
        <Route exact path="/districts" component={District} />
        <Route exact path="/districts/:districtId" component={ViewDistrict} />
    </Switch>
);
export default Main;
