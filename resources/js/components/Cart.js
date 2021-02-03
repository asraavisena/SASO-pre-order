import React from 'react';
import { connect } from 'react-redux';
import { toggleCartHidden } from '../redux/cart/cart.action';
import { selectCartItemsCount } from '../redux/cart/cart.selectors'
import '../../sass/components/Cart.scss';

const Cart = ({toggleCartHidden, itemCount, hidden}) => {
    return (
        <div
            className={["cart-icon ", hidden ? '' : 'hidden'].join('')}
            onClick={toggleCartHidden}
        >
            <span className="item-count">{itemCount}</span>
            {/** TODO: 
             * add order or payment info
             * better: if cart is empty, then the button is disabled
            */}
        </div>
    );
};

const mapDispatchToProps = dispatch => ({
    toggleCartHidden: () => dispatch(toggleCartHidden())
});

const mapStateToProps = (state) => ({
    itemCount: selectCartItemsCount(state),
    hidden: state.cart.hidden
});

export default connect(mapStateToProps, mapDispatchToProps)(Cart);