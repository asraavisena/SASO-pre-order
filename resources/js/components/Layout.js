import React from 'react';
import Header from './Header';
import Footer from './Footer';

import '../../sass/components/Layout.scss';

const Layout = ({children}) => {
    return (
        <div className="layout">
            <Header />
            {children}
            <Footer/>
        </div>
    );
};

export default Layout;