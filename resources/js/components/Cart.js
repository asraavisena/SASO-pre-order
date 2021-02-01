import React from 'react';
import BagIcon from '../UI/images/bag.svg';
import { connect } from 'react-redux';
import { toggleCartHidden } from '../redux/cart/cart.action';

import '../../sass/components/Cart.scss';

const Cart = ({toggleCartHidden}) => {
    return (
        <div className="cart-icon" onClick={toggleCartHidden}>
            <img src={BagIcon}></img>
            <span className="item-count">0</span>
            {/** TODO: 
             * add order or payment info
             * better: if cart is empty, then the button is disabled
            */}
        </div>
    );
};

const mapDispatchToProps = dispatch => ({
    toggleCartHidden: () => dispatch(toggleCartHidden())
})

export default connect(null, mapDispatchToProps)(Cart);