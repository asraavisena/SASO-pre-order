import React from 'react';

import '../../sass/components/Menu.scss'

const Menu = (props) => {
    const {
        menu
    } = props;
    return (
        <div className="menu">
            <div className="menu-wrapper">
                <div className="image-wrapper">
                    <img className="image" src={menu.menu_image}/>
                </div>
                <div className="menu-name">
                    {menu.name}
                </div>
                <div className="menu-price">
                    {menu.price}€
                </div>
                <div className="menu-quantity">
                    Stock: {menu.quantity}
                </div>
            </div>
        </div>
    );
};

export default Menu;