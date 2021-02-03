import React from 'react';

import '../../sass/components/Menu.scss';

const Menu = (props) => {
    const {
        menu
    } = props;

    //stock almost sold out
    const almostSoldOut = (menu.quantity < 10) && (menu.quantity > 0);
    const highlighted = almostSoldOut ? " highlighted" : ""
    
    //stock already sold out
    const soldOut = (menu.quantity == 0);
    const disabled = soldOut ? " disabled" : "";
    return (
        <div className="menu col-6 col-sm-4 col-lg-3">
            <div className={["menu-wrapper", highlighted, disabled].join('')}>
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