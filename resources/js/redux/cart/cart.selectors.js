import { createStore } from 'redux';
import { createSelector } from 'reselect';

const selectCart = state => state.cart;

export const selecetCartItems = createSelector(
    [selectCart],
    (cart) => cart.cartItems
);

export const selectCartItemsCount = createSelector(
    [selecetCartItems],
    cartItems =>
        cartItems.reduce((accumalatedQuantity, cartItem) => accumalatedQuantity + cartItem.quantity,
            0
        )
);

export const selectCartTotal = createSelector(
    [selecetCartItems],
    cartItems =>
        cartItems.reduce((accumalatedQuantity, cartItem) => accumalatedQuantity + cartItem.quantity * cartItem.price,
            0
        )
)