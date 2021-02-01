import React from 'react';
import ReactDOM from 'react-dom';
import Layout from './Layout';
import Content from './Content';
//import { Provider } from 'react-redux';

import '../../sass/components/Main.scss';

function Main() {
    return (
        <div className="main">
            {/*<Provider>*/}
                <Layout>
                    <Content/>
                </Layout>
             {/*</Provider>*/}
        </div>
    );
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}
