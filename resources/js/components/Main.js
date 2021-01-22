import React from 'react';
import ReactDOM from 'react-dom';
import Layout from './Layout';
import Content from './Content';

import '../../sass/components/Main.scss';

function Main() {
    return (
        <div className="main">
            <Layout>
                <Content/>
            </Layout>
        </div>
    );
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}
