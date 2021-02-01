import React from 'react';
import BagIcon from '../UI/images/bag.svg';

import '../../sass/components/Cart.scss';

const Cart = () => {
    return (
        <div className="cart-icon">
            <img src={BagIcon}></img>
            <span className="item-count">0</span>
        </div>
    );
};

export default Cart;