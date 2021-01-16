import React from 'react';
import Header from './Header';
import Footer from './Footer';
import Content from './Content';

import '../../sass/components/Layout.scss';

const Layout = () => {
    return (
        <div className="layout">
            <Header />
            <Content/>
            <Footer/>
        </div>
    );
};

export default Layout;