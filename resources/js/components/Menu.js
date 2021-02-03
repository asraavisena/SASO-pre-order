import React from 'react';
import { connect } from 'react-redux';

import BuyButton from '../UI/Buttons/Button/Button';
import { addItem } from '../redux/cart/cart.action';

import '../../sass/components/Menu.scss';

const Menu = (props) => {
    const {
        menu,
        addItem
    } = props;
    console.log(addItem);
    //stock almost sold out
    const almostSoldOut = (menu.quantity < 10) && (menu.quantity > 0);
    const highlighted = almostSoldOut ? " highlighted" : ""
    
    //stock already sold out
    const soldOut = (menu.quantity == 0);
    const disabled = soldOut ? " disabled" : "";
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
                    onClick = {()=>addItem(menu)}
                />
                <div className="menu-quantity">
                    Stock: {menu.quantity}
                </div>
            </div>
        </div>
    );
};

const mapDispatchToProps = dispatch => ({
    addItem: item => dispatch(addItem(item))
})

export default connect(null, mapDispatchToProps)(Menu);