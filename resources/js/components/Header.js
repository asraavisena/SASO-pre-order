import React from 'react';

import '../../sass/components/Header.scss';

const Header = () => {
    return (
        <div className="header">
            <div className="header-wrapper ">
                <div className="img-holder">
                    <a href="https://iwkz.de/">
                        <img src="https://iwkz.de/static/media/iwkz-navbar.80c680cd.svg"></img>
                    </a>
                </div>
            </div>
        </div>
    );
};

export default Header;