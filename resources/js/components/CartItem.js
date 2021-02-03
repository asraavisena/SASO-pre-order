import React from 'react';
import { connect } from 'react-redux';
import { clearItemFromCart, addItem, removeItem } from '../redux/cart/cart.action';

import '../../sass/components/CartItem.scss';
import { add } from 'lodash';

const CartItem = (props) => {
    const {
        cartItem,
        clearItem,
        addItem,
        removeItem
    } = props;
    return (
        <div className="cart-item col-12 col-sm-6 col-lg-3">
            <div
                className="remove-button"
                onClick = {()=> clearItem(cartItem)}
            >
                &#10005;
            </div>
            <div className="cart-item-wrapper">
                <div className="image-wrapper">
                    <img className="image" src={cartItem.menu_image}/>
                </div>
                <div className="cart-item-details">
                    <div className="cart-item-name">
                        {cartItem.name}
                    </div>
                    <div className="cart-item-price">
                        {cartItem.price}€
                    </div>
                    <div className="cart-item-info-wrapper">
                        <div
                            className="minus"
                            onClick = {()=>removeItem(cartItem)}
                        >
                        </div>
                        <div className="cart-item-info">
                            {cartItem.quantity}
                        </div>
                        <div
                            className="plus"
                            onClick = {()=>addItem(cartItem)}
                        >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

const mapDispatchToProps = dispatch => ({
    clearItem: item => dispatch(clearItemFromCart(item)),
    addItem: item => dispatch(addItem(item)),
    removeItem: item => dispatch(removeItem(item))
});

export default connect(null, mapDispatchToProps)(CartItem);