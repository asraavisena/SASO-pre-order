import React, { useState } from 'react';
import { connect } from 'react-redux';

import BuyButton from '../UI/Buttons/Button/Button';
import { addItem } from '../redux/cart/cart.action';

import '../../sass/components/Menu.scss';

const Menu = (props) => {
    const {
        menu,
        addItem
    } = props;

    // quantity useState
    const [quantity, setQuantity] = useState(menu.quantity);

    //stock almost sold out
    const almostSoldOut = (quantity < 10) && (quantity > 0);
    const highlighted = almostSoldOut ? " highlighted" : ""
    
    //stock already sold out
    const soldOut = (quantity == 0);
    const disabled = soldOut ? " disabled" : "";

    function decreaseQuantity() {
        console.log(quantity);
        setQuantity(prevValue => {
            return prevValue - 1;
        });
    }

    return (
        <div className="menu col-12 col-sm-6 col-lg-3">
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
                <BuyButton 
                    className="buy-menu"
                    type="button"
                    text="Simpan di Keranjang"
                    disabled={soldOut}
                    onClick = {()=>{
                        addItem(menu);
                        decreaseQuantity();
                    }}
                />
                <div className="menu-quantity">
                    Stock: {quantity}
                </div>
            </div>
        </div>
    );
};

const mapDispatchToProps = dispatch => ({
    addItem: item => dispatch(addItem(item))
})

export default connect(null, mapDispatchToProps)(Menu);