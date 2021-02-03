import React from 'react';
import { connect } from 'react-redux';
import { createStructuredSelector } from 'reselect';
import { selecetCartItems, selectCartTotal } from '../redux/cart/cart.selectors';
import CartItem from './CartItem';
import BuyButton from '../UI/Buttons/Button/Button';

import '../../sass/components/CartContent.scss';

const CartContent = (props) => {
    const {
        cartItems,
        total
    } = props;
    return (
        <div className="cart-content">
            <div className="cart-content-title">
                Menu yang ada di Keranjangmu
            </div>
            <div className="cart-items">
                {
                    cartItems.length ? (
                        cartItems.map(
                            cartItem => (<CartItem
                                key={ cartItem.id } 
                                cartItem={cartItem} />
                            )
                        )
                    )
                    :
                    <div className="empty-cart-message">
                        Keranjang kamu masih kosong
                    </div>
                        
                }
            </div>
            <hr/>
            <div className="total-price-wrapper">
                <div className="total-price">
                    Total harga: <span>{total}€</span>
                </div>
            </div>
            <BuyButton
                className="order-button"
                type="button"
                text="Pergi ke Kasir"
                disabled={cartItems.length===0}
            />
        </div>
    );
};

const mapStateToProps = createStructuredSelector({
    cartItems: selecetCartItems,
    total: selectCartTotal
});

export default connect(mapStateToProps)(CartContent);