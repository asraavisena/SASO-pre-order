import React from 'react';
import Cart from './Cart';

import '../../sass/components/Header.scss';

const Header = () => {
    return (
        <div className="header">
            <div className="header-wrapper ">
                <div className="img-holder">
                    <a
                        href="https://iwkz.de/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img src="https://iwkz.de/static/media/iwkz-navbar.80c680cd.svg"></img>
                    </a>
                </div>
                {/** add saso logo */}
                <div className="saso-logo">SASO 2021</div>
                <Cart/>
            </div>
        </div>
    );
};

export default Header;