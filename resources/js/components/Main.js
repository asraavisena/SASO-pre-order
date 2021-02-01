import React from 'react';
import ReactDOM from 'react-dom';
import Layout from './Layout';
import Content from './Content';
import { Provider } from 'react-redux';
import store from '../redux/store';

import '../../sass/components/Main.scss';

function Main() {
    return (
        <div className="main">
            <Provider store={store}>
                <Layout>
                    <Content/>
                </Layout>
             </Provider>
        </div>
    );
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}
