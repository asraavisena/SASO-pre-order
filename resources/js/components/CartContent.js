import React from 'react';

import '../../sass/components/CartContent.scss';

const CartContent = () => {
    return (
        <div className="content cart-content">
            <div className="cart-items"></div>
            <button>GO TO CHECKOUT</button>
        </div>
    );
};

export default CartContent;