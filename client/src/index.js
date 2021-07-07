import React from 'react';
import ReactDOM from 'react-dom';
import { createStore, combineReducers, applyMiddleware } from 'redux';
import { Provider } from 'react-redux';
import thunk from 'redux-thunk';
import { reducer as form } from 'redux-form';
import { Route, Switch } from 'react-router-dom';
import { createBrowserHistory } from 'history';
import {
    ConnectedRouter,
    connectRouter,
    routerMiddleware
} from 'connected-react-router';
import 'bootstrap/dist/css/bootstrap.css';
import 'font-awesome/css/font-awesome.css';
// import * as serviceWorker from './serviceWorker';
// Import your reducers and routes here
import Welcome from './Welcome';
import callcenter from './reducers/callcenter/';
import catalogpage from './reducers/catalogpage/';
import catalogreturns from './reducers/catalogreturns/';
import customer from './reducers/customer/';
import catalogsales from './reducers/catalogsales/';
import callcenterRoutes from './routes/callcenter';
import catalogpageRoutes from './routes/catalogpage';
import catalogreturnsRoutes from './routes/catalogreturns';
import customerRoutes from './routes/customer';
import catalogsalesRoutes from './routes/catalogsales';


const history = createBrowserHistory();
const store = createStore(
    combineReducers({
        router: connectRouter(history),
        form,
        callcenter,
        catalogpage,
        catalogreturns,
        customer,
        catalogsales,
        /* Add your reducers here */
    }),
    applyMiddleware(routerMiddleware(history), thunk)
);

ReactDOM.render(
    <Provider store={store}>
        <ConnectedRouter history={history}>
            <Switch>
                <Route path="/" component={Welcome} strict={true} exact={true}/>
                {callcenterRoutes}
                {catalogpageRoutes}
                {catalogreturnsRoutes}
                {customerRoutes}
                {catalogsalesRoutes}
                <Route render={() => <h1>Not Found</h1>} />
            </Switch>
        </ConnectedRouter>
    </Provider>,
    document.getElementById('root')
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
// serviceWorker.unregister();